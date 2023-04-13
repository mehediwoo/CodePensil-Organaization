@extends('admin.layout.app')
@section('title','Password Reset')
@section('content')

<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Password Reset</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Rasalina</a></li>
                        <li class="breadcrumb-item active">Password Reset</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('admin.profile.partials.update-password-form')
            </div>
        </div>

        <div class="col-4 mt-3 mb-5">
            <div class="">
                {{-- @include('admin.profile.partials.delete-user-form') --}}
            </div>
        </div>
    </div>
</div>

@endsection
