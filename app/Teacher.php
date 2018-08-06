<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
      'user_id', 'nip', 'subject'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
