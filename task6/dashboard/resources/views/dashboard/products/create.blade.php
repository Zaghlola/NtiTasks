@extends('dashboard.layouts.app')
@section('title', 'Create Products')
@section('content')
    @include('includes.display-error-mes')
    <div class="col-12">
        <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- <div class="form-group">
            <div class="col-6">
                <input type="text" class="form-control" name="name_en " id="" placeholder="Name In English" >
            </div>
        </div> --}}
            <div class="row">

                <div class="form-group col-6">
                    <input type="text" class="form-control" name="name_en" id="" placeholder="Name In English"
                        value="{{ old('name_en') }}">
                </div>
                <div class="form-group col-6">
                    <input type="text" class="form-control" name="name_ar" id="" placeholder="Name In Arabic"
                        value="{{ old('name_ar') }}">
                </div>

            </div>

            <div class="row">

                <div class="form-group col-6">
                    <input type="number" class="form-control" name="code" id="" placeholder="Code"
                        value="{{ old('code') }}">
                </div>
                <div class="form-group col-6">
                    <input type="number" class="form-control" name="price" id="" placeholder="Price"
                        value="{{ old('price') }}">
                </div>
            </div>
            <div class="row">

                <div class="form-group col-6">
                    <input type="number" class="form-control " name="quantity" id="" placeholder="Quantity"
                        value="{{ old('quantity') }}">
                </div>
                <div class="form-group col-6 ">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="w-75"  style="height: 35px">
                        <option value="1" @selected(old('status') == '1')>Active</option>
                        <option value="0" @selected(old('status') == '0')>Not Active</option>

                    </select>
                </div>
            </div>
            <div class="row">

                <div class="form-group col-6">
                    <label for="subcategory_id">Sub Category</label>
                    <select name="subcategory_id" id="subcategory_id" class="w-75"  style="height: 35px">
                        @foreach ($subcategories as $sub)
                            <option value="{{ $sub->id }}" @selected(old('subcategory_id') == $sub->id)>{{ $sub->name_en }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="brand_id">Brand</label>
                    <select name="brand_id" id="brand_id" class="w-75" style="height: 35px">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" @selected(old('brand_id') == $brand->id)>{{ $brand->name_en }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">

                
            <div class="form-group  col-6">
                <textarea name="detailes_en" id="" cols="30" rows="10"
                    placeholder="Detailes In English">{{ old('detailes_en') }}</textarea>
            </div>
            <div class="form-group col-6">
                <textarea name="detailes_ar" id="" cols="30" rows="10"
                    placeholder="Detailes In Arabic">{{ old('detailes_en') }}</textarea>
            </div>
                </div>
            <div class="form-group">
                <label for="image"> Choose Product Image </label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group ">
                <button class="btn btn-outline-primary rounded btn-sm col-3 offset-4 font-wight-bold">Create</button>
            </div>

        </form>
    </div>


@endsection
