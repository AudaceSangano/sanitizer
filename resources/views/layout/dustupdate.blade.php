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
                    <form action="{{route('dust.update')}}" method="POST">
                        @csrf
                        <div class="form-group row mt-2">
                            <div class="col-6">
                                <input type="text" class="form-control" name="location" value="{{$data->address}}" required>
                                <input type="hidden" class="form-control" name="id" value="{{$data->st_id}}" required>
                            </div>
                            <div class="col-6">
                                <select class="form-control" name="type" required>
                                    <option value="1" {{$data->st_category==1?'selected':''}}>Wet</option>
                                    <option value="0" {{$data->st_category==0?'selected':''}}>Dry</option>
                                </select>
                            </div>
                            <div class="col-6 mt-3">
                                <input type="text" class="form-control" value="{{$data->st_id}} This is your Dustbin Id" readonly required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning">
                            Save change
                        </button>
                    </form>
                {{-- </div> --}}
            </div>
        </div>
    </div>
</div>

@endsection
