@extends('admin.layout.app')
@section('title','View Contact Message')
@section('content')

<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">View Message</h4>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('unread') }}" class="btn btn-sm btn-outline-info">Back</a>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <th>{{ $message->created_at->diffForHumans(); }}</th>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $message->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $message->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $message->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Subject</th>
                                    <td>{{ $message->subject }}</td>
                                </tr>
                                <tr>
                                    <th>Message</th>
                                    <td>{{ $message->message }}</td>
                                </tr>
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
