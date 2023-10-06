@extends('layout.main')
@section('contents')

<!-- Content Row -->

<div class="row">

    <!-- Personal -->
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="p-2">
                    <div class="text-center">
                        <h1 class="h4 text-primary mb-4">Change your personal information!</h1>
                    </div>
                    @error('error_profile')
                        <div class="alert alert-danger text-primary font-18 text-center">{{ $message }}</div>
                    @enderror
                    @php
                        $user = DB::table('users')->where('id', Auth::id())->first();
                    @endphp
                    <form class="user" action="{{ route('personal.change') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user text-center"
                                        id="exampleInputEmail" aria-describedby="emailHelp"
                                        name="email" value="{{$user->email}}">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user text-center"
                                        id="exampleInputEmail" aria-describedby="emailHelp"
                                        name="telephone" value="{{$user->telephone}}">
                                        @error('telephone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user text-center"
                                name="name" id="exampleInputPassword" value="{{$user->name}}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Save change
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- security -->
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-warning">
                <h6 class="m-0 font-weight-bold text-primary">Security Information</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="p-2">
                    <div class="text-center">
                        <h1 class="h4 text-warning mb-4">Change Security information!</h1>
                    </div>
                    @error('error_security')
                        <div class="alert alert-danger text-primary font-18 text-center">{{ $message }}</div>
                    @enderror
                    <form class="user" action="{{ route('security.change') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user text-center"
                                id="exampleInputEmail" aria-describedby="emailHelp"
                                name="old_password" placeholder="Old Password">
                                @error('old_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <input type="password" class="form-control form-control-user text-center"
                                    name="password" id="exampleInputPassword" placeholder="New Password">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group col-6">
                                <input type="password" class="form-control form-control-user text-center"
                                    name="password_confirmation" id="exampleInputPassword" placeholder="Confirm Password">
                                    @error('password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning btn-user btn-block">
                            Save change
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
