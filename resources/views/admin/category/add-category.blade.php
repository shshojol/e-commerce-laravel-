@extends('admin.master')
@section('title', 'add-category')
@section('body')
<div class="container">
    <h2>Add Category form</h2>
    @if(Session::has('status'))
    <div class="alert alert-success">
        {{ Session::get('status') }}
    </div>
    @endif
    <form action="{{ route('add-category') }}" method="post">
        @csrf
      <div class="form-group">
        <label for="name">Category Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter category name" name="category_name">
      </div>
      <div class="form-group">
        <label for="name">Category description:</label>
        <input type="text" class="form-control" id="description" placeholder="Enter category description" name="category_description">

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
