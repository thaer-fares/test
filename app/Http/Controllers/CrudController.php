<?php

namespace App\Http\Controllers;

use App\Events\VideoViewer;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Models\video;
use App\Traits\OfferTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use LaravelLocalization;

class CrudController extends Controller
{

    use OfferTraits;

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



       public  function store(OfferRequest $request){

   //        $rules = $this->getRules();

  //         $messages= $this->getMessages();

  //      $validator = Validator::make($request->all(),$rules,$messages);
    //    if($validator->fails()){
      //      return redirect()->back()->withErrors($validator)->withInput($request->all());
        //}
           $file_name=$this->savephoto($request ->photo,'images/offers');


       //    return 'OKAY';
        Offer::create([
            'photo'=>$file_name,
            'name'=>$request->name,
            'price'=>$request->price,

        ]);

        return redirect()->back()->with(['success'=>__('messages.Offer added successfully')]);
       }

     /*  protected  function  savephoto($Requestphoto, $folder){
           $file_extension = $Requestphoto ->getClientOriginalExtension();
           $file_name = time().'.'. $file_extension;
           $path =$folder;
           $Requestphoto -> move($path,$file_name);
           return $file_name;

       }*/

//'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
//'price_' . LaravelLocalization::getCurrentLocale() . ' as price'

       public  function  all(){
         $All=  Offer::select('id', 'name', 'price')->get();
           return view('offers.all',compact('All'));
       }

       public  function editOffer($offer_id){
          $offer = Offer::find($offer_id);
          if(!$offer){
              return redirect()->back();
          }
         $offer = Offer::select('id','name','price')->find($offer_id);
          return view('offers.edit',compact('offer'));
          return $offer_id;
       }

       public  function updateOffer(OfferRequest $request , $offer_id){
           $offer = Offer::find($offer_id);
           if(!$offer){
               return redirect()->back();
           }
           $offer->update($request->all());
           return redirect()->back()->with(['success'=>__('messages.updated successfully')]);


           /*       $offer->update([
                      'name'=>$request->name,
                      'price' => $request->price,

                  ]); */

       }
/*
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
     }*/

public  function getVideo(){
    $video = Video::first();
    event(new VideoViewer($video)); //fire event
    return view('video')->with('video', $video);
}
}
