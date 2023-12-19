<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductFormRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Brand;
use App\Models\Color;
use App\Models\ProductColor;
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
    $colors=Color::all();
    return view('admin.product.create',compact('categories','brands','colors'));
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
             if($request->colors){
                foreach($request->colors as $key => $color){
                    $product->productColors()->create([
                       'product_id'=>$product->id,
                       'color_id'=>$color,
                       'quantity' => $request->colorquantity[$key] ?? 0
                    ]);
                }
             }

        return redirect()->route('admin.product.index')->with('message','Product Added Successfully');

   }

   public function edit($product_id){
     $product = Product::findOrFail($product_id);
     $categories = Category::all();
     $brands = Brand::all();
     $product_colors = $product->productColors->pluck('color_id')->toArray();
     $colors = Color::whereNotIn('id',$product_colors)->get();

     return view('admin.product.edit',compact('product','categories','brands','colors'));
   }
    public function update(ProductFormRequest $request , int $product_id )
   {
        $validatedData= $request->validated();
        $product = Category::findOrFail($validatedData['category_id'])
        ->products()->where('id',$product_id)->first();
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
   if($request->colors){
                foreach($request->colors as $key => $color){
                    $product->productColors()->create([
                       'product_id'=>$product->id,
                       'color_id'=>$color,
                       'quantity' => $request->colorquantity[$key] ?? 0
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

  public function destroyProductColor($product_color_id){
    $product_color = ProductColor::findOrFail($product_color_id);
    $product_color->delete();
    return  response()->json([
        'message'=>'Product Color  deleted'
    ]);

  }
  public function updateProductColorQuantity(Request $request , $product_color_id){

    $product_color = ProductColor::findOrFail($product_color_id);
    $productColorData = Product::findOrFail($request->product_id)
    ->productColors()->where('id',$product_color_id)->first();
    $productColorData->update([
        'quantity' => $request->qty
    ]);
     return  response()->json([
        'message'=>'Product Color Quantity Updated'
    ]);


  }
}
