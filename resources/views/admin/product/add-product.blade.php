@extends('admin.master')
@section('body')
<div class="container">
    <h2>Add Product form</h2>
    @if(Session::has('status'))
    <div class="alert alert-success">
        {{ Session::get('status') }}
    </div>
    @endif
    <form action="{{ route('add-product') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Category Name:</label>
            <select class="form-controll" name="category_name" id="">
                <option value="" selected disabled>---Select Category---</option>
                @foreach ($catagory as $item)
                    <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                @endforeach
            </select>
            @error('category_name')
                <sapn class="text-danger">{{ $message }}<span>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Brand Name:</label>
            <select class="form-controll" name="brand_name" id="">
                <option value="" selected disabled>---Select Brand---</option>
                @foreach($brand as $value)
                    <option value="{{ $value->id }}">{{$value->brand_name}}</option>
                @endforeach
            </select>
            @error('brand_name')
                <sapn class="text-danger">{{ $message }}<span>
            @enderror
        </div>

      <div class="form-group">
        <label for="name">Product Name:</label>
        <input type="text" class="form-control"  placeholder="Enter product name" name="product_name" value="{{ old('product_name') }}">
        @error('product_name')
            <sapn class="text-danger">{{ $message }}<span>
        @enderror
      </div>

      <div class="form-group">
        <label for="name">Product price:</label>
        <input type="number" class="form-control"  placeholder="Enter price" name="product_price" value="{{ old('product_price') }}">
        @error('product_price')
            <sapn class="text-danger">{{ $message }}<span>
        @enderror
      </div>

      <div class="form-group">
        <label for="name">Product Quantity:</label>
        <input type="number" class="form-quantity"  placeholder="Enter quantity" name="product_quantity" value="{{ old('product_quantity') }}">
        @error('product_quantity')
            <sapn class="text-danger">{{ $message }}<span>
        @enderror
      </div>

      <div class="form-group">
        <label for="name">Short description:</label>
        <input type="text" class="form-control"  placeholder="Enter short description" name="short_description">
        @error('short_description')
            <sapn class="text-danger">{{ $message }}<span>
        @enderror
      </div>

      <div class="form-group">
        <label for="name">Long description:</label>
        <input type="text" class="form-control"  placeholder="Enter long description" name="long_description">
        @error('long_description')
            <sapn class="text-danger">{{ $message }}<span>
        @enderror
      </div>

      <div class="form-group">
        <label for="name">product image:</label>
        <input type="file" name="product_image">
        @error('product_image')
            <sapn class="text-danger">{{ $message }}<span>
        @enderror
      </div>

      <div class="form-group">
        <label class="form-check-label">Publication Status: </label>
          <input type="radio" value="1" name="publication_status" checked>Publish
          <input type="radio" value="0" name="publication_status">Unpublish
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection
