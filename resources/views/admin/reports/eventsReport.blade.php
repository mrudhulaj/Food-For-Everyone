@extends('templates.main')
<title>Events Report</title>
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

    .ffe-font {
        font-size: 20px !important;
    }

    table {
        margin-bottom: 0px !important;
    }

    .pagination > .active > span{
      z-index: 3;
      color: #fff;
      cursor: default;
      background-color: #00A348 !important;
      border-color: #00A348 !important;
    }

    .pagination > li > a{
      color: black !important;
    }

    .tr-cust{
      cursor: pointer;
    }

</style>
@section('content')
<div class="container plr-0">
    @include('templates.alertSuccessMessage')
    <section class="events_section_area">
        <h2 id="cust-h2">
            Events Report
        </h2>
    </section>
</div>
<div class="container plr-0" style="margin-bottom: 50px">
    <table class="table" style="" id="eventsTable">
        <thead class="table-striped">
            <tr>
                <th class="txt-left">Name</th>
                <th class="txt-left">Begin Time</th>
                <th class="txt-left">End Time</th>
                <th class="txt-left">Email</th>
                <th class="txt-left">Phone</th>
                <th class="txt-left">Location</th>
                <th class="txt-left">Is Approved?</th>
                <th class="txt-left">Created By</th>
                <th class="txt-left">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $eventsData)
                <tr class="tr-cust" data-id="{{$eventsData->ID}}">
                    <td class="txt-left">{{ $eventsData->EventName }}</td>
                    <td class="txt-left">{{ $eventsData->BeginTime }}</td>
                    <td class="txt-left">{{ $eventsData->EndTime }}</td>
                    <td class="txt-left">{{ $eventsData->Email }}</td>
                    <td class="txt-left">{{ $eventsData->Phone }}</td>
                    <td class="txt-left">{{ $eventsData->Landmark.",".$eventsData->City.",".$eventsData->District.",".$eventsData->State }}</td>
                    <td class="txt-left">
                      @if($eventsData->IsApproved == '1')
                        <i class="fa fa-check" aria-hidden="true" style="color: #00A348"></i>
                      @elseif($eventsData->IsApproved == '2')
                        <i class="fa fa-times" aria-hidden="true" style="color: red"></i>
                      @else
                        <i class="fa fa-minus" aria-hidden="true" style="color: orange"></i>
                      @endif
                    </td>                    <td class="txt-left">{{ $eventsData->CreatedUser }}</td>
                    <td class="txt-left">{{ $eventsData->Date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="text-align: right">
      {!! $events->render() !!}
    </div>
</div>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script>
  $('#eventsTable tbody').on('click', 'tr', function () {
    var route               = "{!! route('reportsEventsDetailsView',['EventsID' => 'EventsIDData']) !!}";
    var route               = route.replace('EventsIDData',$(this).attr("data-id") );
    window.location.href    = route;

  } );
</script>
@stop
