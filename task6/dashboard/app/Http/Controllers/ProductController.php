<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Services\Media;

class ProductController extends Controller
{
   public function index()
   {
    $products = Product::all() ;
    return view('products.index',compact('products'));
   }

   public function create()
   {
    $brands = Brand::all();
    $subcategories = Subcategory::all();
    return view('products.create',compact('brands','subcategories'));
   }

   public function edite($id)
   {
    $products = Product::findOrFail($id);
    $brands = Brand::select('id','name_en')->orderby('name_en','ASC')->get();
    $subcategories = Subcategory::select('id','name_en')->orderby('name_en','ASC')->get();
    return view('products.edite',compact('brands','subcategories'));

   }
   public function store(Request $request)
   {
    //dd($request); // dump and die request

      $request->validate([

     ]);
        //image
        $imageName = $request->file('image')->hashName();
        $request->file('image')->move(public_path('imgs\product'),$imageName);
        $newData = $request->except('_token','image');
        $newData['image']= $imageName;
      // dd($newData);
        //create new data in db
        Product::create($newData);
        // redirect to this url after create data without new Rout::
        return redirect()->route('dashboard.products.index')->with('success','Bravo you create product');
   }

   public function update(UpdateProductRequest $request ,$id )
   {
    $data = $request->except('_token','_method','image');
    $product = Product::findOrFail($id);
    if($request->hasFile('image')){
        // upload new image
        $newImageName = Media::upload($request->file('image'),'product');
        $data['image'] = $newImageName;
        // delete old image
        Media::delete(public_path('images\product\\'.$product->image));
        return redirect()->route('dashboard.products.index')->with('success','Bravo you update product');
    }
}

public function delete($id)
{
    $product = Product::findOrFail($id);
    Media::delete(public_path('images\product\\'.$product->image));
    return redirect()->route('dashboard.products.index')->with('Product Deleted Successfully');
}

}
