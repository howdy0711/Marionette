<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
  protected $fillable = [
      'NUM', 'user_id', 'moving', 'sound', 'backsound','tarpath','cont_name',
  ];
}
