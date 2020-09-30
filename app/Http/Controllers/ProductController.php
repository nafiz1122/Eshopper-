<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categories = Category::where('cat_status',1)->get();
        $Brands     = Brand::where('status',1)->get();
        $products = Product::all();
        //dd($products);

        return view('admin.product.addProduct',compact('Categories','Brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_id'=>'required',
            'brand_id'=>'required',
            'product_name'=>'required',
            'product_short_des'=>'required',
            'product_long_des'=>'required',
            'product_price'=>'required',
            'product_size'=>'required',
            'product_color'=>'required',
            'product_size'=>'required',
            'product_size'=>'required',
            'product_image' => 'mimes:jpeg,jpg,png | max:2000',
        ]);
        $products = new Product;
        $products->category_id          = $request->input('category_id');
        $products->brand_id             = $request->input('brand_id');
        $products->product_name         = $request->input('product_name');
        $products->product_short_des    = $request->input('product_short_des');
        $products->product_long_des     = $request->input('product_long_des');
        $products->product_price        = $request->input('product_price');
        $products->product_size         = $request->input('product_size');
        $products->product_color        = $request->input('product_color');
        $products->product_status       = $request->input('product_status',0);
        //image Upload 
        //image upload
		$upload_image = $request->hasFile('product_image');
		if ($upload_image){
        $image = $request->file('product_image');
        $x     ="abcdefghijklmnopqrstuvwxyz0123456789";
        $x     =str_shuffle($x);
        $x     =substr($x, 0, 6).".";
        $name  = time().$x.$image->getClientOriginalExtension();
        $destinationPath ='Client_images/Product_images/';
        $image_url =$name;
        $success = $image->move($destinationPath, $name);
        $products->product_image = $image_url;
        $products->save();
        return back()->with('message', 'Product Successfully Added');
        }
        else{
            $products->save();
            return back()->with('message', 'Product Successfully Add Without Image ');
        }

    }
        //$products->product_image = $request->input('product_image');

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $products = Product::all();
        //dd($products);
        return view('admin.product.allProduct',compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product,$id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with('message', 'Product Delete Successfully');
    
    }
    public function inactive_product($id)
    {
        $updateProduct = Product::find($id);
        $updateProduct->product_status  = 0;
        $updateProduct->update();
         return back()->with('message', 'Brand Inactive Successfully');
    }
    public function active_product($id)
    {
        $updateProduct = Product::find($id);

        $updateProduct->product_status  = 1;

        $updateProduct->update();

         return back()->with('message', 'Brand Active Successfully');;
    }
    //view single product
    
}
