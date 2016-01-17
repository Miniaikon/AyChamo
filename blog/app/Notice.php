<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
     protected $table = "notices";

     protected $fillable = ['titulo', 'content', 'autor', 'created_at'];
}