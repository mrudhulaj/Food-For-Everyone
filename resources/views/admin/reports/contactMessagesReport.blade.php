@extends('templates.main')
<title>Contact Messages Report</title>
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
    @include('templates.alertSuccessMessage')
    <section class="events_section_area">
        <h2 id="cust-h2">
            Causes Report
        </h2>
    </section>
</div>
<div class="col-lg-12" style="text-align: right;margin-top: -90px;padding-right: 62px;">
  <button class="back-button"><a style="text-decoration: none;color: inherit !important;" href="{{ route('adminReportsView') }}">Back</a></button>
</div>
<div class="container plr-0" style="margin-bottom: 50px">
    <table class="table" style="" id="contactMessagesTable">
        <thead class="table-striped">
            <tr>
                <th class="txt-left">Name</th>
                <th class="txt-left">Email</th>
                <th class="txt-left">Phone</th>
                <th class="txt-left">Subject</th>
                <th class="txt-left">Raised Ticket</th>
                <th class="txt-left">Ticket Status</th>
                <th class="txt-left">Created By</th>
                <th class="txt-left">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contactMessages as $contactMessagesData)
                <tr class="tr-cust" data-contactUsID="{{$contactMessagesData->ID}}" data-ticketStatus="{{$contactMessagesData->RaisedTicket}}">
                    <td class="txt-left">{{ $contactMessagesData->FirstName." ".$contactMessagesData->LastName }}</td>
                    <td class="txt-left">{{ $contactMessagesData->Email }}</td>
                    <td class="txt-left">{{ $contactMessagesData->Phone }}</td>
                    <td class="txt-left">{{ $contactMessagesData->Subject }}</td>
                    <td class="txt-left">
                      @if($contactMessagesData->RaisedTicket == '1')
                        <i class="fa fa-check" aria-hidden="true" style="color: #00A348"></i>
                      @elseif($contactMessagesData->RaisedTicket == '0')
                        <i class="fa fa-times" aria-hidden="true" style="color: red"></i>
                      @endif
                    </td>   
                    <td class="txt-left">
                      @if($contactMessagesData->TicketStatus == '2')
                        <i class="fa fa-check" aria-hidden="true" style="color: #00A348"></i>
                      @elseif($contactMessagesData->TicketStatus == '1')
                        <i class="fa fa-times" aria-hidden="true" style="color: red"></i>
                      @else
                        <i class="fa fa-minus" aria-hidden="true" style="color: orange"></i>
                      @endif
                    </td>                   
                    <td class="txt-left">{{ $contactMessagesData->CreatedUser }}</td>
                    <td class="txt-left">{{ $contactMessagesData->Date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="text-align: right">
      {!! $contactMessages->render() !!}
    </div>
</div>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script>
  $('#contactMessagesTable tbody').on('click', 'tr', function () {
    var route               = "{!! route('reportsContactMessagesDetailsView',['ticketStatus' => 'ticketStatusData','ContactUsID' => 'ContactUsIDData']) !!}";

    var ticketStatus = $(this).attr("data-ticketStatus") == "1" ? "Raised" : "NotRaised";

    var mapObj = {
                    ticketStatusData    : ticketStatus,
                    ContactUsIDData     : $(this).attr("data-contactUsID")
                  };

    route = route.replace(/ticketStatusData|ContactUsIDData/gi, function(matched){
            return mapObj[matched];
            });

    window.location.href    = route;

  } );
</script>
@stop
