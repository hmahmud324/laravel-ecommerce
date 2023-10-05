<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    private static $subCategory, $image, $imageName, $directory, $imageUrl;

    public static function imageUpload($request)
    {
        self::$image                = $request->file('image');
        self::$imageName            = self::$image->getClientOriginalName();
        self::$directory            = 'uploads/sub-category-images/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newSubCategory($request)
    {
        self::$imageUrl = self::imageUpload($request);

        self::$subCategory = new SubCategory();
        self::$subCategory->category_id    = $request->category_id;
        self::$subCategory->name           = $request->name;
        self::$subCategory->description    = $request->description;
        self::$subCategory->image          = self::$imageUrl;
        self::$subCategory->save();
    }

    public static function updateSubCategory($request, $id)
    {
        self::$subCategory = SubCategory::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$subCategory->image))
            {
                unlink(self::$subCategory->image);
            }
            self::$imageUrl = self::imageUpload($request);
        }
        else
        {
            self::$imageUrl = self::$subCategory->image;
        }
        self::$subCategory->category_id     = $request->category_id;
        self::$subCategory->name            = $request->name;
        self::$subCategory->description     = $request->description;
        self::$subCategory->image           = self::$imageUrl;
        self::$subCategory->save();
    }

    public static function deleteSubCategory($id)
    {
        self::$subCategory = SubCategory::find($id);
        if (file_exists(self::$subCategory->image))
        {
            unlink(self::$subCategory->image);
        }
        self::$subCategory->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
