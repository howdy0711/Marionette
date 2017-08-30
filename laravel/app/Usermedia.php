<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usermedia extends Model
{
   protected $fillable = [ 'NUM', 'user_id', 'file_of_kind', 'file_name', 'file_path','koreanName','time_of_soundfile' ];
}
// 