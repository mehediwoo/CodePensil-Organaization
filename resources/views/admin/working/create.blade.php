@extends('admin.layout.app')
@section('title','Create Work Process')
@section('content')

<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Create Work Process</h4>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title"><a href="{{ route('working-process.store') }}" class="btn btn-sm btn-info">Back</a></h4>

                <form action="{{ route('working-process.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Working Process Label</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" name="level" placeholder="Type integer 0-9" >
                            @error('level')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Working Process Title</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="title" placeholder="Working Process Title" >
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Logo</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="file" name="logo" class="form-control" id="customFile">
                            </div>
                            @error('logo')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Working Process Short Description</label>
                        <div class="col-sm-10">
                            <textarea name="description"  cols="5" rows="5" class="form-control"></textarea>
                            @error('description')
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
