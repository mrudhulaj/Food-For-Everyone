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

    .iDashboard{
      font-size: 100px;
      color: #00A348;
    }

    .dashboard-font{
      font-size: 50px !important;
      color:#0d6d38 !important;
    }

    .a-none:hover{
      color: #00A348 !important;
    }

    .cust-badge{
      background-color: #00A348 !important;
      margin-top: -7px !important;
    }

    .active-nav{
    color: #00A348 !important;
    font-weight: bold !important;
    }

    /* Approvals Causes styles */
    .wrapper section>h2::before {
  width: 190px !important;
  left: 42% !important;
}

.box {
  width: 350px;
  min-height: 660px;
}

.mainbox {
  margin-bottom: 80px;
  border-radius: 13px;
  box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.5);
  display: inline-block;
  margin-right: 50px;
}

.box .box-content h2 {
  color: #3c354e;
  font-family: "Roboto", sans-serif;
  font-size: 20px;
  font-weight: 700;
  margin: 35px 0 15px;
}

hr {
  margin-top: 20px;
  margin-bottom: 20px;
  border: 0;
  border-top: 2px solid #01d262 !important;
  width: 50% !important;
}

.box-p,
.progress-text {
  color: #595959;
  font-family: "Roboto", sans-serif;
  font-size: 15px;
  font-weight: 400;
  margin: 0;
  text-align: center;
}

.progress-text {
  margin: 0 auto;
  position: relative;
  text-align: center;
}

.progress {
  background-color: #e5e5e5 !important;
  height: 10px !important;
  margin-top: 20px !important;
  max-width: 100% !important;
}

.progress-amount {
  color: #01d262;
}

.progress-left {
  left: 0;
  margin-top: 15px;
  position: absolute;
}

.progress-right {
  right: 0;
  margin-top: 15px;
  position: absolute;
}

.box-content h2 a {
  background: #fff none repeat scroll 0 0;
  border-radius: 30px;
  color: #05ce68;
  font-family: "Roboto", sans-serif;
  font-size: 16px;
  font-weight: 500;
  padding: 15px 40px;
  text-decoration: none;
  border: 1px solid #05ce68;
}

.box-content h2 a:hover {
  background: #01d262 none repeat scroll 0 0;
  color: white;
}

.img-div {
  overflow: hidden;
  border-top-left-radius: inherit;
  border-top-right-radius: inherit;
  display: flex;
  justify-content: center;
}

.learn-more {
  color: #00ab47;
  /* font-weight: bold; */
}

.learn-more:hover {
  color: #00A348 !important;
  font-weight: bold !important;
  text-decoration: none;
}

.h2-title:hover {
  color: #00A348 !important;
  font-weight: bold !important;
  text-decoration: none;
}

</style>
@section('content')
<div style="text-align: center">
    <span class="approvalsList">
      <a class="a-none @if($selection == 'Causes') active-nav @endif" href="{{ route('approvalsCausesView',['selection' => "Causes"]) }}">Causes <span class="badge cust-badge">{{$badgesCount['causes']}}</span></a>
    </span>
    <span>|</span>
    <span class="approvalsList">
      <a class="a-none @if($selection == 'Volunteers') active-nav @endif" href="{{ route('approvalsVolunteersView',['selection' => "Volunteers"]) }}">Volunteers <span class="badge cust-badge">{{$badgesCount['volunteers']}}</span></a>
    </span>
    <span>|</span>
    <span class="approvalsList">
      <a class="a-none @if($selection == 'Events') active-nav @endif" href="{{ route('approvalsEventsView',['selection' => "Events"]) }}">Events <span class="badge cust-badge">{{$badgesCount['events']}}</span></a>
    </span>
</div>
<div class="container" style="margin-top: 70px;margin-bottom: 70px;padding-left: 5px;margin-right: 0px;">
  @foreach($causes as $causesData)
      <div class="box mainbox">
          <div class="img-div">
              <img src="{{ asset($causesData->Image) }}"
                  style="border-top-left-radius: inherit;border-top-right-radius: inherit;width: 420px;height: 220px;">
          </div>
          <div class="box-content" style="padding: 0 30px;">
              <a href="{{ route('causesDetails',['causeID' => Crypt::encrypt($causesData->ID)]) }}"
                  class="h2-title">
                  <h2 style="text-align: center;text-transform: uppercase;" class="h2-title">
                      {{ $causesData->CauseName }}
                  </h2>
                  <hr class="cust-hr">
              </a>
              <p class="box-p" style="height: 120px;">
                  {{ $causesData->CauseShortDescription }}
                  <br>
                  <a href="{{ route('causesDetails',['causeID' => Crypt::encrypt($causesData->ID)]) }}"
                      class="learn-more">
                      Learn more.
                  </a>
              </p>
              <div class="progress-text">
                  <p class="progress-top">{{$causesData->raisedAmountPercentage}}%
                  </p>
                  <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0"
                          aria-valuemax="100" style="width:{{$causesData->raisedAmountPercentage}}%;background-color: #01d262;"></div>
                  </div>
                  <p class="progress-left">Raised: <span class="progress-amount">{{ number_format($causesData->RaisedAmount) }} ₹</span></p>
                  <p class="progress-right">Goal: <span
                          class="progress-amount">{{ number_format($causesData->ExpectedAmount) }} ₹</span>
                  </p>
              </div>
              <h2 class="borderes" style="text-align: center;margin-top: 100px;"><a data-toggle="modal"
                      data-target="#donationModal" href="#" data-causeID="{{$causesData->ID}}" class="donateButton">DONATE NOW</a></h2>
          </div>
      </div>
  @endforeach
</div>
@stop
