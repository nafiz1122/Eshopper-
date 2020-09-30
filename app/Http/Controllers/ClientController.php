<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
class ClientController extends Controller
{
    public function index()
    {
        $products = Product::all()
                   ->where('product_status',1)
                   ->take(9);
        // $products = Product::all();
        // //dd($products);
        // echo $products->category_id;
        return view('client.content',compact('products'));
    }
    public function product_by_category($category_id)
    {
        //$products = Category::all();
        // $products = Category::all()
        //             ->where('product.category_id',$category_id);
        //dd($products);
        $cat_products = Category::find($category_id);
                        
        $products = $cat_products->product
                    ->where('product_status',1);;
        //dd($products);
        return view('client.product_by_category',compact('products'));
    }
    //view single product
    public function singleView($id)
    {
        $product = Product::find($id);
        //dd($product);
        return view('client.singleProduct',compact('product'));
    }
}
