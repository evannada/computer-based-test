<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function student()
    {
      return $this->hasOne(Student::class);
    }

    public function question()
    {
      return $this->hasOne(Question::class);
    }


    public function teacher()
    {
      return $this->hasOne(Teacher::class);
    }

    public function tests()
    {
      return $this->hasMany(Test::class);
    }

    public function isAdmin()
    {
      if ($this->role == 3) {
        return true;
      }
      return false;
    }

    public function isTeacher()
    {
      if ($this->role == 2) {
        return true;
      }
      return false;
    }

    public function isStudent()
    {
      if ($this->role == 1) {
        return true;
      }
      return false;
    }
}
