@extends('templates.main')
<title>Edit Causes</title>
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

/* Image button */
.container-cust {
  position: relative;
  width: 100%;
}

.container-cust img {
  width: 100%;
  height: auto;
}

.container-cust .btn {
  position: absolute;
  top: 10%;
  left: 93%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: #555;
  color: white;
  font-size: 12px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
}

.container-cust .btn:hover {
  background-color: #989898;
  color: black;
  }

</style>
@section('content')
<div class="container">
  <div class="" style="padding: 0px 10px 0px 0px;">
    @include('templates.alertSuccessMessage')
  </div>
<section>
<h2 style="margin-top: 0px; @if( Auth::check()) padding-left: 100px; @endif">
     <span class="custom-underline">Edit Your Causes</span>
    <button class="btn button-bg-green" style="padding: 0px;width: 110px;height: 40px;float: right">
      <a class="a-none" href="{{route('causesView')}}">Back</a>
    </button>
</h2>
<div class="col-md-12" style="text-align: center;margin-bottom: 30px">
  <div class="col-md-offset-2 col-md-8">
    <p>Only causes that are pending for approval can be edited, causes that are already approved or rejected cannot be edited from here.For such cases raise a ticket from the contact page and you will be contacted back by our team.</p>
    <p>Please make sure the details you have entered are correct.You are expected to provide more details on admins enquiry.</p>
  </div>
</div>
  @if(count($causes) == 0) <p style="text-align: center;margin-top: 100px"><b>You have not added any cause to edit.</b></p> @endif
<div class="container" style="margin-top: 70px;margin-bottom: 70px;padding-left: 5px;margin-right: 0px;">
    @foreach($causes as $causesData)
        <div class="box mainbox">
            <div class="img-div container-cust">
                <img src="{{ asset($causesData->Image) }}"
                    style="border-top-left-radius: inherit;border-top-right-radius: inherit;width: 420px;height: 220px;">
                    <button data-toggle="modal" data-target="#deleteModal" class="btn" id="causeDeleteBtn" type="button" data-value="{{$causesData->ID}}">&times;</button>
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
                    <p class="progress-top">0%</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0"
                            aria-valuemax="100" style="width:0%;background-color: #01d262;"></div>
                    </div>
                    <p class="progress-left">Raised: <span class="progress-amount">1200 ₹</span></p>
                    <p class="progress-right">Goal: <span
                            class="progress-amount">{{ number_format($causesData->ExpectedAmount) }} ₹</span>
                    </p>
                </div>
                <h2 class="borderes" style="text-align: center;margin-top: 100px;"><a href="{{route('editCauseData',["foodID" => Crypt::encrypt($causesData->ID)])}}">Edit</a></h2>
            </div>
        </div>
    @endforeach
</div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 13px;border: none">
            <div class="modal-header ffe-font">
                <h5 class="modal-title" id="deleteModalLabel">Confirm
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
            <div class="modal-body col-lg-12 ffe-font" style="padding: 20px;">
                <p class="ffe-font">Are you sure you want to delete this cause?</p>
            </div>
            <div class="modal-footer">
              <button id="confirmForm" type="button" class="btn btn-primary button-bg-green"
                    style="padding: 6px 12px;border-radius: 4px;" data-dismiss="modal">
                    Confirm
                </button>
                <button id="" data-dismiss="modal" type="button" class="btn btn-secondary mdl-btn-cancel">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script>
  var causeID;
    $('#causeDeleteBtn').click(function () {
      causeID = $(this).attr("data-value");
    });

    $('#confirmForm').click(function () {
      $.ajax({
            url:'{{ route("deleteCauseData") }}',
            type:'GET',
            data:{
              causeID   : causeID,
            },
            success:function(data) {
              location.reload();
            }
      });
    });
</script>
@stop
