<?php

namespace App\Traits;



Trait OfferTraits
{
      function  savephoto($Requestphoto, $folder){
        $file_extension = $Requestphoto ->getClientOriginalExtension();
        $file_name = time().'.'. $file_extension;
        $path =$folder;
        $Requestphoto -> move($path,$file_name);
        return $file_name;

    }

}
