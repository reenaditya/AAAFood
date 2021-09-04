<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Schema;
use App\Helpers\FrontHelper;
use Storage;
use File;

class FrontHelper{
   
   public static function singleImage($request,$fileName,$img_dir,bool $isResize=false,array $resizeValue=[],string $preImage='')
   {  
      if ($preImage) 
      {
         Storage::delete($preImage);
      }
      
      $image_path = $request->file($fileName);
      $image = $image_path->store($img_dir,'public');   
      
      return $image;
   }

}

?>