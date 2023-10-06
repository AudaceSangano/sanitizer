@extends('layout.main')
@section('contents')

<!-- Content Row -->

<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Sanitizer Registration Form</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                {{-- <div class="chart-area"> --}}
                    @error('user_error')
                        <div class="alert alert-danger text-primary font-18 text-center">{{ $message }}</div>
                    @enderror
                    <form action="{{route('dust.create')}}" method="POST">
                        @csrf
                        <div class="form-group row mt-2">
                            <div class="col-6">
                                <input type="text" class="form-control" name="location" placeholder="location" required>
                            </div>
                            <div class="col-6">
                                @php
                                    $id = DB::table('dust_status')->get()->count();
                                @endphp
                                <input type="text" class="form-control" value="{{$id+1}} This is your Sanitizer Unique Id" readonly required>
                            </div>
                            <div class="col-6 mt-3">
                                <select class="form-control" name="collector" required>
                                    <option value="" selected hidden>Select Collector</option>
                                    @php
                                        $users = DB::table('users')->where('role_id', 2)->get();
                                    @endphp
                                    @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Register Sanitizer
                        </button>
                    </form>
                {{-- </div> --}}
            </div>
        </div>
    </div>
</div>

@endsection
