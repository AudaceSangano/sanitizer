@extends('layout.main')
@section('contents')

<!-- Content Row -->

<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Dustbin Registration Form</h6>
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
                                <select class="form-control" name="type" required>
                                    <option value="" selected>Select type</option>
                                    <option value="1">Wet</option>
                                    <option value="0">Dry</option>
                                </select>
                            </div>
                            <div class="col-6 mt-3">
                                @php
                                    $id = DB::table('dust_status')->get()->count();
                                @endphp
                                <input type="text" class="form-control" value="{{$id+1}} This is your Dustbin Id" readonly required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Register Dustbin
                        </button>
                    </form>
                {{-- </div> --}}
            </div>
        </div>
    </div>
</div>

@endsection
