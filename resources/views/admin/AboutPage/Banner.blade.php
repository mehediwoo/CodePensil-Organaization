@extends('admin.layout.app')
@section('title','Home Banner')
@section('content')

<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">About Banner</h4>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">

        <div class="col-md-12 col-xl-12">

            <div class="card">
                <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <input type="hidden" name="id" value="{{ $AboutBanner->id }}">
                        <h4 class="card-title">Edit Your About Banner</h4>
                        <div class="row mb-3 mt-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $AboutBanner->title }}" name="title">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3 mt-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Sub Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $AboutBanner->subtitle }}" name="subTitle">
                                @error('subTitle')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3 mt-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $AboutBanner->desc }}" name="description">
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3 mt-3">

                            <div class="input-group">
                                <label for="example-text-input" class="col-sm-2 col-form-label">About Banner</label>
                                <input type="file" class="form-control" id="customFile" name="banner">
                            </div>
                            <div class="input-group">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                @error('banner')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3 mt-3">

                            <div class="input-group">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                @if ($AboutBanner->banner != '')
                                <img src="{{ asset('storage/'.$AboutBanner->banner) }}" alt="" class="rounded avatar-lg">
                                @else
                                <img src="{{ asset('admin/assets/images/profile.jpg') }}" alt="" class="rounded avatar-lg">
                                @endif

                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3 mt-3">

                            <div class="input-group">
                                <label for="example-text-input" class="col-sm-2 col-form-label">About Badge</label>
                                <input type="file" class="form-control" id="customFile" name="badgeIcon">
                            </div>
                            <div class="input-group">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                @error('badgeIcon')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3 mt-3">

                            <div class="input-group">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                @if ($AboutBanner->logo != '')
                                <img src="{{ asset('storage/'.$AboutBanner->logo) }}" alt="" class="rounded avatar-lg">
                                @else
                                <img src="{{ asset('admin/assets/images/profile.jpg') }}" alt="" class="rounded avatar-lg">
                                @endif

                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3 mt-3">

                            <div class="input-group">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Resume</label>
                                <input type="file" class="form-control" id="customFile" name="Resume"><br>

                            </div>
                            <div class="input-group">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                @error('Resume')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3 mt-3">

                            <div class="input-group">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                @if ($AboutBanner->resume != '')
                                <img src="{{ asset('admin/assets/images/resume.jpg') }}" alt="" class="rounded avatar-lg">
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
