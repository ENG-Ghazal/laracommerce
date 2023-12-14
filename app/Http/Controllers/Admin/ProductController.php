<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductFormRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
   public function index(){
    $products = Product::all();
    return view('admin.product.index',compact('products'));
   }
   public function create(){
    $categories = Category::all();
    $brands = Brand::all();
    return view('admin.product.create',compact('categories','brands'));
   }
   public function store(ProductFormRequest $request)
   {
            $validatedData= $request->validated();
            $category = Category::findOrFail($validatedData['category_id']);
            $product =  $category->products()->create([
               'category_id' => $validatedData['category_id'],
               'name' => $validatedData['name'],
               'slug' => Str::slug($validatedData['slug']),
               'brand' => $validatedData['brand'],
               'small_description' => $validatedData['small_description'],
               'description' => $validatedData['description'],
               'original_price' => $validatedData['original_price'],
               'selling_price' => $validatedData['selling_price'],
               'quantity' => $validatedData['quantity'],
               'trending' => $request->trending == true ?'1':'0',
               'status' => $request->status == true ?'1':'0',
               'meta_title' => $validatedData['meta_title'],
               'meta_description' => $validatedData['meta_description'],
               'meta_keyword' => $validatedData['meta_keyword'],
             ]);

             if($request->hasFile('image')){
                $uploadPath ='uploads/Products/';
                $i = 1;
                foreach($request->file('image') as $imageFile){
                    $extension = $imageFile->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extension;
                    $imageFile->move($uploadPath,$filename);
                    $finalImagePathName= $uploadPath.$filename;

                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName
                  ]);

                }
             }

        return redirect()->route('admin.product.index')->with('message','Product Added Successfully');

   }

   public function edit($product_id){
     $product = Product::findOrFail($product_id);
     $categories = Category::all();
     $brands = Brand::all();
     return view('admin.product.edit',compact('product','categories','brands'));
   }
    public function update(ProductFormRequest $request , int $product_id , )
   {
        $validatedData= $request->validated();
        $product = Catgeory::findOrFail($validatedData['category_id'])->products()->where('id',$product_id)->first();
        if($product){
         $product->update([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'brand' => $validatedData['brand'],
            'small_description' => $validatedData['small_description'],
            'description' => $validatedData['description'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
            'trending' => $request->trending == true ?'1':'0',
            'status' => $request->status == true ?'1':'0',
            'meta_title' => $validatedData['meta_title'],
            'meta_description' => $validatedData['meta_description'],
            'meta_keyword' => $validatedData['meta_keyword'],
         ]);

         if($request->hasFile('image')){
            $uploadPath ='uploads/Products/';
            $i = 1;
            foreach($request->file('image') as $imageFile){
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extension;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName= $uploadPath.$filename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName
              ]);

            }
         }

         return redirect()->route('admin.product.index')->with('message','Product Updated Successfully');

        }
        else{
            return redirect()->route('admin.product.index')->with('message','No Product Id Found');
        }
   }
   public function destroy($product_id){
       $product = Product::findOrFail($product_id);
       $product_images = $product->productImages;
       if(count($product_images) > 0 ){
         foreach($product_images as $product_image){
            if(File::exists($product_image->image)){
                File::delete($product_image->image);
             }
              $product_image->delete();
         }
       }
       $product->delete();
       return redirect()->back()->with('message','product  deleted successfuly ');
   }
   public function destroyProductImage($product_image_id){
     $productImage = ProductImage::findOrFail($product_image_id);
     if(File::exists($productImage->image)){
        File::delete($productImage->image);
     }
      $productImage->delete();
       return redirect()->back()->with('message','product image deleted successfuly ');

   }
  
}
