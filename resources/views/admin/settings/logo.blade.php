@extends('admin.layout.app')
@section('title','Website Logo')
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

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('setting.logo.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $logo->id }}">
                    <div class="form-group mt-3">
                        <label for="">Website Logo</label>
                        <input type="file" name="logo" class="form-control">
                    </div>

                    <div class="form-group mt-3">
                        <label>Website Current Logo</label> <br>
                        <img src="{{ asset('storage/'.$logo->logo) }}" class="rounded">
                    </div>

                    <div class="form-group mt-3">
                        <button class="btn btn-sm btn-info">Upload</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>



@endsection
