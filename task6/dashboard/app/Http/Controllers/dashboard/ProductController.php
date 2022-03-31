<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Services\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use function PHPUnit\Framework\isNull;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();
        return view('dashboard.products.index', compact('products'));
    }
    public function create()
    {
        $subcategories = DB::table('subcategories')->select('id', 'name_en')->orderBy('name_en')->get();
        $brands = DB::table('brands')->select('id', 'name_en')->orderBy('name_en')->get();

        return view('dashboard.products.create', compact('subcategories', 'brands'));
    }
    public function edit($id)
    {
        $subcategories = DB::table('subcategories')->select('id', 'name_en')->orderBy('name_en')->get();
        $brands = DB::table('brands')->select('id', 'name_en')->orderBy('name_en')->get();
        $products = DB::table('products')->where('id', $id)->first();
        if (is_null($products)) {
            abort(404);
        }

        return view('dashboard.products.edit', compact('subcategories', 'brands', 'products'));
    }
    public function store(StoreProductRequest $request)
    {
        // dd($request->all());

        $imageName = Media::upload($request->file('image'), 'products');
        $data = $request->except('_token', 'image');
        $data['image'] = $imageName;
        DB::table('products')->insert($data);
        return redirect()->route('dashboard.products.index')->with('success', 'this product added successfuly');
    }

    public function update(UpdateProductRequest $request, $id)
    {
        // dd($request->all());

        //if image exist ->upload image & remove old imge
        $product = DB::table('products')->find($id);
        if (is_null($product)) {
            abort(404);
        }
        $data = $request->except('_token', 'image', '_method');

        if ($request->hasFile('image')) {
            $imageName = Media::upload($request->file('image'), 'products');

            if (($product->image) != '') {
                $removedimage = public_path("assets\images\products\\{$product->image}");
                Media::delete($removedimage);
            }
            $data['image'] = $imageName;
        }
        DB::table('products')->where('id', $id)->update($data);
        return redirect()->route('dashboard.products.index')->with('success', 'this product updated successfuly');
    }

    public function destroy($id)
    {
        $product = DB::table('products')->find($id);
        if (is_null($product)) {
            abort(404);
        }
        if (($product->image) != '') {
            $removedimage = public_path("assets\images\products\\{$product->image}");
            Media::delete($removedimage);
        }
        DB::table('products')->where('id', $id)->delete();
        return redirect()->route('dashboard.products.index')->with('success', 'this product deleted successfuly');
    }
    public function toggleStatus(Request $request,$id)
    {
        DB::table('products')->where('id',$id)->update(['status'=>(int) ! $request->input('status')]);
        return redirect()->route('dashboard.products.index')->with('success', 'this product updated successfuly');

    }
}
