@extends('templates.main')
<title>Volunteers Report</title>
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
            Volunteers Report
        </h2>
    </section>
</div>
<div class="col-lg-12" style="text-align: right;margin-top: -90px;padding-right: 62px;">
  <button class="back-button"><a style="text-decoration: none;color: inherit !important;" href="{{ route('adminReportsView') }}">Back</a></button>
</div>
<div class="container plr-0" style="margin-bottom: 50px">
    <table class="table" style="" id="volunteerTable">
        <thead class="table-striped">
            <tr>
                <th class="txt-left">Name</th>
                <th class="txt-left">Occupation</th>
                <th class="txt-left">Email</th>
                <th class="txt-left">Phone</th>
                <th class="txt-left">Location</th>
                <th class="txt-left">Is Approved?</th>
                <th class="txt-left">Created Date</th>
            </tr>
        </thead>
        <tbody>
          @if(count($volunteers) == 0 )
            <tr>
              <td colspan="12">
                  <b>No volunteers data found.</b>
              </td>
            </tr>
          @endif
            @foreach($volunteers as $volunteersData)
                <tr class="tr-cust" data-id="{{$volunteersData->ID}}">
                    <td class="txt-left">{{ $volunteersData->FirstName." ".$volunteersData->LastName }}</td>
                    <td class="txt-left">{{ $volunteersData->Occupation }}</td>
                    <td class="txt-left">{{ $volunteersData->Email }}</td>
                    <td class="txt-left">{{ $volunteersData->Phone }}</td>
                    <td class="txt-left">{{ $volunteersData->District.",".$volunteersData->State }}</td>
                    <td class="txt-left">
                      @if($volunteersData->IsApproved == '1')
                        <i class="fa fa-check" aria-hidden="true" style="color: #00A348"></i>
                      @elseif($volunteersData->IsApproved == '2')
                        <i class="fa fa-times" aria-hidden="true" style="color: red"></i>
                      @else
                        <i class="fa fa-minus" aria-hidden="true" style="color: orange"></i>
                      @endif
                    </td>                    
                    <td class="txt-left">{{ $volunteersData->Date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="text-align: right">
      {!! $volunteers->render() !!}
    </div>
</div>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script>
  $('#volunteerTable tbody').on('click', 'tr', function () {
    var route               = "{!! route('reportsVolunteersDetailsView',['VolunteerID' => 'VolunteerIDData']) !!}";
    var route               = route.replace('VolunteerIDData',$(this).attr("data-id") );
    window.location.href    = route;

  } );
</script>
@stop
