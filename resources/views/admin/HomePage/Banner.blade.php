@extends('admin.layout.app')
@section('title','Home Banner')
@section('content')

<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Home Banner</h4>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">

        <div class="col-md-12 col-xl-12">

            <div class="card">
                <form action="{{ route('banner.store',$bannerData->id) }}" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <h4 class="card-title">Edit Your Home Banner</h4>
                        <div class="row mb-3 mt-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $bannerData->title }}" name="title">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3 mt-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $bannerData->desc }}" name="description">
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3 mt-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Video URL</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $bannerData->video_url }}" name="video_url">
                                @error('video_url')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3 mt-3">

                            <div class="input-group">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Home Banner</label>
                                <input type="file" class="form-control" id="customFile" name="banner">
                                @error('profileImage')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3 mt-3">

                            <div class="input-group">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                @if ($bannerData->image != '')
                                <img src="{{ asset('storage/'.$bannerData->image) }}" alt="" class="rounded avatar-lg">
                                @else
                                <img src="{{ asset('admin/assets/images/profile.jpg') }}" alt="" class="rounded avatar-lg">
                                @endif

                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3 mt-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-info">Banner Update</button>
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
