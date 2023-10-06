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
    <div class="col-xl-12 text-center col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header bg-warning py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Live Container Status of {{$id}}</h6>
                <input type="hidden" value="{{$id}}" class="id">
            </div>
            <!-- Card Body -->
            <div class="card-body">
                    <img src="{{asset('assets/tank/WaterTankEmpty.png')}}" alt="Water Tank" width="500" id="tank-image">
                    <div class="text-center text-warning" id="dryMessage">Empty Waste</div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
      function updateStatus() {
        $.ajax({
          url: "/getDbStatus/"+$('.id').val(), // Replace this with the actual endpoint
          method: "GET",
          dataType: "json",
          success: function(response) {
            // Assuming response.status contains the status value from the database
            if (response.status === "full") {
              $("#tank-image").attr("src", "{{asset('assets/tank/WaterTankRed.png')}}");
              $("#dryMessage").text("Full Waste");
            } else if(response.status === "medium"){
              $("#tank-image").attr("src", "{{asset('assets/tank/WaterTank.png')}}");
              $("#dryMessage").text("Medium Waste");
            } else if(response.status === "low"){
              $("#tank-image").attr("src", "{{asset('assets/tank/WaterTankYellow.png')}}");
              $("#dryMessage").text("Low Waste");
            } else{
              $("#tank-image").attr("src", "{{asset('assets/tank/WaterTankEmpty.png')}}");
              $("#dryMessage").text("Empty Waste");
            }
          },
          error: function(xhr, status, error) {
            console.error("Error fetching status:", error);
          }
        });
      }

      updateStatus();

      setInterval(updateStatus, 200);
    });
</script>
@endsection
