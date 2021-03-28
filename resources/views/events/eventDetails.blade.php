@extends('templates.main')
<title>Event Details</title>
<link href="{{ url('font-awesome/css/all.css') }}" rel="stylesheet" media="all">
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
    
    .cust-icons{
      font-size: 15px !important;
      /* left: 0; */
      /* top: 2px; */
    }

</style>
@section('content')
<section>
    <h2 style="margin-top: 0px;">
      <span style="border-bottom: 2px solid #01d262;padding-bottom: 10px;">
        {{$eventData->EventName}}
      </span> 
    </h2>
</section>
<div class="col-lg-12" style="text-align: right;margin-top: -90px;padding-right: 62px;">
  <button class="back-button"><a style="text-decoration: none;color: inherit !important;" href="{{ URL::previous() }}">Back</a></button>
</div>
<div class="container cust-center">
    <div class="col-lg-12 mainbox-cust plr-0 img-cust" style="width: 940px !important;">
        <div style="overflow: hidden !important;">
          @if($eventData->Image != "")
          <img id="" src="{{ asset($eventData->Image) }}"
          alt="" style="width: 940px;height: 577px;margin-top: -15%;">
          @else
          <div style="width: 940px;height: 577px;text-align: center;padding-top: 30px">
            <i class="fas fa-calendar-check iDashboard" style="padding: 40px 20px 20px 30px;font-size: 400px"></i>
          </div>
          @endif
        </div>
        <div class="col-lg-12 plr-0" style="margin-bottom: 20px;margin-top: 10px;">
          <div class="col-lg-6" style="">
            <i class="fas fa-clock"></i>
            {{$eventData->BeginTime}} - {{$eventData->EndTime}}
          </div>
          <div class="col-lg-6" style="text-align: right">
              <i class="fas fa-map-marker-alt"></i>
              {{$eventData->Landmark.", ".$eventData->City.", ".$eventData->District.", ".$eventData->State.", ".$eventData->countryName}}
          </div>
        </div>
        <div class="ffe-font" style="padding-left: 30px;padding-right: 30px;padding-top: 30px;">

            <div>
                <p style="font-weight: bold">
                  {{$eventData->EventShortDescription}}
                </p>
            </div>
            <div>
                <p>
                  {{$eventData->EventLongDescription}}
                </p>
            </div>
            <div>
              <p style="font-weight: bold">
                  For more information please contact:
              </p>
              <p style="padding-bottom: 15px;">
                  Phone: +91 {{$eventData->Phone}}
                <br>
                  Place: {{$eventData->Landmark.", ".$eventData->City.", ".$eventData->District.", ".$eventData->State.", ".$eventData->countryName}}
                <br>
                  Email: {{$eventData->Email}}
              </p>
            </div>
            @if (Auth::check())
              @if(Auth::user()->TypeOfAccount == "Admin")
                <div style="margin-bottom: 50px">
                  <h2 class="borderes" style="text-align: center;">
                    <a style="text-decoration: none;margin-right: 30px" href="{{route('approvalsDecisions',['category' => "Events",'Decision' => "1",'ID' => Crypt::encrypt($eventData->ID)])}}" >Accept</a>
                    <a class="approvalDecline" style="text-decoration: none;" href="javascript:void(0)" data-toggle="modal" data-target="#declineModal">Reject</a>
                  </h2>
                </div>
                {{-- Begin:Decline Modal --}}
                <div class="modal fade" id="declineModal" tabindex="-1" role="dialog" aria-labelledby="declineModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content" style="border-radius: 13px;border: none">
                            <div class="modal-header ffe-font">
                                <h5 class="modal-title" id="declineModalLabel">Rejection Confirmation
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </h5>
                            </div>
                            <form action="{{route('approvalsDecisions')}}" method="POST" enctype="multipart/form-data" name="" id="">
                              @csrf
                              <div class="modal-body col-lg-12 ffe-font" style="padding: 20px;">
                                <label class="ffe-font">Reason for rejection</label>
                                <textarea style="border: none;line-height: 25px;padding: 12px 22px;" name="rejectionReason"
                                id="rejectionReason" class="input--style-4" cols="56" rows="6"></textarea>                            
                            </div>
                            <div class="modal-footer">
                                <button id="" type="submit" class="btn btn-danger">
                                    Confirm
                                </button>
                                <button id="" data-dismiss="modal" type="button" class="btn btn-secondary mdl-btn-cancel">
                                    Close
                                </button>
                            </div>
                            <input type="hidden" name="category" value="Events">
                            <input type="hidden" name="Decision" value="2">
                            <input type="hidden" name="ID" value="{{Crypt::encrypt($eventData->ID)}}">
                            </form>
                        </div>
                    </div>
                </div>
                {{-- End:Decline Modal --}}
              @endif
            @endif
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
