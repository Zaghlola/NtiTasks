<?php

namespace App\Http\Controllers\Apis;

use App\Models\Brand;
use App\Models\Product;
use App\traits\ApiTrait;
use App\traits\ApiTraits;
use App\Models\Subcategory;
use App\Http\Services\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index(){
        $products=Product::all();
        return ApiTraits::data(compact('products'));
    }
    public function create(){

       $brands=Brand::select('id','name_en','name_ar')->orderBy('name_en')->get();
       $subcategories=Subcategory::select('id','name_en','name_ar')->orderBy('name_en')->get();
        return ApiTraits::data(compact('brands','subcategories'),201);
    }
    public function edit($id){

        $product=Product::findOrFail($id);
        $brands=Brand::select('id','name_en','name_ar')->orderBy('name_en')->get();
       $subcategories=Subcategory::select('id','name_en','name_ar')->orderBy('name_en')->get();
        return ApiTraits::data(compact('product','brands','subcategories'));
 
    }
    public function store(StoreProductRequest $request){
        $imageName = Media::upload($request->file('image'), 'products');
        $data = $request->except( 'image');
        $data['image'] = $imageName;
        Product::create($data);
        return ApiTraits::successMessage('Producted added successfully',201);
    }
    public function update(UpdateProductRequest $request ,$id){
       $product=Product::findOrFail($id);
      
        $data = $request->except( 'image');

        if ($request->hasFile('image')) {
            $imageName = Media::upload($request->file('image'), 'products');

            if (($product->image) != '') {
                $removedimage = public_path("assets\images\products\\{$product->image}");
                Media::delete($removedimage);
            }
            $data['image'] = $imageName;
            $product->update($data);
            return ApiTraits::successMessage('Producted updated successfully',201);    
        }
    }
    public function delete($id)
    {
        $product=Product::findOrFail($id);
        if (($product->image) != '') {
            $removedimage = public_path("assets\images\products\\{$product->image}");
            Media::delete($removedimage);
        };
        $product->delete();
        return ApiTraits::successMessage('Producted updated successfully',201);  
      
    }
}
