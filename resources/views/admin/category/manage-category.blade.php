@extends('admin.master')
@section('title', 'manage-category')
@section('body')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Category Tables</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Category Data Tables</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(Session::has('status'))
                <div class="alert alert-success">
                    {{ Session::get('status') }}
                </div>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($category as $value)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $value->category_name }}</td>
                            <td>{{ $value->category_description }}</td>
                            <td>{{ $value->publication_status == 1 ? 'Published' : 'Unpublished'}}</td>
                            <td>
                                @if($value->publication_status == 1)
                                    <a href="{{ route('status-change', ['id' => $value->id]) }}"><span class="fa fa-arrow-up" style="font-size:20px;color:green"></span></a>
                                @else
                                    <a href="{{ route('status-change-published', ['id' => $value->id]) }}"><span class="fa fa-arrow-down" style="font-size:20px;color:red"></span></a>
                                @endif
                                <a href="{{ route('category-edit', ['id' => $value->id] ) }}"><i class='fas fa-edit' style='font-size:20px;color:'></i></a>
                                <a href="{{ route('category-delete', ['id' => $value->id] ) }}"><i class='fas fa-trash' style='font-size:20px;color:'></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
