@extends('templates.main')
<title>Causes</title>
<link href="{{ url('font-awesome/css/all.css') }}" rel="stylesheet" media="all">
<style>
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
<div class="">
  <div class="container" style="padding: 0px 10px 0px 50px;">
    @include('templates.alertSuccessOrErrorMessage')
  </div>
<section>
<h2 style="margin-top: 0px; @if( Auth::check()) padding-left: 270px; @endif">
  <span class="custom-underline">
    We are expanding our reach!
  </span>
    @if( Auth::check())
        <a class="a-none" @if($role->hasPermissionTo('create Causes'))
            href="{{ route('addCauseView') }}" @else href="javascript:void(0)"
            data-toggle="modal" data-target="#permissionDeniedModal" @endif>
            <button class="btn button-bg-green"
                style="padding: 0px;width: 100px;height: 40px;float: right;margin-right: 60px;">
                Add Cause
            </button>
            <button class="btn button-bg-green" style="padding: 0px;width: 110px;height: 40px;float: right;margin-right: 10px">
              <a class="a-none" @if($role->hasPermissionTo('update Causes'))
                href="{{ route('editCauseView') }}" @else href="javascript:void(0)"
                data-toggle="modal" data-target="#permissionDeniedModal" @endif>Edit</a>
            </button>
        </a>
    @endif
</h2>
<p>We are continously trying to expand our reach to different areas where people need support to help build a
    better future.
    <br>These are the causes which we support currently.</p>
    @if(count($causes) == 0) <p style="text-align: center;margin-top: 100px"><b>No causes added.</b></p> @endif
<div class="container" style="margin-top: 70px;margin-bottom: 70px;padding-left: 5px;margin-right: 0px;">
    @foreach($causes as $causesData)
        <div class="box mainbox">
            <div class="img-div" @if($causesData->Image == "") style="width:420px;height:220px;" @endif>
                @if($causesData->Image != "")
                <img src="{{ asset($causesData->Image) }}"
                    style="border-top-left-radius: inherit;border-top-right-radius: inherit;width: 420px;height: 220px;">
                @else
                  <i class="fas fa-seedling iDashboard" style="padding: 80px 80px 20px 30px;"></i>
                @endif
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
@include('templates.donationModal')
@include('templates.defaultModal', ['title' => 'Cause submitted !','message' => 'Your cause is successfully submitted.The cause added will be subject to admin approval.Please make sure the cause is genuine and you are willing to provide more details on request of admin.'])
</div>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script>
  $(document).ready(function () {
    let saved = "{{$saved}}";
    if(saved == '1'){
      jQuery.noConflict(); 
      $('#defaultModal').modal('show'); 
    }

      // Pass CauseID to donation modal on donate button click
      $(".donateButton").click(function () {
        $('#causeIdDonation').val( $(this).attr('data-causeID') );
      });
  });
</script>
@stop
