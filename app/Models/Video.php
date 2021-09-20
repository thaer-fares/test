<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table ='videos';
    protected  $fillable=['name','viewer'];
    //  protected  $hidden=['remember_token','created_at','updated_at'];
       public $timestamps=false;
}
