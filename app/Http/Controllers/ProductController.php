<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {

    }

    public function index(Request $request)
    {
//       $artname=$request->session()->get('product_artname');
        $filter = $request->session()->get('product.filter');

        $products=Product::filter($filter)->with('categories')->get();


        return view("products.index", [
            "products" => $products,
            "filter" => $filter,
        ]);
    }





    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("products.create", [
            "products"=>Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//       Product::create($request->all());
//       return redirect()->route("products.index");

        $product=new Product();
        $product->artname=$request->artname;
        $product->name=$request->name;
        $product->surname=$request->surname;
        $product->price=$request->price;
        $product->save();
        return redirect()->route("products.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
//        return view("products.edit", [
//            "product"=>$product,
//            "categories"=>Category::all()
//        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view("products.edit", [
            "product"=>$product,
             "categories"=>Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
//    public function update($id){
//        $product=Product::find($id);
//        //$product->fill($request->all());
//        $product->save();
//        return view("products.index", [
//            "product"=>$product
//        ]);
//    }
    public function update( $id)
    {
        $product=Product::find($id);
//        $product->fill($request->all());
//        $product->save();
        return redirect()->route("products.index");
    }
//    public function update( $id){
//
//        $product->save();
//        return view("products.index", [
//            "product"=>$product
//        ]);
//    }

    public function save(Request $request, $id){
        $product=Product::find($id);
        $product->artname=$request->artname;
        $product->name=$request->name;
        $product->surname=$request->surname;
        $product->price=$request->price;
        $product->save();
        return redirect()->route("products.index");
    }



    /**
     * Remove the specified resource from storage.
     */



    public function destroy(Product $product): \Illuminate\Http\RedirectResponse
    {
        $product->delete();
        return redirect()->route("products.index");
    }

    public function search(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->session()->put('product_artname',$request->artname);
        $filter=new \stdClass();
        $filter->artname=$request->artname;
        $filter->name=$request->name;
        $filter->surname=$request->surname;
        $request->session()->put('product.filter',$filter);

        return redirect()->route('products.index');
    }

    public function forget(Request $request)
    {
        $request->session()->forget('artname');
        $request->session()->forget('name');
        $request->session()->forget('surname');
        $request->session()->forget('price');
        return redirect()->route('products.index');
    }
}
