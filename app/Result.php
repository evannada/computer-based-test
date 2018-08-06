<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
  protected $fillable = [
    'test_id',
    'user_id',
    'class',
    'true',
    'false',
    'value',
    'status'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function test()
  {
    return $this->belongsTo(Test::class);
  }

}
