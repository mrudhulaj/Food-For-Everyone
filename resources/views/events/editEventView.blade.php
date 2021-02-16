@extends('templates.main')
<title>Edit Events</title>
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

    .button-bg-green-cust {
    background: #ffffff none repeat scroll 0 0 !important;
    border-radius: 30px !important;
    color: #00E660 !important ;
    font-family: "Roboto", sans-serif !important;
    font-size: 16px !important;
    font-weight: 500 !important;
    padding: 15px 40px !important;
    text-decoration: none !important;
    border: 1px solid #00E660 !important;
  }

  .button-bg-green-cust:hover {
    background: #00B346 !important;
    font-weight: bold !important;
    border: none !important;
    color: white !important;
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
  left: 94%;
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
<div class="container" style="padding: 0px 10px 0px 30px;">
    @include('templates.alertSuccessMessage')
</div>
<section class="events_section_area">
    <h2 id="cust-h2" style="padding-left: 175px;">
        EDIT EVENTS
          <button class="btn button-bg-green"
              style="padding: 0px;width: 120px;height: 40px;float: right;margin-right: 60px;">
              <a class="a-none" href="{{route('eventsView')}}">
                Back
              </a>
          </button>
    </h2>
    <p>Edit your added events here.</p>
    @if(count($events) == 0)
     <p style="text-align: center;margin-top: 100px"><b>You have not added any events to edit.</b></p> 
    @endif
    <div class="container" style="margin-bottom: 50px">
        <div class="row">
            @foreach($events as $eventsData)
                <div class="col-md-4 col-xs-12">
                    <div class="events_single" style="height: 600px;width: 351px;border-radius: 13px;
                    box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.5);">
                        <div class="container-cust" style="width: 351px;height: 207px;overflow: hidden;border-radius: 13px 13px 0px 0px;">
                            <img style="width: 351px;height: 207px;" src="{{ asset($eventsData->EventImage) }}">
                            <button data-toggle="modal" data-target="#deleteModal" class="btn" id="eventDeleteBtn" type="button" data-value="{{$eventsData->ID}}">&times;</button>
                        </div>
                        <div style="padding: 10px;">
                            <div class="event_left">
                              <i class="fas fa-clock"></i>
                              {{$eventsData->BeginTime}} - {{$eventsData->EndTime}}
                            </div>
                            <div class="event_right">
                              <i class="fas fa-map-marker-alt"></i>
                              {{$eventsData->Landmark.", ".$eventsData->City.", ".$eventsData->District.", ".$eventsData->State}}
                            </div>
                          <div class="clear"></div>
                          <h3 style="text-decoration: none;">{{$eventsData->EventName}}</h3>
                          <h6 style="min-height: 128px;">{{$eventsData->EventShortDescription}}</h6>
                              <br>
                        </div>
                        <div style="text-align: center;padding: 20px">
                          <button class="btn button-bg-green-cust"
                          style="padding: 0px;width: 120px;height: 52px;">
                            <a class="a-none" href="{{route('editEventData',["eventID" => Crypt::encrypt($eventsData->ID)])}}">
                              Edit
                            </a>
                          </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
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
                <p class="ffe-font">Are you sure you want to delete this event?</p>
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
  var eventID;
    $('#eventDeleteBtn').click(function () {
      eventID = $(this).attr("data-value");
    });

    $('#confirmForm').click(function () {
      $.ajax({
            url:'{{ route("deleteEventData") }}',
            type:'GET',
            data:{
              eventID   : eventID,
            },
            success:function(data) {
              location.reload();
            }
      });
    });
</script>
@stop
