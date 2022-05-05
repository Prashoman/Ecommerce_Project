@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{route('dashboard.profile')}}">Profile</a></li>
                <li class="breadcrumb-item active"><a href="{{route('category.index')}}">Category</a></li>
            </ol>

            <div class="row" id="category">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            All Category
                        </div>

                        @if (session('category_update'))
                         <div class="alert alert-success">
                            {{session('category_update')}}

                          </div>

                        @endif
                        <div class="card-body">
                            <table id="slider" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <td>Sl</td>
                                        <td>Category Name</td>
                                        <td>Category Photo</td>
                                        <td>IS Top Category</td>
                                        <td>active</td>
                                    </tr>


                                </thead>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$category->category_name}}</td>
                                        <td><img src="{{ asset('uploads/category_photos')}}/{{$category->category_photo}}" class="img-fluid" style="width: 80px; height:70px;" alt="Not found"></td>
                                        <td>{{$category->is_top_category}}</td>
                                        <td>
                                            <a href="{{route('category.edit',$category->id)}}" class="btn btn-sm btn-success">Edit</a>
                                            <a href="{{url('/')}}" class="btn btn-sm btn-info">View</a>
                                            <a href="" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center text-danger">
                                        <td colspan="50">Nothing To Show</td>
                                    </tr>
                                @endforelse


                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header">
                            Add  Category
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Category Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="category_name" class="form-control" placeholder="Enter category name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Category Photo</label>
                                        <div class="col-sm-8">
                                            <input type="file" name="category_photo" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-4">Is Top category</div>
                                        <div class="col-sm-8">
                                            <div class="form-check">
                                                <input id="click" name="is_top_category" class="form-check-input" type="checkbox">
                                                <label for="click" class="form-check-label">
                                                    Yes
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-sm btn-primary">Add Category</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#slider').DataTable();
        } );
    </script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
@endpush
