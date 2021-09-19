<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
       public function getData(){
           return Offer::select('id','name')->get();
       }

       public  function  create(){
           return view('offers.store');
       }



       public  function store(Request $request){

           $rules = $this->getRules();

           $messages= $this->getMessages();

        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        Offer::create([
            'name'=>$request->name,
            'price'=>$request->price,

        ]);

        return redirect()->back()->with(['success'=>'Offer added successfully']);
       }

     protected  function  getRules(){
       return   [
             'name' => 'required | max:100 | unique:offers,name',
             'price' => 'required | numeric',
         ];
     }
     protected  function  getMessages(){
           return [
               'name.required ' =>__('messages.Field name is required'),
               'name.unique' => __('messages.Filed value is exists'),
               'price.required' => __('messages.Field price is required'),
               'price.numeric' => __('messages.Filed value should contains numbers only'),
           ];
     }
}
