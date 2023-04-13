@extends('admin.layout.app')
@section('title','Edit Services')
@section('content')

<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Edit Services</h4>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
    <div class="col-7">
       <div class="card">
            <div class="card-body">
                <a href="{{ route('services.index') }}" class="btn btn-sm btn-info">Back</a>
                <p class="card-title">Here is you can Edit your company services for your customer purpose.</p>

                <form action="{{ route('services.update',$edit_service->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Service Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $edit_service->title }}">
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
                        <textarea name="description" id="elm1" cols="5" rows="10" class="form-control">{{ $edit_service->description }}</textarea>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <button class="btn btn-info mt-3">Update Service</button>
                </form>
            </div>
       </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <img class="rounded" src="{{ asset('storage/'.$edit_service->logo) }}" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title text-center">Existance Services Logo</h4>
            </div>
        </div>

        <div class="card">
            <img class="card-img-top img-fluid" src="{{ asset('storage/'.$edit_service->image) }}" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title text-center">Existance Service Images</h4>
            </div>
        </div>
    </div>
    </div>

    <!-- end row -->
</div>

@endsection
