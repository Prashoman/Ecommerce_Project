

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
                <li class="breadcrumb-item active"><a href="{{route('slider.index')}}">Slider</a></li>
                <li class="breadcrumb-item active"><a href="">--{{$slider->big_tittle}}</a></li>
            </ol>

            <div class="row" id="category">
                <div class="col-lg-7 m-auto">
                    <div class="card">
                        <div class="card-header">
                            Edit  Slider
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" action="{{route('slider.update', $slider->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Small Tittle</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="small_tittle" class="form-control" value="{{$slider->small_tittle}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Big Tittle</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="big_tittle" class="form-control" value="{{$slider->big_tittle}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Big Sub Tittle</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="big_sub_tittle" class="form-control" value="{{$slider->big_sub_tittle}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Cureent Slider Photo</label>
                                        <div class="col-sm-8">
                                            <img src="{{ asset('uploads/slider_photos')}}/{{$slider->slider_photo}}" class="img-fluid" style="width: 80px; height:70px;" alt="Not found">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"> New Slider Photo</label>
                                        <div class="col-sm-8">
                                            <input type="file" name="slider_photo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Delete Price</label>
                                        <div class="col-sm-8">
                                            <input type="number" name="delete_price" class="form-control" value="{{$slider->del_price}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Sell Price</label>
                                        <div class="col-sm-8">
                                            <input type="number" name="sell_price" class="form-control" value="{{$slider->sell_price}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Slider Description</label>
                                        <div class="col-sm-8">
                                            <textarea name="slider_description" class="form-control">{{$slider->slider_discription}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-sm btn-primary">Edit Slider</button>
                                            <a href="{{route('slider.index')}}" class="btn sm-btn btn-info">Back</a>
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
