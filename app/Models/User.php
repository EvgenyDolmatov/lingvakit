<?php

namespace App\Models;

use App\Models\LMS\Course;
use App\Models\LMS\Result;
use App\Notifications\CustomResetPasswordNotification;
use App\Notifications\CustomVerificationEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles, \Illuminate\Auth\MustVerifyEmail;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'patronymic', 'email', 'phone', 'passport', 'is_staff', 'is_dealer', 'company_id',
        'country_id', 'state', 'city', 'address', 'zip', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function session()
    {
        return $this->hasOne(Session::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function setting()
    {
        return $this->hasOne(Setting::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_user')->withPivot('progress');
    }

    public function results()
    {
        return $this->belongsTo(Result::class, 'user_id');
    }

    public static function add($fields) {
        $user = new static;
        $user->fill($fields);
        $user->password = Hash::make('00000000');
        $user->save();

        return $user;
    }

    public function updateUser($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function getCompany()
    {
        if ($this->company) {
            return $this->company->name;
        }
        return 'Private Person';
    }

    public function getFullName()
    {
        return trim($this->surname .' '. $this->name .' '. $this->patronymic);
    }

    public function getCustomer()
    {
        $fullName = $this->getFullName();
        if ($this->company) {
            return $fullName . ' [' .  $this->company->name . ']';
        }
        return $fullName;
    }

    public function isDealer()
    {
        $this->is_dealer = 1;
        $this->save();
    }
    public function isNotDealer()
    {
        $this->is_dealer = 0;
        $this->save();
    }

    public function switchDealer($value)
    {
        if ($value == null) {
            return $this->isNotDealer();
        }
        return $this->isDealer();
    }

    public function getLastOrder()
    {
        return Order::where('user_id', $this->id)->latest()->first();
    }

    public function getResultsByCourse($course)
    {
        return Result::where([
            ['user_id', $this->id],
            ['course_id', $course->id],
        ])->get();
    }

    public function getPoints($course) : int
    {
        $points = 0;
        $results = $this->getResultsByCourse($course);

        foreach ($results as $result) {
            $points += $result->points;
        }
        return $points;
    }

    public function getRatingByCourse($course)
    {
        $students = $course->students->except($course->author_id);

        $arr = array();
        foreach ($students as $student) {
            $arr[$student->id] = $student->getPoints($course);
        }

        $count = 0;
        arsort($arr);

        foreach ($arr as $key => $item) {
            $count += 1;

            if ($key === $this->id) {
                return $count;
            }
        }
        return false;
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token));
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerificationEmail($this));
    }
}
