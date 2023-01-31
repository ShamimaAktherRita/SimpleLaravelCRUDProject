<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public static $product, $image, $imageUrl, $directory, $imageName;

    protected $fillable = [
        'name', 'price', 'description', 'image'
    ];

    public static function getImageUrl($request)
    {
        self:: $image = $request->file('image');
        self:: $imageName = self::$image->getClientOriginalName();
        self:: $directory = 'product-image/';
        self:: $image->move(self:: $directory, self::$imageName);
        return self:: $directory.self::$imageName; //PRODUCT-IMAGE/FGHFY.JPG
    }

    public static function createProduct($request)
    {
       // Product::create([
           // 'name'        => $request->name,
            //'price'       => $request->price,
           // 'description' => $request-> description,
          //  'image'       => $request->image,
       // ]);


        self::$product              = new Product();
        self::$product->name        = $request->name;
        self::$product->price       = $request->price;
        self::$product->description = $request->description;
        self::$product->image       = self::getImageUrl($request);
        self::$product->save();
        //return 'success';

        //Product::create($request->all());
    }
    public static function updateProduct($request,$id)
    {
        self:: $product = Product::find($id);
        if($request->file('image'))
        {
            if(file_exists(self::$product->image))
            {
                unlink(self::$product->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
            {
                self::$imageUrl = self::$product->image;
            }

        self::$product->name        = $request->name;
        self::$product->price       = $request->price;
        self::$product->description = $request->description;
        self::$product->image       = self::$imageUrl;
        self::$product->save();
    }
    public static function deleteProduct($id)
    {
        self:: $product = Product::find($id);
        if(file_exists(self::$product->image))
        {
            unlink(self::$product->image);
        }
        self:: $product->delete();
    }
}
