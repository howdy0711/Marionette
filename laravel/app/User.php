<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  protected $fillable = [
      'comment_no','comment_listno','comment_name','comment_content','comment_date'
  ];
}
