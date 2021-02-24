@extends('templates.main')
<title>Cause Details</title>
<style>
    .mainbox-cust {
        margin-bottom: 80px;
        border-radius: 13px;
        box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.5);
        display: inline-block;

    }

    .wrapper section>h2::before {
        background: transparent !important;
        border: none !important;
    }

    .cust-center {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .img-cust {
        width: auto !important;
        overflow: hidden !important;

    }

		/* Begin: Progress Bar */

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

		/* Begin:Donate Now Button */

		.borderes a {
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

    .borderes a:hover {
        background: #01d262 none repeat scroll 0 0;
        color: white;
    }

		/* End Donate Now Button */

		/* End: Progress Bar */

</style>
@section('content')
<section>
    <h2 style="margin-top: 0px;">
      <span style="border-bottom: 2px solid #01d262;padding-bottom: 10px;">
        {{$causeData->CauseName}}
      </span> 
    </h2>
</section>
<div class="container cust-center">
    <div class="col-lg-12 mainbox-cust plr-0 img-cust" style="">
        <div style="overflow: hidden !important;">
            <img id="" src="{{ asset($causeData->Image) }}"
            alt="" style="width: 940px;height: 577px;margin-top: -15%;">
        </div>
        <div class="ffe-font" style="padding-left: 30px;padding-right: 30px;padding-top: 30px;">

            <div>
                <p style="font-weight: bold">
                  {{$causeData->CauseShortDescription}}
                </p>
            </div>
            <div>
                <p>
                  {{$causeData->CauseLongDescription}}
                </p>
            </div>
            <div>
              <p style="font-weight: bold">
                  For more information please contact:
              </p>
              <p>
                <b>Phone:</b> +91 {{$causeData->Phone}}
              <br>
                <b>Place:</b> {{ $causeData->State.", ".$causeData->District.", ".$causeData->City}}.
              <br>
                <b>Email:</b> {{$causeData->Email}}
              </p>
            </div>
						{{-- Begin:  Progress Bar --}}
            @if (Auth::user()->TypeOfAccount != "Admin")
              <div class="progress-div col-lg-offset-3 col-lg-6" style="height: 215px;margin-top: 15px;">
                <div class="progress-text">
                  <p class="progress-top">{{$causeData->raisedAmountPercentage}}%</p>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0"
                    aria-valuemax="100" style="width:{{$causeData->raisedAmountPercentage}}%;background-color: #01d262;"></div>
                  </div>
                  <p class="progress-left">Raised: <span class="progress-amount">{{ number_format($causeData->RaisedAmount) }} ₹</span></p>
                  <p class="progress-right">Goal: <span class="progress-amount">{{number_format($causeData->ExpectedAmount)}} ₹</span></p>
                </div>
                  <h2 class="borderes" style="text-align: center;margin-top: 100px;"><a style="text-decoration: none;" href="#" data-toggle="modal"
                    data-target="#donationModal">DONATE NOW</a></h2>
              </div>
            @else
              <div style="padding: 50px">
                <p style="text-align: center">Goal: <span class="progress-amount">{{number_format($causeData->ExpectedAmount)}} ₹</span></p>
                <h2 class="borderes" style="text-align: center;">
                  <a style="text-decoration: none;" href="{{route('approvalsDecisions',['category' => "Causes",'Decision' => "1",'ID' => Crypt::encrypt($causeData->ID)])}}" >Accept</a>
                  <a class="approvalDecline" style="text-decoration: none;" href="{{route('approvalsDecisions',['category' => "Causes",'Decision' => "2",'ID' => Crypt::encrypt($causeData->ID)])}}" >Decline</a>
                </h2>
              </div>
            @endif
            {{-- End: Progress Bar --}}
        </div>
    </div>
</div>
@include('templates.donationModal')
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $(".details-text").addClass('hide');
        var img = document.getElementById('img-new');
        var width = img.clientWidth + "px";
        $(".mainbox-cust").css("cssText", "width:" + width + " !important;");
        $(".details-text").removeClass('hide');
    });

</script>

@stop
