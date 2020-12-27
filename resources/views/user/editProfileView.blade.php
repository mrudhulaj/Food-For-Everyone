@extends('templates.main')
<title>Edit Profile</title>
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


</style>
@section('content')

<section>
    <div style="margin: 0px 50px 0px 50px;">
      @include('templates.alertSuccessMessage')
    </div>
    <h2 style="margin-top: 0px;">
     Edit Profile
    </h2>
    <p>Please make sure the details provided including the mobile number and email are correct
      @if(!$profile->isVolunteer)
        .
      @else
        , so that we can inform when you are needed with us.
      @endif
    </p>
</section>

<div class="page-wrapper p-b-100 font-poppins" style="padding-top: 50px">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <form action="{{route('editProfileSave')}}" method="POST" enctype="multipart/form-data" name="editProfile" id="editProfile">
                    {{ csrf_field() }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <div class="row row-space profileImgDiv" style="color: #00A348">
                        <div>
                          
                          @if(!$profile->ProfileImage)
                            <i style="font-size: 120px;" class="fa fa-user-circle-o" aria-hidden="true"></i>
                          @else
                            <img src="{{ url('images/volanteer_1.jpg') }}" alt="" style="border-radius: 50%;height: 170px;width: 160px;box-shadow: 0px 2px 20px 15px rgba(0, 0, 0, 0.08);">
                          @endif

                        </div>
                      </div>

                      <div class="col-sm-offset-7 profileImgDiv" style="margin-bottom: 10px;margin-top: -10px;">
                        @if($profile->ProfileImage)
                          <label class="btn btn-default" style="background: transparent;border:none">
                            <i id="delProfileImg" class="fa fa-trash" aria-hidden="true" style="font-size: 20px;color: #00a74a"></i>
                          </label>
                        @endif
                        <label for="files" class="btn btn-default" style="background: transparent;border:none">
                            <i class="fa fa-upload" style="font-size: 20px;color: #00a74a" aria-hidden="true"></i>
                        </label>
                        <input id="files" accept="image/*" type="file" class="btn btn-default" style="visibility:hidden;" name="profileImage"/>
                      </div>

                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label ffe-font">First Name</label>
                                <input class="input--style-4" type="text" name="firstName" value="{{$profile->FirstName}}">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label ffe-font">Last name</label>
                                <input class="input--style-4" type="text" name="lastName" value="{{$profile->LastName}}">
                            </div>
                        </div>
                    </div>

                    <div class="input-group col-lg-12">
                        <label class="label ffe-font">Occupation</label>
                        <input class="input--style-4" type="text" name="occupation" value="{{$profile->Occupation}}">
                    </div>

                    <div class="input-group col-lg-12">
                        <label class="label ffe-font">Email</label>
                        <input class="input--style-4" type="text" name="email" value="{{$profile->Email}}">
                    </div>
                    <div class="input-group col-lg-12">
                        <label class="label ffe-font">Phone</label>
                        <input class="input--style-4" type="text" name="phone" value="{{$profile->Phone}}">
                    </div>

                    <div class="row row-space" style="padding-right: 0px">
                        <div class="col-lg-6">
                            <div class="input-group col-lg-12 selectbox-div">
                                <label class="label ffe-font">District
                                  @if($profile->isVolunteer)
                                    <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                                        title="The district where you'll be available."></i>
                                  @endif
                                </label>
                                <select class="form-control input--style-4" style="" id="district" name="district">
                                    <option hidden value="">District</option>
                                    <option @if($profile->District) selected @endif value="Kerala">Kerala</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group col-lg-12 selectbox-div">
                                <label class="label ffe-font">State
                                  @if($profile->isVolunteer)
                                    <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                                        title="The state where you'll be available."></i>
                                  @endif
                                </label>
                                <select class="form-control input--style-4" style="" id="state" name="state">
                                    <option hidden value="">State</option>
                                    <option value="Calicut" @if($profile->State) selected @endif>Calicut</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    @if($profile->isVolunteer)
                      <div class="input-group col-lg-12">
                        <label class="label ffe-font">Facebook</label><i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                        title="Enter your facebook profile link here."></i>
                        <input class="input--style-4" type="text" name="facebook" value="{{$profile->FacebookLink}}">
                      </div>
                    @endif
                  
                  @if($profile->isVolunteer)
                    <div class="input-group col-lg-12">
                      <label class="label ffe-font">Twitter</label><i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                      title="Enter your twitter profile link here."></i>
                      <input class="input--style-4" type="text" name="twitter" value="{{$profile->TwitterLink}}">
                    </div>
                  @endif

                    <div class="" style="text-align: center;margin-top: 30px;">
                        <button type="submit" id="submitbtn" class="btn button-bg-green"
                            style="padding: 0px;width: 120px;height: 60px;">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script>

    $(document).ready(function () {

        // Add Volunteer form validation
        $("form[name='editProfile']").validate({
            errorPlacement: function (error, element) {
                if (element.parent().hasClass('selectbox-div') || element.parent().hasClass(
                        'amount-div')) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },
            rules: {
                firstName: "required",
                lastName: "required",
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    number: true
                },
            },
            messages: {
                firstName: "Please enter your first name",
                lastName: "Please enter your last name",
                phone: {
                    required: "Please enter your mobile number",
                    number: "Please enter numbers only"
                },
                email: "Please enter a valid email address"
            },
        });

    });

    $('#delProfileImg').click(function () {
      $.ajax({
            url:'{{ route("delProfileImg") }}',
            type:'GET',
            success:function(data) {
              location.reload();
            }
      });
    });

    $('#files').change(function(){
      $('#editProfile').submit();
    });

</script>
@stop
