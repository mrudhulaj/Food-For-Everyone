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

</style>
@section('content')
<div class="container" style="padding: 0px 10px 0px 30px;">
    @include('templates.alertSuccessMessage')
</div>
<section class="events_section_area">
    <h2 id="cust-h2" @guest style="padding-left: 175px;" @else style="padding-left: 280px;" @endguest>
        UPCOMING EVENTS
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
        <div class="row">
            @foreach($events as $eventsData)
                <div class="col-md-4 col-xs-12">
                    <div class="events_single" style="height: 570px;width: 351px;border-radius: 13px;
                    box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.5);">
                        <div style="width: 351px;height: 207px;overflow: hidden;border-radius: 13px 13px 0px 0px;">
                            <img style="width: 351px;height: 207px;" src="{{ asset($eventsData->EventImage) }}">
                        </div>
                        <div style="padding: 10px;">
                          <p>
                            <span class="event_left">
                              <i class="fas fa-clock"></i>
                              {{$eventsData->BeginTime}} - {{$eventsData->EndTime}}
                            </span>
                            <span class="event_right">
                              <i class="fas fa-map-marker-alt"></i>
                              {{$eventsData->District.", ".$eventsData->State}}
                            </span>
                          </p>
                          <div class="clear"></div>
                          <h3 style="text-decoration: none;"> <a href="{{route('eventDetailsView',['eventID' => Crypt::encrypt($eventsData->ID)])}}" class="a-none">{{$eventsData->EventName}}</a> </h3>
                          <h6 style="min-height: 128px;">{{$eventsData->EventShortDescription}}</h6>
                              <br>
                        </div>
                        <div style="text-align: center;">
                          <span>
                            Click 
                              <a href="{{route('eventDetailsView',['eventID' => Crypt::encrypt($eventsData->ID)])}}" style="color: #00A348;text-decoration: none"> 
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
