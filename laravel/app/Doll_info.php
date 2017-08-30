<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doll_info extends Model
{
     protected $fillable = [
      'doll_num', 'weight', 'madeCompany', 'thread_of_doll', 'height','price',
      'img_path', 'doll_name',
];
}