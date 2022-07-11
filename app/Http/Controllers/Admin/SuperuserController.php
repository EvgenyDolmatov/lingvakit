<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LMS\Topic;
use App\Models\MediaFile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperuserController extends Controller
{
    public function changePaths()
    {
        $files = MediaFile::all();

        /* Change paths for all of media files */
        foreach ($files as $file) {
            $old_path = $file->path;
            $file->update([
                'path' => 'teachers/id_1/' . $old_path,
                'author_id' => 1,
            ]);
        }

        /* Give the superuser role */
        $superuser = User::where('email', 'evgeniy.webdesign@gmail.com')->first();
        $superuser->removeRole('user');
        $superuser->assignRole('superuser');

        return redirect()->route('dashboard');
    }

    public function setNumbersForTopics()
    {
        $topics = Topic::all();

        foreach ($topics as $topic) {
            $topic->index_number = $topic->id;
            $topic->save();
        }

        return redirect()->route('dashboard');
    }
}
