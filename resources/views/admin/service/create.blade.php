@extends('admin.layout.app')
@section('title','Create Services')
@section('content')

<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Create Services</h4>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">

       <div class="card">
            <div class="card-body">
                <p class="card-title">Here is you can created your company services for your customer purpose.</p>

                <form action="{{ route('services.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Service Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Service Title" value="{{ old('title') }}">
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Service Logo</label>
                        <input type="file" name="logo" class="form-control" id="customFile" value="{{ old('logo') }}">
                        @error('logo')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Service Image</label>
                        <input type="file" name="images" class="form-control" id="customFile" value="{{ old('images') }}">
                        @error('images')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Service Description</label>
                        <textarea name="description" id="elm1" cols="5" rows="10" class="form-control">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <button class="btn btn-info mt-3">Save Service</button>
                </form>
            </div>
       </div>

    </div>

    <!-- end row -->
</div>

@endsection
