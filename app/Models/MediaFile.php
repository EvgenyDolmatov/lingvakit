<?php

namespace App\Models;

use App\Models\LMS\Conformity;
use App\Models\LMS\Course;
use App\Models\LMS\Lesson;
use App\Models\LMS\Question;
use App\Models\LMS\QuestionAudio;
use App\Models\LMS\Quiz;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaFile extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'filename', 'path', 'alt', 'type', 'size', 'duration'];

    public function uploadFile($file)
    {
        $extImages = ['jpg', 'png', 'gif'];
        $extAudio = ['wav', 'mp3'];
        $extVideo = ['mp4'];

        if ($file == null) {return;}

        $extension = $file->extension();
        if ($extension == 'jpeg') {
            $extension = 'jpg';
        }

        $type = 'file';

        if (in_array($extension, $extImages)) {
            $type = 'image';
            $filename = 'image-'.Str::random(3).time().'.'. $extension;
            $path = 'img/'.date("Y").'/'.date("m");
            $file->storeAs($path.'/', $filename, 'uploads');
        }
        elseif (in_array($extension, $extAudio)) {
            $type = 'audio';
            $filename = 'audio-'.Str::random(3).time().'.'. $extension;
            $path = 'audio/'.date("Y").'/'.date("m");
            $file->storeAs($path.'/', $filename, 'uploads');
        }
        elseif (in_array($extension, $extVideo)) {
            $type = 'video';
            $filename = 'video-'.Str::random(3).time().'.'. $extension;
            $path = 'video/'.date("Y").'/'.date("m");
            $file->storeAs($path.'/', $filename, 'uploads');
        }
        else {
            $filename = 'file-'.Str::random(3).time().'.'. $extension;
            $path = 'files/'.date("Y").'/'.date("m");
            $file->storeAs($path.'/', $filename, 'uploads');
        }

        $this->title = $file->getClientOriginalName();
        $this->filename = $filename;
        $this->path = $path;
        $this->type = $type;
        $this->size = $file->getSize();
        $this->save();
    }

    public function removeFile()
    {
        if ($this->filename != null) {
            Storage::disk('uploads')->delete($this->path.'/'.$this->filename);
        }
    }

    public function getPath() : string
    {
        if ($this->filename == null && $this->type === 'image') {
            return '/assets/cms/img/no-image.jpg';
        }
        return '/uploads/'.$this->path.'/'.$this->filename;
    }

    public function unpinFile()
    {
        if ($this->type === 'image') {
            Course::where('image', $this->id)->update(['image' => null]);
            Lesson::where('image', $this->id)->update(['image' => null]);
            Quiz::where('image', $this->id)->update(['image' => null]);
            Question::where('image', $this->id)->update(['image' => null]);
            Conformity::where('image', $this->id)->update(['image' => null]);
        }
        if ($this->type === 'audio') {
            Lesson::where('audio', $this->id)->update(['audio' => null]);
            Quiz::where('audio', $this->id)->update(['audio' => null]);
            QuestionAudio::where('audio', $this->id)->update(['audio' => null]);
            Conformity::where('audio', $this->id)->update(['audio' => null]);
        }
    }

    public function remove()
    {
        $this->unpinfile();
        $this->removeFile();
        $this->delete();
    }

    public function getFileSize() : string
    {
        $size = round($this->size);

        if ($size > 1048576) {
            return round($size / 1024 / 1024) . ' Mb';
        }
        if ($size > 1024) {
            return round($size / 1024) . ' Kb';
        }
        return $size . ' b';
    }

}
