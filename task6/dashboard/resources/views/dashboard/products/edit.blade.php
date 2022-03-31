@extends('dashboard.layouts.app')
@section('title', 'Edit Products')
@section('content')
    @include('includes.display-error-mes')

    <div class="col-12">
        <form action="{{ route('dashboard.products.update', ['id' => $products->id]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">

                <div class="form-group col-6">
                    <input type="text" class="form-control" name="name_en" id="" placeholder="Name In English"
                        value="{{ $products->name_en }}">
                </div>
                <div class="form-group  col-6">
                    <input type="text" class="form-control" name="name_ar" id="" placeholder="Name In Arabic"
                        value="{{ $products->name_ar }}">
                </div>
            </div>

            <div class="row">

                <div class="form-group col-6">
                    <input type="number" class="form-control" name="code" id="" placeholder="Code"
                        value="{{ $products->code }}">
                </div>
                <div class="form-group col-6">
                    <input type="number" class="form-control" name="price" id="" placeholder="Price"
                        value="{{ $products->price }}">
                </div>
            </div>


            <div class="row">

                <div class="form-group col-6">
                    <input type="number" class="form-control" name="quantity" id="" placeholder="Quantity"
                        value="{{ $products->quantity }}">
                </div>
                <div class="form-group col-6">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="w-75" style="height: 35px">
                        <option value="1" @selected($products->status == '1')>Active</option>
                        <option value="0" @selected($products->status == '0')>Not Active</option>

                    </select>
                </div>
            </div>


            <div class="row">

                <div class="form-group col-6">
                    <label for="subcategory_id">Sub Category</label>
                    <select name="subcategory_id" id="subcategory_id" class="w-75" style="height: 35px">
                        @foreach ($subcategories as $sub)
                            <option value="{{ $sub->id }}" @selected($sub->id == $products->subcategory_id)>{{ $sub->name_en }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="brand_id">Brand</label>
                    <select name="brand_id" id="brand_id" class="w-75" style="height: 35px">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" @selected($brand->id == $products->brand_id)>{{ $brand->name_en }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

   
    <div class="row">

        <div class="form-group col-6">
            <textarea name="detailes_en" id="" cols="30" rows="10"
                placeholder="Detailes In English">{{ $products->detailes_en }}</textarea>
        </div>
        <div class="form-group col-6">
            <textarea name="detailes_ar" id="" cols="30" rows="10"
                placeholder="Detailes In Arabic">{{ $products->detailes_ar }}</textarea>
        </div>
    </div>
    <div class="form-group col-12">
        <label for="image"> Choose Product Image </label>
        <input type="file" name="image" class="form-control">
        <div class="col-4">
            <img src="{{ asset('assets/images/products/' . $products->image) }}" alt="{{ $products->name_en }}"
                class="w-100">
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-outline-primary rounded btn-sm col-3 offset-4 font-wight-bold">Update</button>
    </div>

    </form>
    </div>


@endsection
