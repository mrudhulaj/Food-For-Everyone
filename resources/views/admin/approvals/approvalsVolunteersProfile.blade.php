@extends('templates.main')
<title>Volunteers Profile</title>
<link
    href="{{ url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i') }}"
    rel="stylesheet">
<link href="{{ url('css/form.css') }}" rel="stylesheet" media="all">
<link href="{{ url('font-awesome/css/all.css') }}" rel="stylesheet" media="all">

<style>
    .wrapper section>h2::before {
        width: 200px !important;
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

</style>
@section('content')

<section>
    <div style="margin: 0px 50px 0px 50px;">
        @include('templates.alertSuccessMessage')
    </div>
    <h2 style="margin-top: 0px;">
        View Profile
    </h2>
</section>

<div class="page-wrapper p-b-100 font-poppins" style="padding-top: 50px">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <div class="row row-space profileImgDiv" style="color: #00A348;margin-bottom: 50px;">
                    <div>
                        @if(!$profile->ProfileImage)
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
                                value="{{ $profile->FirstName }}">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="input-group">
                            <label class="label ffe-font">Last name</label>
                            <input readonly class="input--style-4" type="text" name="lastName"
                                value="{{ $profile->LastName }}">
                        </div>
                    </div>
                </div>

                <div class="input-group col-lg-12">
                    <label class="label ffe-font">Occupation</label>
                    <input readonly class="input--style-4" type="text" name="occupation" value="{{ $profile->Occupation }}">
                </div>

                <div class="input-group col-lg-12">
                    <label class="label ffe-font">Email</label>
                    <input readonly class="input--style-4" type="text" name="email" value="{{ $profile->Email }}">
                </div>
                <div class="input-group col-lg-12">
                    <label class="label ffe-font">Phone</label>
                    <input readonly class="input--style-4" type="text" name="phone" value="{{ $profile->Phone }}">
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
                                <option @if($profile->District) selected @endif value="Kerala">Kerala</option>
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
                                <option value="Calicut" @if($profile->State) selected @endif>Calicut</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="input-group col-lg-12">
                    <label class="label ffe-font">Facebook</label><i class="fas fa-info-circle" data-toggle="tooltip"
                        data-placement="top" title="Enter your facebook profile link here."></i>
                    <input readonly class="input--style-4" type="text" name="facebook" value="{{ $profile->FacebookLink }}">
                </div>

                <div class="input-group col-lg-12">
                    <label class="label ffe-font">Twitter</label><i class="fas fa-info-circle" data-toggle="tooltip"
                        data-placement="top" title="Enter your twitter profile link here."></i>
                    <input readonly class="input--style-4" type="text" name="twitter" value="{{ $profile->TwitterLink }}">
                </div>
                <div style="margin-top: 50px">
                  <h2 class="borderes" style="text-align: center;">
                    <a style="text-decoration: none;margin-right: 30px" href="{{route('approvalsDecisions',['category' => "Volunteers",'Decision' => "1",'ID' => Crypt::encrypt($profile->ID)])}}" >Accept</a>
                    <a class="approvalDecline" style="text-decoration: none;" href="{{route('approvalsDecisions',['category' => "Volunteers",'Decision' => "2",'ID' => Crypt::encrypt($profile->ID)])}}" >Decline</a>
                  </h2>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
