@extends('layout.main')
@section('contents')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sanitizer Report</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @error('user_error')
                <div class="alert alert-danger text-primary font-18 text-center">{{ $message }}</div>
            @enderror
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Address</th>
                        <th>Last Low</th>
                        <th>Current Status</th>
                        <th>Sanitizer Id</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Address</th>
                        <th>Last Low</th>
                        <th>Current Status</th>
                        <th>Sanitizer Id</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($data as $row)
                    @php
                        $report = DB::table('report')->where('rp_dust', $row->st_id)->orderBy('rp_id', 'DESC')->first();
                    @endphp
                    <tr>
                        <td>{{$row->address}}</td>
                        <td>{{$report==null?'It new!':$report->created_at}}</td>
                        <td>{{$row->st_status}}</td>
                        <td>{{$row->st_id}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
