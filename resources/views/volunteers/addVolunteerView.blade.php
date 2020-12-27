@extends('templates.main')
<title>Add Volunteer</title>
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
    <h2 style="margin-top: 0px;">
      @if(Session::get('user')=="Admin" || Session::get('user')=="Volunteer")
      Add a Volunteer
      @else
        Become A Volunteer
      @endif
    </h2>
    <p>Please make sure the details provided including the mobile number and email are correct, so that we can inform
        the volunteer when they are needed with us.</p>
</section>

<div class="page-wrapper p-b-100 font-poppins" style="padding-top: 50px">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <form action="{{ route('addVolunteerSave') }}" method="POST" enctype="multipart/form-data" name="addVolunteer" id="addVolunteer">
                    {{ csrf_field() }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="row row-space " style="color: #00A348">
                      <div class="profileImgDefault">
                        
                        @if(!$profile->ProfileImage)
                          <i style="font-size: 120px;" class="fa fa-user-circle-o" aria-hidden="true"></i>
                        @else
                          <img src="{{ url('images/volanteer_1.jpg') }}" alt="" style="border-radius: 50%;height: 170px;width: 160px;box-shadow: 0px 2px 20px 15px rgba(0, 0, 0, 0.08);">
                        @endif

                      </div>
                      <div class="profileImgNonDefault hide">
                        <i style="font-size: 120px;" class="fa fa-user-circle-o" aria-hidden="true"></i>
                      </div>
                    </div>

                    <div class="col-sm-offset-7 profileImgDiv" style="margin-bottom: 10px;margin-top: -10px;">
                      @if($profile->ProfileImage)
                        <label class="btn btn-default" style="background: transparent;border:none">
                          <i id="delVolunteerImg" class="fa fa-trash" aria-hidden="true" style="font-size: 20px;color: #00a74a"></i>
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
                                    <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                                        title="The district where you'll be available."></i>
                                </label>
                                <select class="form-control input--style-4" style="" id="district" name="district">
                                    <option hidden selected="" value="">District</option>
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
                                <select class="form-control input--style-4" style="" id="state" name="state">
                                    <option hidden selected="" value="">State</option>
                                    <option value="Calicut" @if($profile->State) selected @endif>Calicut</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="input-group col-lg-12">
                      <label class="label ffe-font">Facebook</label><i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                      title="Enter your facebook profile link here."></i>
                      <input class="input--style-4" type="text" name="facebook">
                    </div>

                  <div class="input-group col-lg-12">
                    <label class="label ffe-font">Twitter</label><i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                    title="Enter your twitter profile link here."></i>
                    <input class="input--style-4" type="text" name="twitter">
                  </div>

                    <div class="" style="text-align: center;">
                        <button type="button" id="submitbtn" class="btn button-bg-green"
                            style="padding: 0px;width: 120px;height: 60px;">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Begin :Confirmation box --}}
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 13px;border: none">
            <div class="modal-header ffe-font">
                <h5 class="modal-title" id="confirmationModalLabel">Confirmation
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
            <div class="modal-body col-lg-12 ffe-font" style="padding: 20px;">
                <p>By clicking the confirm button you hereby acknowledge that the details provided by you is genuine to
                    the best of your knowledge and you are willing to participate in our events and programs as a
                    volunteer.</p>
            </div>
            <div class="modal-footer">
                <button id="confirmForm" type="submit" class="btn btn-primary button-bg-green"
                    style="padding: 6px 12px;border-radius: 4px;">
                    Confirm
                </button>
                <button id="" data-dismiss="modal" type="button" class="btn btn-secondary mdl-btn-cancel">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
{{-- End :Confirmation Box --}}
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script>
    $("input[name='typeofdonation']").change(function () {
        var type = $('input[name="typeofdonation"]:checked').val();

        if (type == 'Restaurant') {
            $(".type-rest").removeClass('hide');
        } else {
            $(".type-rest").addClass('hide');
        }

    });

    $(document).ready(function () {

        // Add Volunteer form validation
        $("form[name='addVolunteer']").validate({
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
                occupation: "required",
                restaurantName: "required",
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    number: true
                },
                district: {
                    required: true
                },
                state: {
                    required: true
                },
            },
            messages: {
                firstName: "Please enter your first name",
                lastName: "Please enter your last name",
                occupation: "Please enter your occupation",
                district: {
                    required: "Please select a district",
                },
                state: {
                    required: "Please select a state",
                },
                phone: {
                    required: "Please enter your mobile number",
                    number: "Please enter numbers only"
                },
                email: "Please enter a valid email address"
            },
        });

        $('#submitbtn').click(function () {
            var isFormValid = $('#addVolunteer').valid();
            if (isFormValid == true) {
                jQuery.noConflict();
                $('#confirmationModal').modal('show');
            }
        });
    });

    $('input[type=file]').change(function() {
        var filename = $('input[type=file]').val().split('\\').pop();
        $('#fileName').val(filename);
    });

    $('#confirmForm').click(function () {
          $('#addVolunteer').submit();
    });

    $('#delVolunteerImg').click(function () {
      $.ajax({
            url:'{{ route("delVolunteerImg") }}',
            type:'GET',
            success:function(data) {
              if(data == "True"){
                location.reload();
              }
              else{
                $('.profileImgNonDefault').removeClass('hide');
                $('.profileImgDefault').addClass('hide');
              }
            }
      });
    });

    $('#files').change(function(){
      $('#addVolunteer').submit();
    });



</script>
@stop
