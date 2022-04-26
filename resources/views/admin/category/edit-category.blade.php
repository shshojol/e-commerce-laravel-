@extends('admin.master')
@section('title', 'Update category')
@section('body')
<div class="container">
    <h2>Update Category form</h2>
    @if(Session::has('status'))
    <div class="alert alert-success">
        {{ Session::get('status') }}
    </div>
    @endif
    <form action="{{ route('update-category') }}" method="post">
        @csrf
      <div class="form-group">
        <label for="name">Category Name:</label>
        <input type="text" class="form-control" value="{{ $cat->category_name }}" id="name" placeholder="Enter category name" name="category_name">
        <input type="hidden" class="form-control" value="{{ $cat->id}}" name="category_id">
      </div>
      <div class="form-group">
        <label for="name">Category description:</label>
        <input type="text" class="form-control" value="{{ $cat->category_description }}" id="description" placeholder="Enter category description" name="category_description">

      </div>

      <div class="form-group">
        <label class="form-check-label">Publication Status: </label>
          <input type="radio" value="1" name="publication_status" {{ $cat->publication_status == 1 ? 'checked' : '' }}>Publish
          <input type="radio" value="0" name="publication_status" {{ $cat->publication_status == 0 ? 'checked' : '' }}>Unpublish
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
@endsection
