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

    /* Approvals Volunteers styles */
    .item {
        box-shadow: 0px 2px 10px 0px rgba(0, 0, 0, 0.15);
        width: 365px;
        margin-right: 10px;
        margin-bottom: 30px;
        margin-top: 30px;
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

    .box-content h2 a {
        background: #fff none repeat scroll 0 0;
        border-radius: 30px;
        color: #05ce68;
        font-family: "Roboto", sans-serif;
        font-size: 16px;
        font-weight: 500;
        padding: 5px 55px;
        text-decoration: none;
        border: 1px solid #05ce68;
    }

    .box-content h2 a:hover {
        background: #01d262 none repeat scroll 0 0;
        color: white;
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
@if(count($volunteers) == 0) <p class="ffe-font" style="text-align: center;margin-top: 100px">No volunteers pending for approval.</p> @endif
<div class="container" style="padding-bottom: 100px;padding-top: 50px;">
    @foreach($volunteers as $volunteersData)
        <div class="col-lg-12" style="width: auto">
            <div class="item" style="border-radius: 10px;">
                <div class="col-lg-5 plr-0 cust-img-div">
                    <img src="{{ asset($volunteersData->ProfileImage) }}" alt="Not Found" onerror=this.src="{{url('images/user-icon.png')}}"
                        style="border-top-left-radius: 10px;border-bottom-left-radius: 10px;width: 160px;height: 178px;">
                </div>
                <div class="text col-lg-7 plr-0 box-content" style="height: 178px;">
                    <h3 class="vNames">
                        {{ $volunteersData->FirstName." ".$volunteersData->LastName }}</h3>
                    <h6 class="">{{ $volunteersData->Occupation }}</h6>
                    <p>{{ date('d-M-Y', strtotime($volunteersData->CreatedDate)) }}
                    </p>

                    <h2 class="cust-button" style="text-align: center;margin-top: 15px">
                        <a href="{{route('approvalsVolunteerProfile',['ID' => Crypt::encrypt($volunteersData->ID)])}}" class="donateButton">View</a></h2>
                </div>
            </div>
        </div>
    @endforeach
</div>
@stop
