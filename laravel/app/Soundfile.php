<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soundfile extends Model
{
      protected $fillable = [
     'file_of_kind', 'file_name', 'file_path',
  ];
}
