@extends('admin.layout.app')
@section('title','Website Settings')
@section('content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Websites Settings..</h4>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('setting.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $setting->id }}" name="id">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="phoneNumber" value="{{ $setting->number }}" >
                            @error('phoneNumber')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Footer Short Description</label>
                        <div class="col-sm-10">
                            <textarea name="description"  cols="5" rows="5" class="form-control">{{ $setting->desc }}</textarea>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Country</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="country" value="{{ $setting->country }}" >
                            @error('country')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <textarea name="address"  cols="5" rows="5" class="form-control">{{ $setting->address }}</textarea>
                            @error('address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">E-Mail</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="email" name="email" value="{{ $setting->email }}" >
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Social Description</label>
                        <div class="col-sm-10">
                            <textarea name="social_description"  cols="5" rows="5" class="form-control">{{ $setting->soci_desc }}</textarea>
                            @error('social_description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Facebook URL</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="facebook" value="{{ $setting->facebook_url }}" >
                            @error('facebook')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Twitter URL</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="twitter" value="{{ $setting->twitter_url }}" >
                            @error('twitter')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">LinkIn URL</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="linkedIn" value="{{ $setting->linkedIn_url }}" >
                            @error('linkedIn')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Instagram URL</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="instagram" value="{{ $setting->instagram_url }}" >
                            @error('instagram')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Footer Copyright Text</label>
                        <div class="col-sm-10">
                            <textarea name="copyright"  cols="5" rows="5" class="form-control">{{ $setting->copyrightText }}</textarea>
                            @error('copyright')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button class="btn btn-info">Save</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- end row -->
</div>


@endsection
