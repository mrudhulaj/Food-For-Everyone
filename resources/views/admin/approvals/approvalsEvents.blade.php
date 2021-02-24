@extends('templates.main')
<title>Approvals</title>
<link href="{{ url('font-awesome/css/all.css') }}" rel="stylesheet" media="all">
<style>
    .approvalsList {
        color: #3c354e;
        font-family: "Roboto", sans-serif;
        font-size: 20px;
        font-weight: 700;
        margin: 0px auto 50px;
        padding: 0px 50px;
        position: relative;
        text-transform: uppercase;
        width: 100%;
        text-align: center;
    }

    .wrapper section>h2::before {
        width: 160px !important;
        left: 44% !important;
    }


    .item {
        box-shadow: 0px 2px 10px 0px rgba(0, 0, 0, 0.15);
        width: 365px;
        margin-right: 10px;
        margin-bottom: 30px;
        /* margin-top: 30px; */
    }

    .item .text {
        box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.15);
        float: right;
        width: 205px;
        padding: 5px 30px;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .item .text h5 a {
        padding-right: 10px;
    }

    .cust-img-div {
        width: 160px !important;
        height: 178px;
        overflow: hidden;
        box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.15);
        border-radius: 10px 0px 0px 10px;
    }

    .iDashboard {
        font-size: 100px;
        color: #00A348;
    }

    .dashboard-font {
        font-size: 50px !important;
        color: #0d6d38 !important;
    }

    .a-none:hover {
        color: #00A348 !important;
    }

    .cust-badge {
        background-color: #00A348 !important;
        margin-top: -7px !important;
    }

    .active-nav {
        color: #00A348 !important;
        font-weight: bold !important;
    }

    /* Approvals Events styles */
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

</style>
@section('content')
<div style="text-align: center">
    <span class="approvalsList">
        <a class="a-none @if($selection == 'Causes') active-nav @endif"
            href="{{ route('approvalsCausesView',['selection' => "Causes"]) }}">Causes
            <span class="badge cust-badge">{{ $badgesCount['causes'] }}</span></a>
    </span>
    <span>|</span>
    <span class="approvalsList">
        <a class="a-none @if($selection == 'Volunteers') active-nav @endif"
            href="{{ route('approvalsVolunteersView',['selection' => "Volunteers"]) }}">Volunteers
            <span class="badge cust-badge">{{ $badgesCount['volunteers'] }}</span></a>
    </span>
    <span>|</span>
    <span class="approvalsList">
        <a class="a-none @if($selection == 'Events') active-nav @endif"
            href="{{ route('approvalsEventsView',['selection' => "Events"]) }}">Events
            <span class="badge cust-badge">{{ $badgesCount['events'] }}</span></a>
    </span>
</div>
<div class="container" style="padding-bottom: 100px;padding-top: 50px;">
    <div class="row events_section_area">
        @foreach($events as $eventsData)
            <div class="col-md-4 col-xs-12">
                <div class="events_single" style="height: 570px;width: 351px;border-radius: 13px;
            box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.5);">
                    <div style="width: 351px;height: 207px;overflow: hidden;border-radius: 13px 13px 0px 0px;">
                        <img style="width: 351px;height: 207px;" src="{{ asset($eventsData->EventImage) }}">
                    </div>
                    <div style="padding: 10px;">
                        <div class="" style="margin-bottom: 5px">
                            <i class="fas fa-clock"></i>
                            {{ $eventsData->BeginTime }} - {{ $eventsData->EndTime }}
                        </div>
                        <div class="">
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $eventsData->Landmark.", ".$eventsData->City.", ".$eventsData->District.", ".$eventsData->State }}
                        </div>
                        <div class="clear"></div>
                        <h3 style="text-decoration: none;" class=""> <a
                                href="{{ route('eventDetailsView',['eventID' => Crypt::encrypt($eventsData->ID)]) }}"
                                class="a-none">{{ $eventsData->EventName }}</a> </h3>
                        <h6 style="min-height: 128px;">{{ $eventsData->EventShortDescription }}</h6>
                        <br>
                    </div>
                    <div style="text-align: center;">
                        <span>
                            Click
                            <a href="{{ route('eventDetailsView',['eventID' => Crypt::encrypt($eventsData->ID)]) }}"
                                style="color: #00A348;text-decoration: none">
                                here
                            </a>
                            to see more details.
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@stop
