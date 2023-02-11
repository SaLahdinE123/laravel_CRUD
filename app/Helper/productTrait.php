<?php

namespace App\Helper;
trait productTrait
{
    protected function saveImage($image, $path)
    {
        $file_extension = $image->extension();
        $file_name = time() . "." . $file_extension;
        $image->move($path, $file_name);
        return $file_name;
    }
}
