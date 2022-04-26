@extends('admin.master')
@section('body')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Brand Tables</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Brand Data Tables</h6>
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
                            <th>Brand Name</th>
                            <th>Brand Description</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($brand as $value)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $value->brand_name }}</td>
                            <td>{{ $value->brand_description }}</td>
                            <td>{{ $value->publication_status == 1 ? 'Published' : 'Unpublished'}}</td>
                            <td>
                                @if($value->publication_status == 1)
                                    <a href="{{ route('change_brand_status_to_unpublished', ['id' => $value->id]) }}"><span class="fa fa-arrow-up" style="font-size:20px;color:green"></span></a>
                                @else
                                    <a href="{{ route('change_brand_status_to_published', ['id' => $value->id]) }}"><span class="fa fa-arrow-down" style="font-size:20px;color:red"></span></a>
                                @endif
                                <a href="{{ route('brand.edit', ['id' => $value->id]) }}"><i class='fas fa-edit' style='font-size:20px;color:'></i></a>
                                <a href="{{ route('brand.delete', ['id' => $value->id]) }}"><i class='fas fa-trash' style='font-size:20px;color:'></i></a>
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
