@extends('templates.main')
<title>Volunteer Details</title>
<link
    href="{{ url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i') }}"
    rel="stylesheet">
<link href="{{ url('css/form.css') }}" rel="stylesheet" media="all">
<link href="{{ url('font-awesome/css/all.css') }}" rel="stylesheet" media="all">

<style>
    .wrapper section>h2::before {
        width: auto !important;
        left: 43% !important;
    }

    .card {
        box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.5);
    }

    .modal-header {
        background-color: #00E660;
        color: black;
        font-weight: bold;
        border-radius: 13px 13px 0px 0px;
    }

    #expectedAmount-error {
        margin-top: -22px;
        margin-bottom: 22px;
    }

    #state-error,
    #district-error,
    #city-error {
        margin-top: -22px;
        margin-bottom: 22px;
    }

    .borderes .isApproved {
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

    .borderes .isApproved:hover {
        background: #01d262 none repeat scroll 0 0;
        color: white;
    }

    .borderes .isApproved {
        background: #01d262 none repeat scroll 0 0;
        color: white !important;
        text-decoration: none;
        border: none !important;
        outline: none !important;
    }

</style>
@section('content')

<section>
    <div style="margin: 0px 50px 0px 50px;">
        @include('templates.alertSuccessOrErrorMessage')
    </div>
    <h2 style="margin-top: 0px;">
      <span class="custom-underline">
        Profile
      </span>
    </h2>
</section>
<div class="col-lg-12" style="text-align: right;margin-top: -90px;padding-right: 62px;">
  <button class="back-button"><a style="text-decoration: none;color: inherit !important;" href="{{ URL::previous() }}">Back</a></button>
</div>
<div class="page-wrapper p-b-100 font-poppins" style="padding-top: 50px">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <div class="row row-space profileImgDiv" style="color: #00A348;margin-bottom: 50px;">
                    <div>
                        @if(!$volunteerData->ProfileImage)
                            <i style="font-size: 120px;" class="fa fa-user-circle-o" aria-hidden="true"></i>
                        @else
                            <img src="{{ url('images/volanteer_1.jpg') }}" alt=""
                                style="border-radius: 50%;height: 170px;width: 160px;box-shadow: 0px 2px 20px 15px rgba(0, 0, 0, 0.08);">
                        @endif

                    </div>
                </div>

                <div class="row row-space">
                    <div class="col-2">
                        <div class="input-group">
                            <label class="label ffe-font">First Name</label>
                            <input readonly class="input--style-4" type="text" name="firstName"
                                value="{{ $volunteerData->FirstName }}">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="input-group">
                            <label class="label ffe-font">Last name</label>
                            <input readonly class="input--style-4" type="text" name="lastName"
                                value="{{ $volunteerData->LastName }}">
                        </div>
                    </div>
                </div>

                <div class="input-group col-lg-12">
                    <label class="label ffe-font">Occupation</label>
                    <input readonly class="input--style-4" type="text" name="occupation" value="{{ $volunteerData->Occupation }}">
                </div>

                <div class="input-group col-lg-12">
                    <label class="label ffe-font">Email</label>
                    <input readonly class="input--style-4" type="text" name="email" value="{{ $volunteerData->Email }}">
                </div>
                <div class="input-group col-lg-12">
                    <label class="label ffe-font">Phone</label>
                    <input readonly class="input--style-4" type="text" name="phone" value="{{ $volunteerData->Phone }}">
                </div>

                <div class="row row-space" style="padding-right: 0px">
                    <div class="col-lg-6">
                        <div class="input-group col-lg-12 selectbox-div">
                            <label class="label ffe-font">District
                                <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                                    title="The district where you'll be available."></i>
                            </label>
                            <select class="form-control input--style-4" disabled style="" id="district" name="district">
                                <option hidden value="">District</option>
                                <option @if($volunteerData->District) selected @endif value="Kerala">Kerala</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group col-lg-12 selectbox-div">
                            <label class="label ffe-font">State
                                <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                                    title="The state where you'll be available."></i>
                            </label>
                            <select disabled class="form-control input--style-4" style="" id="state" name="state">
                                <option hidden value="">State</option>
                                <option value="Calicut" @if($volunteerData->State) selected @endif>Calicut</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="input-group col-lg-12">
                    <label class="label ffe-font">Facebook</label><i class="fas fa-info-circle" data-toggle="tooltip"
                        data-placement="top" title="Enter your facebook profile link here."></i>
                    <input readonly class="input--style-4" type="text" name="facebook" value="{{ $volunteerData->FacebookLink }}">
                </div>

                <div class="input-group col-lg-12">
                    <label class="label ffe-font">Twitter</label><i class="fas fa-info-circle" data-toggle="tooltip"
                        data-placement="top" title="Enter your twitter profile link here."></i>
                    <input readonly class="input--style-4" type="text" name="twitter" value="{{ $volunteerData->TwitterLink }}">
                </div>
                @if ($volunteerData->IsApproved == '2')
                  <div class="col-lg-12 ffe-font" style="padding: 0px !important;margin-bottom: 50px">
                    <label class="ffe-font">Reason for rejection</label>
                    <textarea style="border: none;line-height: 25px;padding: 12px 22px;" name="rejectionReason"
                    id="rejectionReason" class="input--style-4" cols="54" rows="6" readonly disabled>{{$volunteerData->RejectedReason}}</textarea>                            
                  </div>
                @endif
                <div style="margin-top: 50px">
                  <h2 class="borderes" style="text-align: center;">
                    @if ($volunteerData->IsApproved == '1')
                      <button class="isApproved" style="" href="javascript:void(0)" disabled>Accepted</button>
                    @elseif($volunteerData->IsApproved == '2')
                      <button class="isApproved" class="approvalDecline" style="text-decoration: none;background-color: #d64f4f !important;" href="javascript:void(0)" disabled>Rejected</button>
                    @else
                      <button class="isApproved" class="approvalDecline" style="text-decoration: none;background-color: orange !important;" href="javascript:void(0)" disabled>Pending</button>
                    @endif
                  </h2>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
