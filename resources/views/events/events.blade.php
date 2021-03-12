@extends('templates.main')
<title>Events</title>
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
        width: 160px !important;
        left: 44% !important;
    }

     /* View button */

     .box-content h2 a {
        background: #fff none repeat scroll 0 0;
        border-radius: 30px;
        color: #05ce68;
        font-family: "Roboto", sans-serif;
        font-size: 16px;
        font-weight: 500;
        padding: 10px 55px;
        text-decoration: none;
        border: 1px solid #05ce68;
    }

    .box-content h2 a:hover {
        background: #01d262 none repeat scroll 0 0;
        color: white;
    }

</style>
@section('content')
<div class="container" style="padding: 0px 10px 0px 30px;">
    @include('templates.alertSuccessMessage')
</div>
<section class="events_section_area">
    <h2 id="cust-h2" @guest style="padding-left: 175px;" @else style="padding-left: 280px;" @endguest>
         <span class="custom-underline">UPCOMING EVENTS</span>
        @guest
          <button class="btn button-bg-green"
              style="padding: 0px;width: 120px;height: 40px;float: right;margin-right: 60px;">
              <a class="a-none" href="javascript:void(0)" data-toggle="modal" data-target="#defaultModal">
                Add Event
              </a>
          </button>
        @else
          <button class="btn button-bg-green"
              style="padding: 0px;width: 120px;height: 40px;float: right;margin-right: 60px;">
              <a class="a-none" href="{{ route('addEventView') }}">Add Event</a>
          </button>
          <button class="btn button-bg-green" style="padding: 0px;width: 110px;height: 40px;float: right;margin-right: 10px">
            <a class="a-none" href="{{ route('editEventView') }}">Edit</a>
          </button>
        @endguest
    </h2>
    <p>Missed our previous events? Don't worry, we have plenty of them coming up!</p>
    <div class="container" style="margin-bottom: 50px">
      @if(count($events) == 0) <p style="text-align: center;margin-top: 100px"><b>No events added.</b></p> @endif
        <div class="row">
            @foreach($events as $eventsData)
                <div class="col-md-4 col-xs-12">
                    <div class="events_single box-content" style="height: 570px;width: 351px;border-radius: 13px;
                    box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.5);">
                        <div style="width: 351px;height: 207px;overflow: hidden;border-radius: 13px 13px 0px 0px;">
                            <img style="width: 351px;height: 207px;" src="{{ asset($eventsData->EventImage) }}">
                        </div>
                        <div style="padding: 10px;">
                            <div class="" style="margin-bottom: 5px">
                              <i class="fas fa-clock"></i>
                              {{$eventsData->BeginTime}} - {{$eventsData->EndTime}}
                            </div>
                            <div class="">
                              <i class="fas fa-map-marker-alt"></i>
                              {{$eventsData->Landmark.", ".$eventsData->City.", ".$eventsData->District.", ".$eventsData->State}}
                            </div>
                          <div class="clear"></div>
                          <h3 style="text-decoration: none;"> <a href="{{route('eventDetailsView',['eventID' => Crypt::encrypt($eventsData->ID)])}}" class="a-none">{{$eventsData->EventName}}</a> </h3>
                          <h6 style="min-height: 128px;">{{$eventsData->EventShortDescription}}</h6>
                              <br>
                        </div>
                        <div style="text-align: center;">
                          <h2 class="cust-button" style="text-align: center;margin-top: 15px">
                            <a href="{{route('eventDetailsView',['eventID' => Crypt::encrypt($eventsData->ID)])}}" class="donateButton">View</a></h2>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
{{--  Begin: Submitted Modal  --}}
<div class="modal fade" id="submittedModal" tabindex="-1" role="dialog" aria-labelledby="submittedModalLabel"
aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content" style="border-radius: 13px;border: none">
          <div class="modal-header ffe-font">
              <h5 class="modal-title" id="submittedModalLabel">Event Submitted !
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </h5>
          </div>
          <div class="modal-body col-lg-12 ffe-font" style="padding: 20px;">
              <p class="ffe-font">Your event is successfully submitted.The event added will be subject to admin approval.Please make sure the event is genuine and you are willing to provide more details on request of admin.</p>
          </div>
          <div class="modal-footer">
              <button id="" data-dismiss="modal" type="button" class="btn btn-secondary mdl-btn-cancel">
                  Close
              </button>
          </div>
      </div>
  </div>
</div>
{{--  End: Submitted Modal  --}}
@include('templates.defaultModal', ['title' => 'Login Required','message' => 'Please login or sign up to continue.'])
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script>
   $(document).ready(function () {
      let saved = "{{$saved}}";
      console.log("saved = "+saved);
      if(saved == '1'){
        jQuery.noConflict(); 
        $('#submittedModal').modal('show'); 
      }
   });
</script>
@stop
