<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
  protected $fillable = [
   'NUM', 'cont_category', 'cont_name','cont_price','cont_detail','cont_effect_sound',
   'cont_background_sound','cont_voice','cont_moving','cont_image','cont_check',
   'cont_sell'
];

}
