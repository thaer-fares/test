<?php

namespace App\Http\Controllers\Front;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function  __construct(){
        $this->middleware('auth')->except('getData');
    }


    public  function showUserName(){
    return('Thaer Fares');
}

public function getData(){
     //   $data=[];
     //   $data['id']=5;
     //   $data['name']='thaer';
 //   $obj = new \stdClass();
 //   $obj->name ='Thaer';
 //   $obj->id = 7;
    $data=['Thaer','Ahmed','Khalid'];
    //return view('welcome',compact('obj'));
    return view('welcome',compact('data'));

}

    public  function showUserName1(){
        return('Thaer Fares 1');
    }

    public  function showUserName2(){
        return('Thaer Fares 2');
    }

}
