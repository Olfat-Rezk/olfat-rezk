<?php
namespace App\Services;
class Media{

public static function upload($media,$directory){
    $newName= $media->hash();
    $media->move(public_path("imgs\{$directory}",$newName));
    return $newName ;

}
public static function delete($mediaPath){
    if(file_exists($mediaPath)){
        unlink($mediaPath);
        return true;
    }
return false;
}
}

