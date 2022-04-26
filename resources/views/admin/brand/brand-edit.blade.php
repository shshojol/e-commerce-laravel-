@extends('admin.master')
@section('body')
<div class="container">
    <h2>Update Brand form</h2>
    @if(Session::has('status'))
    <div class="alert alert-success">
        {{ Session::get('status') }}
    </div>
    @endif
    <form action="{{ route('brand.update') }} " method="post">
        @csrf
      <div class="form-group">
        <label for="name">Brand Name:</label>
        <input type="text" class="form-control"  placeholder="Enter Brand name" name="brand_name" value="{{ $brand->brand_name }}">
        <input type="hidden"  name="brand_id" value="{{ $brand->id }}">
        @error('brand_name')
            <sapn class="text-danger">{{ $message }}<span>
        @enderror
      </div>
      <div class="form-group">
        <label for="name">Brand description:</label>
        <input type="text" class="form-control"  placeholder="Enter Brand description" name="brand_description" value="{{ $brand->brand_description }}">
        @error('brand_description')
            <sapn class="text-danger">{{ $message }}<span>
        @enderror
      </div>

      <div class="form-group">
        <label class="form-check-label">Publication Status: </label>
          <input type="radio" value="1" name="publication_status" {{ $brand->publication_status == 1 ? 'checked' : ''}}>Publish
          <input type="radio" value="0" name="publication_status" {{ $brand->publication_status == 0 ? 'checked' : ''}}>Unpublish
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection
