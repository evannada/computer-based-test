<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
      'user_id', 'nig'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
