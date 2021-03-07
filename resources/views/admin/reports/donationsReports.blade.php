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
        width: auto !important;
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
      Donations Reports
  </h2>
</section>
</div>
<div class="container">
  
</div>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script>

</script>
@stop
