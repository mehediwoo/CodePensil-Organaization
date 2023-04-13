@extends('admin.layout.app')
@section('title','All Services')
@section('content')

<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Working Process</h4>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><a href="{{ route('working-process.create') }}" class="btn btn-sm btn-info">Create Working Process</a></h4>

                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Work Level</th>
                                    <th>Title</th>
                                    <th>Logo</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($work) && $work->count() > 0)
                                    @foreach ($work as $key => $iteam)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>Step-{{ $iteam->lavel }}</td>
                                        <td>{{ $iteam->title }}</td>
                                        <td>
                                            <img src="{{ asset('storage/'.$iteam->logo) }}" class="rounded">
                                        </td>
                                        <td>{{  $iteam->shortDescription  }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('working-process.edit',$iteam->id) }}" class="btn btn-sm btn-outline-warning waves-effect waves-light" style="margin-right: 4px">Edit</a>

                                            <form action="{{ route('working-process.destroy',$iteam->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger waves-effect waves-light">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td class="text-center text-danger">Not Found!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- end row -->
</div>

@endsection
