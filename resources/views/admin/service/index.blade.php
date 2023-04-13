@extends('admin.layout.app')
@section('title','All Services')
@section('content')

<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">All Services</h4>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><a href="{{ route('services.create') }}" class="btn btn-sm btn-info">Create Service</a></h4>

                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Logo</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($service) && $service->count() > 0)
                                    @foreach ($service as $key => $iteam)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $iteam->title }}</td>
                                        <td>
                                            <img src="{{ asset('storage/'.$iteam->logo) }}" class="rounded">
                                        </td>
                                        <td>
                                            <img src="{{ asset('storage/'.$iteam->image) }}" style="width:100px;height:70px">
                                        </td>
                                        <td>{!! substr($iteam->description,0,200) !!}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('services.edit',$iteam->id) }}" class="btn btn-sm btn-outline-warning waves-effect waves-light" style="margin-right: 4px">Edit</a>

                                            <form action="{{ route('services.destroy',$iteam->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger waves-effect waves-light">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        {{ $service->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- end row -->
</div>

@endsection
