@extends('layout.main')
@section('contents')

<!-- Content Row -->

<div class="row">

    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Collector Registration Form</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    @error('user_error')
                        <div class="alert alert-danger text-primary font-18 text-center">{{ $message }}</div>
                    @enderror
                    <form class="user" action="{{route('collector.create')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" name="fname" id="exampleFirstName"
                                    placeholder="First Name">
                                    @error('fname')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" name="lname" id="exampleLastName"
                                    placeholder="Last Name">
                                    @error('lname')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail"
                                placeholder="Email Address">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user"
                                    id="exampleInputPassword" name="password" placeholder="Password">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="col-sm-6">
                                <input type="password" name="password_confirmation" class="form-control form-control-user"
                                    id="exampleRepeatPassword" placeholder="Repeat Password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Register Account
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
