<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $filter = $request->session()->get('category.filter');

        $categories=Category::filter($filter)->get();


        return view("categories.index", [
            "categories" => $categories,
            "filter" => $filter,
        ]);
//        $product_id=$request->session()->get('product_id');
//        $techniques=$request->session()->get('techniques');
//        $genres=$request->session()->get('genres');
//        $size=$request->session()->get('size');
//
//
//        $categories=Category::with('products');
//
//        if ($product_id != null) {
//
//            $categories->where('product_id', 'like', "$product_id");
//
//        }
//
//        if ($techniques != null) {
//            $categories->where('techniques', 'like', "%$techniques%");
//        }
//        if ($genres != null) {
//            $categories>where('genres', 'like', "%$genres%");
//        }
//
//        if ($size != null) {
//            $categories->where('size', 'like', "%$size%");
//        }
//
////       $categories = $categories->orderBy('size')->get();
////        $categories = $categories->get();
//        $request->session()->forget('product_id');
//
//        return view("categories.index", [
//
//            "categories"=>$categories,
//            "product_id"=>$product_id,
//            "techniques"=>$techniques,
//            "genres"=>$genres,
//            "size"=>$size
//        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("categories.create", [
            'categories' => Category::all(),
            'products' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'techniques'=>'required',
           'genres'=>'required',
            'size'=>'required'
//        ],[
//            'techniques.required'=>'laukelis privalomas',
//            'genres.required'=>'laukelis privalomas',
//            'size.required'=>'laukelis privalomas',
        ]);

        Category::create($request->all());
        //$category->save();
        return redirect()->route("categories.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view("categories.edit", [
            "category" => $category,
            "products" => Product::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category): \Illuminate\Http\RedirectResponse
    {
        $category->fill($request->all());
        $category->save();
        return redirect()->route("category.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): \Illuminate\Http\RedirectResponse
    {
        $category->delete();
        return redirect()->route("categories.index");
    }

    public function search(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->session()->put('product_id',$request->product_id);
        $filter=new \stdClass();
        $filter->techniques=$request->techniques;
        $filter->size=$request->size;
        $filter->genres=$request->genres;


//        $request->session()->put('product_artname',$request->artname);
//        $filter=new \stdClass();
//        $filter->artname=$request->artname;
//        $filter->name=$request->name;
//        $filter->surname=$request->surname;
        $request->session()->put('category.filter',$filter);

        return redirect()->route('categories.index');
    }

    public function forget(Request $request)
    {
        $request->session()->forget('product_id');
        $request->session()->forget('techniques');
        $request->session()->forget('genres');
        $request->session()->forget('size');
        return redirect()->route('categories.index');
    }
}
