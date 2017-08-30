<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usermario extends Model
{
    protected $fillable = [
       'NUM','user_id', 'cont_category', 'cont_name','cont_price','cont_detail','cont_effect_sound',
       'cont_background_sound','cont_voice','cont_moving','cont_image','cont_check',
       'cont_info'
    ];
}
