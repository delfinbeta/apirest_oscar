<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
  use SoftDeletes;
  
  protected $tables = [
    'name',
    'description'
  ];
  protected $fillable = [
      'name', 'description'
  ];
}
