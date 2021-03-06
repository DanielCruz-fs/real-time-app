<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $table = 'categories';
     protected $fillable = ['name', 'slug'];

     public function getRouteKeyName(){
     	 return 'slug';
     }
     public function questions(){
     	 return $this->hasMany('App\Question');
     }
}
