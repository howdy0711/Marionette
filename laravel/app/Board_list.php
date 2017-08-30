<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board_list extends Model
{
     protected $fillable = [
      'list_no', 'list_boardno', 'list_title','list_name','list_content'
      ,'list_category', 'list_view', 'list_file', 'list_date'
  ];
}