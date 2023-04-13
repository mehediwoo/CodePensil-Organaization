@extends('admin.layout.app')
@section('title','Contact Message')
@section('content')

<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Un Read Message</h4>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($message) && $message->count() > 0)
                                    @foreach ($message as $key => $iteam)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $iteam->name }}</td>
                                        <td>{{ $iteam->email }}</td>
                                        <td>{{ $iteam->phone }}</td>
                                        <td>{{ $iteam->subject }}</td>
                                        <td class="">
                                            <a href="{{ route('view.message',$iteam->id) }}" class="btn btn-sm btn-outline-info waves-effect waves-light" style="margin-right: 4px">View</a>
                                            <a href="{{ route('mark.read',$iteam->id) }}" class="btn btn-sm btn-outline-success waves-effect waves-light" style="margin-right: 4px">Mark As Read</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        {{ $message->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- end row -->
</div>

@endsection


