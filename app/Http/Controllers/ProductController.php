<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\Comment;
use App\Http\Requests\ProductCreateRequest;
use App\Subcategory;
use Storage;
use Auth;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role==1) 
        {
        $products = Product::all();
        }
        elseif (auth()->user()->role==2) 
        {
        $products = Product::where('user_id',auth()->user()->id)->get();
        }
       
        return view('admin-dashboard.product-management.all-products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        // $subcategories = Subcategory::all();

        return view('admin-dashboard/product-management/create-product-form', compact('brands','categories'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().$file->getClientOriginalName();
            Storage::put('public/'.$fileName,file_get_contents($file));

        $product = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' =>  $request->category,
            'subcategory_id' => $request->subcategory,
            'price' => $request->price,
            'city' => Auth::user()->city,
            'image_path' => $fileName,
            'user_id' =>  Auth::user()->id, 
            ]);       
        }
      return redirect()->route('product.index')->with('success','product has been successfully added');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id',$id)->first();
        // yaha pe hum product model se data fetch nahi kar rahe q k ye route model binding hain ye khud ba khud Product::find($id) ko call karta hain. oper $product paramtere me $id ata hain aur wo is trah call hota hain $product  = Product::find(1);
        //likan ek baat yad rakna jo object yaha par ap ne paramater me pass kiya hain us ko same it is web me b likna hain jab ap route delare kartey ho is functiion k liye Route:get('name/{same paramter}','controller@function');
        return view('admin-dashboard/product-management/show',compact('product'));//ye hain wo variable jis me result hota hain
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $subcategories  = Subcategory::all();
        $categories = category::all();
        return view('admin-dashboard.product-management.edit-product', compact('brands', 'subcategories', 'categories', 'product'));
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
        $product->title       = $request->title;
        $product->description = $request->description;
        $product->subcategory_id = $request->subcategory;
        $product->category_id    = $request->category;
        $product->price = $request->price;
        
        $product->save();

        if ($request->hasFile('image')) {
            Storage::delete('public/'.$product->image_path);
            $file = $request->file('image');
            $fileName = time().$file->getClientOriginalName();
            Storage::put('public/'.$fileName,file_get_contents($file));
            $product->image_path = $fileName;
            $product->update();
        }
        return redirect()->route('product.index')->with('success', 'product has been update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $product->delete();
        Storage::delete('public/'.$product->image_path);
        return redirect()->route('product.index');
    }

    public function CategoryAjax($id){
    $sub = Subcategory::where('category_id', $id)->get();
        
    
    if($sub)
    { return $sub; }
    else{ return 'aaa'; }

    }
}
