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

    .tr-cust:hover {
      background-color:#9cf19c !important;
      cursor: pointer !important;
    }

</style>
@section('content')
<div class="container plr-0">
    @include('templates.alertSuccessOrErrorMessage')
    <section class="events_section_area">
        <h2 id="cust-h2">
          <span class="custom-underline">
            Events Report
          </span>
        </h2>
    </section>
</div>
<div class="col-lg-12" style="text-align: right;margin-top: -90px;padding-right: 62px;">
  <button class="back-button"><a style="text-decoration: none;color: inherit !important;" href="{{ route('adminReportsView') }}">Back</a></button>
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
                <th class="txt-left">Actions</th>
            </tr>
        </thead>
        <tbody>
          @if(count($events) == 0 )
            <tr>
              <td colspan="12">
                  <b>No events data found.</b>
              </td>
            </tr>
          @endif
            @foreach($events as $eventsData)
                <tr class="tr-cust" data-id="{{$eventsData->ID}}">
                    <td class="txt-left eventName">{{ $eventsData->EventName }}</td>
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
                    <td data-exclude="true"><i class="fa fa-trash" aria-hidden="true" style="color: red" data-toggle="modal" data-target="#generalDeleteModal"></i></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="text-align: right">
      {!! $events->render() !!}
    </div>
</div>
@include('templates.generalDeleteModal')
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script>

  $('td').click(function() {
    var isExclude = $(this).attr("data-exclude");
    if ( isExclude != "true" ) {
      var route               = "{!! route('reportsEventsDetailsView',['EventsID' => 'EventsIDData']) !!}";
      var route               = route.replace('EventsIDData',$(this).parent().attr("data-id") );
      window.location.href    = route;
    }
    else{
      $("#deleteID").val($(this).parent().attr("data-id"));
      $("#itemName").text($(this).closest(".tr-cust").find(".eventName").text());
    }
  });
  
  $("#generalDeleteConfirm").click(function(){
    $.ajax({
            url:'{{ route("deleteCategoryItem") }}',
            type:'POST',
            data:{
                "_token"          : "{{ csrf_token() }}",
                category          : "events",
                categoryItemID    : $("#deleteID").val(),
            },
            success:function(data) {
              location.reload();
            }
        });
  });
</script>
@stop
