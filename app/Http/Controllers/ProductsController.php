<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Product;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Helper\productTrait ;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use productTrait ;
    public function index()
    {
        $getLang = LaravelLocalization::getCurrentLocale() ;
        $products = Product::select('id'  ,  'product_name_'.$getLang.' as product_name' , 'product_description_'.$getLang.' as product_description' , 'price' , 'product_image')->get();
        return view('CRUD.home' , compact('products')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang =  LaravelLocalization::getCurrentLocale() ;
        return view('CRUD.create' , compact('lang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(PostRequest $request)
    {

        $path = "images/products_images" ;
        $product_image = $request->product_image ;
        $data = [
            'price'=>$request->price ,
            'product_description_en'=> $request->product_description_en ,
            'product_description_ar'=> $request->product_description_ar ,
            'product_name_en'=> $request->product_name_en ,
            'product_name_ar'=> $request->product_name_ar ,
            'product_image'=>$this->saveImage($product_image , $path) ,
        ] ;
        Product::create($data) ;
        return redirect()->route('product.index')->with(['success' => 'added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Product $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('CRUD.update' , compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
         $product  = Product::find($id);
         $product->productName = $request->productName ;
         $product->price = $request->price;
         $product->description = $request->description ;
         $product->save();
         return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id) ;
        $products->delete();
        return redirect()->back()->with('success' , 'deleted');
    }

    protected function getLocation(){
        return LaravelLocalization::getCurrentLocale();
    }
}
