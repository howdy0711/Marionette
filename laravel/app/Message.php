<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
     protected $fillable = [
      'num', 'addressee', 'content', 'check_it',
];
}
