<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employee;
class EmployeeController extends Controller
{
    function AllEmployee(){
      $all = employee::all();
      return view('thaer')->with('x',$all);
    }

    function showData(){
        return view ('AddEmp');
    }

    function AddEmployee(Request $request){
        $obj = new employee();
        $obj->id = $request->id;
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->age = $request->age;
        $obj->department = $request->dep;
        $obj->save();
        return redirect('/all');
    }
}
