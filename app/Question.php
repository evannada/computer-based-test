<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Question extends Model
{
  protected $fillable = [
    'user_id',
    'subject_teacher',
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
