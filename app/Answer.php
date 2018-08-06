<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
  protected $fillable = [
    'user_id', 'test_id', 'question_id', 'answer'
  ];

  public function question()
  {
    return $this->hasOne(Question::class);
  }

}
