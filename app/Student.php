<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
      'user_id', 'nis', 'class'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
