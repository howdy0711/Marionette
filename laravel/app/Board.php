<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
  protected $fillable = [
      'board_no', 'board_name', 'board_date'
  ];
}
