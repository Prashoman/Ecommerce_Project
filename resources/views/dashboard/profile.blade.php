@extends('layouts.app')

@section('content')




<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{route('dashboard.profile')}}">Profile</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo">
                                <img src="{{ asset('uploads/cover_photos')}}/{{auth()->user()->cover_photo}}" class="img-fluid rounded-circle" alt="Not found">
                            </div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">

                                <img src="{{ asset('uploads/profile_photos')}}/{{auth()->user()->profile_photo}}" class="img-fluid rounded-circle" alt="Not found">
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">{{auth()->user()->name}}</h4>
                                    <p>Name</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">{{auth()->user()->email}}</h4>
                                    <p>Email</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">{{auth()->user()->created_at->diffForHumans()}}</h4>
                                    <p>Account Created Date</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-tittle">Change Name</h3>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                        <form action="{{url('change/name')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" value="{{auth()->user()->name}}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-info">Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">

                    <div class="card-header">
                        <h3 class="card-tittle">Change Profile Photo</h3>
                    </div>
                    <div class="card-body">
                        @if (session('profile_success'))
                            <div class="alert alert-success">
                                {{session('profile_success')}}
                            </div>
                        @endif
                        <form action="{{url('change/photo')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Profile Photo</label>
                                <input type="file" name="profile_photo"  class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-info">Change Photo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">

                    <div class="card-header">
                        <h3 class="card-tittle">Change Cover Photo</h3>
                    </div>
                    <div class="card-body">
                        @if (session('cover_succes'))
                            <div class="alert alert-success">
                                {{session('cover_succes')}}
                            </div>
                        @endif
                        <form action="{{url('change/coverphoto')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Cover Photo</label>
                                <input type="file" name="cover_photo"  class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-info">Change Photo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-tittle">Change Password</h3>
                    </div>
                    <div class="card-body">
                        @if (session('pass_succes'))
                            <div class="alert alert-success">
                                {{session('pass_succes')}}
                            </div>
                        @endif
                        @if (session('match_success'))
                            <div class="alert alert-danger">
                                {{session('match_success')}}
                            </div>
                        @endif

                        @if (session('wrong_success'))
                            <div class="alert alert-danger">
                                {{session('wrong_success')}}
                            </div>
                        @endif
                        <form action="{{url('change/password')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-4">
                                    <label for="" class="form-label">Curennt Password</label>
                                    <input type="password" name="curent_pass"  class="form-control">
                                </div>
                                <div class="mb-3 col-4">
                                    <label for="" class="form-label">New Password</label>
                                    <input type="password" name="pass"  class="form-control">
                                </div>
                                <div class="mb-3 col-4">
                                    <label for="" class="form-label">Confirm Password</label>
                                    <input type="password" name="pass_confrim"  class="form-control">
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-info">Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
