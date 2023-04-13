@extends('admin.layout.app')
@section('title','About Details')
@section('content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">About Details</h4>

            </div>
        </div>
    </div>

    <!--Details-->
    <div class="col-xl-10">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">About Details of you</h4>

                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill" href="#about" role="tab" aria-controls="about" aria-selected="false">About</a>
                        <a class="nav-link mb-2" id="v-pills-profile-tab" data-bs-toggle="pill" href="#skills" role="tab" aria-controls="v-pills-profile" aria-selected="false">Skills</a>
                        <a class="nav-link mb-2" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Awards</a>
                        <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="true">Education</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                            <div class="tab-pane fade active show" id="about" role="tabpanel" aria-labelledby="about">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">About of You</h4>
                                        <p class="card-title-desc">Write something about of you</p>

                                        <form action="{{ route('AboutStoreDetails') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $about->id }}">
                                            <textarea name="description" id="elm1" cols="30" rows="15" class="form-control">
                                                {{ $about->description }}
                                            </textarea>
                                            @error('description')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <button class="btn btn-primary mt-3"> Save</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <form action="{{ route('about.skill') }}" method="post" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" placeholder="HTML,CSS,JAVASCRIPT,LARAVEL,API" class="form-control @error('name')is-invalid @enderror" value="{{ old('name') }}">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="">Progress</label>
                                        <input type="text" name="progress" placeholder="70%" class="form-control" value="{{ old('progress') }}">
                                        @error('progress')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary mt-3">Add Skill</button>
                                </form>
                                @if (!empty($skill) && $skill->count() > 0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Progress</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($skill as $iteam)
                                            <tr>
                                                <td>{{ $iteam->name }}</td>
                                                <td>{{ $iteam->percent }}</td>
                                                <td>
                                                    <a href="{{ route('skill.delete',$iteam->id) }}">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                {{-- Awards --}}
                                <form action="{{ route('award.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" name="title" placeholder="Title.." class="form-control" value="{{ old('title') }}">
                                        @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="">Description</label>
                                        <textarea name="description"  cols="10" rows="4" class="form-control">{{ old('description') }}</textarea>
                                        @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary mt-3">Save</button>
                                </form>
                                @if (!empty($award) && $award->count() > 0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($award as $iteam)
                                            <tr>
                                                <td>{{ $iteam->title }}</td>
                                                <td>{{ $iteam->description }}</td>
                                                <td>
                                                    <a href="{{ route('award.delete',$iteam->id) }}">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                            <div class="tab-pane fade show" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                {{-- Education --}}
                                <form action="{{ route('education.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Organaization Name</label>
                                        <input type="text" name="name" placeholder="Education Organaization name.." class="form-control">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="">Year</label>
                                        <input type="text" name="year" placeholder="2020-2023" class="form-control">
                                        @error('year')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="">Description</label>
                                        <textarea name="description" cols="5" rows="4" class="form-control"></textarea>
                                        @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary mt-3">Save</button>
                                </form>
                                @if (!empty($education) && $education->count() > 0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Year</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($education as $iteam)
                                            <tr>
                                                <td>{{ $iteam->orga_name }}</td>
                                                <td>{{ $iteam->year }}</td>
                                                <td>{{ $iteam->description }}</td>
                                                <td>
                                                    <a href="{{ route('edu.delete',$iteam->id) }}">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>
</div>
@endsection
