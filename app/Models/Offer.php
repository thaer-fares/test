<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table ='offers';
    protected  $fillable=['name','price','photo'];
    protected  $hidden=['remember_token','created_at','updated_at'];
    public $timestamps=false;
}
