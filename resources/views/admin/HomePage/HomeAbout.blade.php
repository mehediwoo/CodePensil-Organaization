@extends('admin.layout.app')
@section('title','Home About Icon')
@section('content')

<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Home About Icons</h4>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">

        <div class="col-md-7 col-xl-7">

            <div class="card">
                <form action="{{ route('home.about.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <h4 class="card-title">Edit Your Home About Icons</h4>
                        <div class="row mb-3 mt-3">

                            <div class="input-group">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Icon</label>
                                <input type="file" class="form-control" id="customFile" name="icon">
                                @error('icon')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3 mt-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Home About Section Icon lists..</h4>

                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Icon Images</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($icon) && $icon->count() > 0)
                                    @foreach ($icon as $iteam)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <img src="{{ asset('storage/'.$iteam->icon) }}" style="width:70px;height:70px">
                                        </td>
                                        <td>
                                            <a href="{{ route('home.about.delete',$iteam->id) }}">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                <tr>
                                <td class="alert alert-danger">Iteam not found!</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        {{ $icon->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- end row -->
</div>
@endsection
