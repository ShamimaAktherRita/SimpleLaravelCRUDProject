<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product, $products;
    public function addProduct()
    {
        return view('front.product.add-product');
    }
    public function saveProduct(Request $request)
    {

        Product::createProduct($request);
        //prduct class object dhore method
        return redirect()->back()->with('message', 'Product info save successfully');
    }
    public function manageProduct()
    {
        $this->products = Product::all();
        return view('front.product.manage-product',['products'=>$this->products]) ;
    }
    public function editProduct($id)
    {
        $this->product = Product::find($id);
        return view('front.product.edit-product',['product'=> $this->product]);
    }
    public function updateProduct(Request $request, $id)
    {
        Product::updateProduct($request,$id);
        return redirect('/manage-product')->with('message','Product Info Updated Succesfully.');
    }
    public function deleteProduct( $id)
    {
        Product::deleteProduct($id);
        return redirect('/manage-product')->with('message','Product Info Deleted Succesfully.');
    }

}
