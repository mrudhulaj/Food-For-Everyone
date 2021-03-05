@extends('templates.main')
<title>Reports</title>
<link href="{{ url('font-awesome/css/all.css') }}" rel="stylesheet" media="all">
<style>
    .wrapper .events_section_area #cust-h2 {
        color: #3c354e;
        font-family: "Roboto", sans-serif;
        font-size: 32px;
        font-weight: 700;
        margin: 0px auto 50px;
        position: relative;
        text-transform: uppercase;
        width: 100%;
        text-align: center;
    }

    .wrapper section>h2::before {
        width: 125px !important;
        left: 45% !important;
    }

    tr:nth-child(even) {
        background-color: transparent !important;
    }

    .checkbox-container {
        display: initial !important;
    }

    .ffe-font{
      font-size: 20px !important;
    }

    table{
      margin-bottom: 0px !important;
    }

</style>
@section('content')
<div class="container plr-0">
@include('templates.alertSuccessMessage')
<section class="events_section_area">
  <h2 id="cust-h2">
      Reports
  </h2>
</section>
</div>
<div class="container">
  <div class="col-lg-6">
    <h5 class="ffe-font">Donations</h5>
      <table class="table" style="" id="">
        <thead class="table-striped">
            <tr>
              <th>Activity Name</th>
              <th>Goal</th>
              <th>Raised</th>
              <th>Date</th>
            </tr>
        </thead>
        <tbody>
          @foreach($donations as $donationsData)
            <tr>
              <td>{{$donationsData->ActivityName}}</td>
              <td>{{$donationsData->Goal}}</td>
              <td>{{$donationsData->Raised}}</td>
              <td>{{$donationsData->Date}}</td>
            </tr>
          @endforeach
        </tbody>
    </table>
  </div>

  <div class="col-lg-6">
    <h5 class="ffe-font">Foods Added</h5>
      <table class="table" style="" id="">
        <thead class="table-striped">
            <tr>
                <th>Food Count</th>
                <th>Type</th>
                <th>District</th>
                <th>State</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
  </div>

  <div class="col-lg-6">
    <h5 class="ffe-font">Causes</h5>
      <table class="table" style="" id="">
        <thead class="table-striped">
            <tr>
                <th>Name</th>
                <th>Goal</th>
                <th>Status</th>
                <th>District</th>
                <th>State</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
  </div>

  <div class="col-lg-6">
    <h5 class="ffe-font">Volunteers</h5>
      <table class="table" style="" id="">
        <thead class="table-striped">
            <tr>
                <th>Name</th>
                <th>Occupation</th>
                <th>Status</th>
                <th>District</th>
                <th>State</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
  </div>

  <div class="col-lg-6">
    <h5 class="ffe-font">Events</h5>
      <table class="table" style="" id="">
        <thead class="table-striped">
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Begin</th>
                <th>End</th>
                <th>District</th>
                <th>State</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
  </div>

  <div class="col-lg-6">
    <h5 class="ffe-font">Contact Messages</h5>
      <table class="table" style="" id="">
        <thead class="table-striped">
            <tr>
                <th>Subject</th>
                <th>Raised Ticket</th>
                <th>Ticket Status</th>
                <th>User Type</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
  </div>
  
</div>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script>

</script>
@stop
