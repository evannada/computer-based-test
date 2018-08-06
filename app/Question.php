<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  protected $fillable = [
    'user_id',
    'subject_teacher',
    'bobot',
    'question',
    'a',
    'b',
    'c',
    'd',
    'correct_answer'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
