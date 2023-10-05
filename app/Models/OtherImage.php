<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherImage extends Model
{
    use HasFactory;
    private static $otherImage,$otherImages,$image, $imageName, $directory, $imageUrl;

    public static function imageUpload($otherImage)
    {
        self::$imageName                = $otherImage->getClientOriginalName();
        self::$directory                = 'uploads/product-other-images/';
        $otherImage->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newOtherImage($otherImages,$id)
    {
        foreach ($otherImages as $otherImage)
        {
            self::$otherImage               = new OtherImage();
            self::$otherImage->product_id   = $id;
            self::$otherImage->image        = self::imageUpload($otherImage);
            self::$otherImage->save();
        }
    }

    public static function updateOtherImage($request,$id)
    {
        self::$otherImages = OtherImage::where('product_id', $id)->get();
        foreach (self::$otherImages as $otherImage)
        {
            if (file_exists($otherImage->image)) {
                unlink($otherImage->image);
            }
            $otherImage->delete();
         }
        self::newOtherImage($request->other_image,$id);
    }

    public static function deleteOtherImage($id)
    {
        self::$otherImages = OtherImage::where('product_id', $id)->get();
        foreach (self::$otherImages as $otherImage)
        {
            if (file_exists($otherImage->image)) {
                unlink($otherImage->image);
            }
            $otherImage->delete();
        }

    }


}
