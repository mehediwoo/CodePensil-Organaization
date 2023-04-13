@extends('admin.layout.app')
@section('title','Profile')
@section('content')

<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Author Profile</h4>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-md-3 col-xl-3">

            <div class="card">
                @if (Auth::user()->profile_image != '')
                <img class="card-img-top img-fluid" src="{{ asset('storage/'.Auth::user()->profile_image) }}" alt="" class="avatar-md rounded-circle">
                @else
                <img class="card-img-top img-fluid" src="{{ asset('admin/assets/images/profile.jpg') }}" alt="" class="avatar-md rounded-circle">
                @endif
                <div class="card-body">
                    <h3 class="card-title">Name: {{ $user_data->name }}</h3>
                    <h6>E-Mail: {{ $user_data->email }}</h6>
                </div>
            </div>

        </div>

        <div class="col-md-9 col-xl-9">

            <div class="card">
                <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <h4 class="card-title">Edit Your Profile Information</h4>
                        <div class="row mb-3 mt-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $user_data->name }}" name="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3 mt-3">

                            <div class="input-group">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Profile Picture</label>
                                <input type="file" class="form-control" id="customFile" name="profileImage">
                                @error('profileImage')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3 mt-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- end row -->
</div>
@endsection
