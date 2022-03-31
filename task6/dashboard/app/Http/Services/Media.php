<?php
namespace App\Http\Services;

class Media{
static function upload($image,$dir){
    $imageName=uniqid() . '.' . $image->extension();
    $image->move(public_path("assets\images\\{$dir}" ,$imageName));
    return $imageName;
}
public static function delete($dir){
    if(file_exists($dir)){
        unlink($dir);
        return true;
    }else{
        return false;
    }
}

}
?>