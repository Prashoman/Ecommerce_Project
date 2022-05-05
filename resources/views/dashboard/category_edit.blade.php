@extends('layouts.app')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{route('dashboard.profile')}}">Profile</a></li>
                <li class="breadcrumb-item active"><a href="{{route('category.index')}}">Category</a></li>
                <li class="breadcrumb-item active"><a href="">--{{$category->category_name}}</a></li>
            </ol>

            <div class="row">

                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            Edit  Category
                        </div>

                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" action="{{route('category.update', $category->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Category Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="category_name" class="form-control" value="{{$category->category_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"> curent Category Photo</label>
                                        <div class="col-sm-8">
                                            <img src="{{ asset('uploads/category_photos')}}/{{$category->category_photo}}" class="img-fluid" style="width: 80px; height:70px;" alt="Not found">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"> New Category Photo</label>
                                        <div class="col-sm-8">
                                            <input type="file" name="category_photo" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-4">Is Top category</div>
                                        <div class="col-sm-8">
                                            <div class="form-check">
                                                <input id="click" name="is_top_category" class="form-check-input" {{($category->is_top_category=='yes'?'checked':'')}} type="checkbox">
                                                <label for="click" class="form-check-label">
                                                    Yes
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-sm btn-primary">Update Category</button>
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
