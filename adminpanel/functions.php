<?php

function validateImage($image, $target_dir, $size=2){
    /*  
        error 1 = extension error
        error 2 = size limit error
        error 3 = file exists error
    */

    $error = 0;
    $target_dir = $target_dir;

    // jpg, png look https://www.php.net/manual/en/function.exif-imagetype.php
    $allowedImageExtension = [2, 3];
    
    // extension validation
    if (in_array(exif_imagetype($image), $allowedImageExtension)){

        // size limit
        if ($image<($size*1024*1024)){
            
            // file exist error
            if (file_exists($image)){
                // file exist error
                $error = 3;
            }
        }
        else {
            // size error
            $error = 2;
        }
    }
    else {
        // extension error
        $error = 1;    
    }
    return $error;
}

?>