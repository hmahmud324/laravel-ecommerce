<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    private static $brand, $image, $imageName, $directory, $imageUrl;

    public static function imageUpload($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'uploads/brand-images/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newBrand($request)
    {
        self::$imageUrl = self::imageUpload($request);

        self::$brand = new Brand();
        self::$brand->name           = $request->name;
        self::$brand->description    = $request->description;
        self::$brand->image          = self::$imageUrl;
        self::$brand->save();
    }

    public static function updateBrand($request, $id)
    {
        self::$brand = Brand::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$brand->image))
            {
                unlink(self::$brand->image);
            }
            self::$imageUrl = self::imageUpload($request);
        }
        else
        {
            self::$imageUrl = self::$brand->image;
        }

        self::$brand->name           = $request->name;
        self::$brand->description    = $request->description;
        self::$brand->image          = self::$imageUrl;
        self::$brand->save();
    }

    public static function deleteBrand($id)
    {
        self::$brand = Brand::find($id);
        if (file_exists(self::$brand->image))
        {
            unlink(self::$brand->image);
        }
        self::$brand->delete();
    }
}
