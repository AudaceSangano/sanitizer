@extends('layout.main')
@section('contents')
<style>
  .card {
    width: 600px;
    margin: 0 auto; /* Center the card horizontally */
    text-align: center; /* Center the image horizontally within the card */
  }
  .card-body {
    padding: 20px;
  }
</style>

<!-- Content Row -->

<div class="row">
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header bg-warning py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">DRY Waste Status</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Change Status:</div>
                        <a class="dropdown-item" id="change-image-full" href="#">Full Tank</a>
                        <a class="dropdown-item" id="change-image-medium" href="#">Medium Tank</a>
                        <a class="dropdown-item" id="change-image-low" href="#">Low Tank</a>
                        <a class="dropdown-item" id="change-image-empty" href="#">Empty Tank</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                    <img src="{{asset('assets/tank/WaterTankEmpty.png')}}" alt="Water Tank" width="500" id="tank-image">
                    <div class="text-center text-warning" id="dryMessage">Empty Waste</div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header bg-success py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">WET Waste Status</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Change Status:</div>
                        <a class="dropdown-item" id="change-image-full-1" href="#">Full Tank</a>
                        <a class="dropdown-item" id="change-image-medium-1" href="#">Medium Tank</a>
                        <a class="dropdown-item" id="change-image-low-1" href="#">Low Tank</a>
                        <a class="dropdown-item" id="change-image-empty-1" href="#">Empty Tank</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                    <img src="{{asset('assets/tank/WaterTank.png')}}" alt="Water Tank" width="500" id="tank-image-1">
                    <div class="text-center text-success" id="wetMessage">Medium Waste</div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $("#change-image-full").click(function() {
      $("#tank-image").attr("src", "{{asset('assets/tank/WaterTankRed.png')}}");
      $("#dryMessage").text("Full Waste");
    });

    $("#change-image-medium").click(function() {
      $("#tank-image").attr("src", "{{asset('assets/tank/WaterTank.png')}}");
      $("#dryMessage").text("Medium Waste");
    });

    $("#change-image-low").click(function() {
    $("#tank-image").attr("src", "{{asset('assets/tank/WaterTankYellow.png')}}");
      $("#dryMessage").text("Low Level Waste");
    });

    $("#change-image-empty").click(function() {
    $("#tank-image").attr("src", "{{asset('assets/tank/WaterTankEmpty.png')}}");
      $("#dryMessage").text("Empty Waste");
    });


    $("#change-image-full-1").click(function() {
      $("#tank-image-1").attr("src", "{{asset('assets/tank/WaterTankRed.png')}}");
      $("#wetMessage").text("Full Waste");
    });

    $("#change-image-medium-1").click(function() {
      $("#tank-image-1").attr("src", "{{asset('assets/tank/WaterTank.png')}}");
      $("#wetMessage").text("Medium Waste");
    });

    $("#change-image-low-1").click(function() {
    $("#tank-image-1").attr("src", "{{asset('assets/tank/WaterTankYellow.png')}}");
      $("#wetMessage").text("Low Level Waste");
    });

    $("#change-image-empty-1").click(function() {
    $("#tank-image-1").attr("src", "{{asset('assets/tank/WaterTankEmpty.png')}}");
      $("#wetMessage").text("Empty Level Waste");
    });
  });
</script>
@endsection
