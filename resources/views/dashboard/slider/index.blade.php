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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            All Slider
                            <a href="{{route('slider.create')}}" class="btn btn-info">Add Slider</a>
                        </div>

                        @if (session('slider_update'))
                         <div class="alert alert-success">
                            {{session('slider_update')}}

                          </div>

                        @endif
                        <div class="card-body">
                            <table id="slider" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <td>Sl</td>
                                        <td>Small Tittle</td>
                                        <td>Big Tittle</td>
                                        <td>Big Sub Tittle</td>
                                        <td>Despription</td>
                                        <td>Slider Photo</td>
                                        <td>Deleted Price</td>
                                        <td>Sell Price</td>
                                        <td>active</td>
                                    </tr>


                                </thead>
                                @forelse ($sliders as $slider)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$slider->small_tittle}}</td>

                                        <td>{{$slider->big_tittle}}</td>
                                        <td>{{$slider->big_sub_tittle}}</td>
                                        <td>{{$slider->slider_discription}}</td>

                                        <td><img src="{{ asset('uploads/slider_photos')}}/{{$slider->slider_photo}}" class="img-fluid" style="width: 80px; height:70px;" alt="Not found"></td>
                                        <td>{{$slider->del_price}}</td>
                                        <td>{{$slider->sell_price}}</td>
                                        <td>
                                            <a href="{{route('slider.edit',$slider->id)}}" class="btn btn-sm btn-success">Edit</a>
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
