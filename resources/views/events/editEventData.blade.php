@extends('templates.main')
<title>Edit Event</title>
<link
    href="{{ url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i') }}"
    rel="stylesheet">
<link href="{{ url('css/form.css') }}" rel="stylesheet" media="all">
<link href="{{ url('font-awesome/css/all.css') }}" rel="stylesheet" media="all">

<link href="{{ url('vendor/flatpickr/dist/flatpickr.css') }}" rel="stylesheet" media="all">


<style>
    .wrapper section>h2::before {
        width: 150px !important;
        left: 44% !important;
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
    #city-error,
    #beginTime-error,
    #endTime-error {
        margin-top: -22px;
        margin-bottom: 22px;
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
  left: 95%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: #555;
  color: white;
  font-size: 20px;
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
@include('templates.alertSuccessOrErrorMessage')
<section>
    <h2 style="margin-top: 0px;">
      <span style="margin-left: 170px;"  class="custom-underline">Edit Event</span>
      <button class="btn button-bg-green"
      style="padding: 0px;width: 120px;height: 40px;float: right;margin-right: 60px;">
        <a class="a-none" href="{{route('editEventView')}}">
          Back
        </a>
      </button>
    </h2>
    <p>Please make sure the details you provide including the time and location are as accurate as possible.</p>
</section>

<div class="page-wrapper p-b-100 font-poppins" style="padding-top: 50px">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <form action="{{ route('editEventDataSave') }}" method="POST" enctype="multipart/form-data"
                    name="addEvent" id="addEvent">
                    @csrf
                    <input type="hidden" name="eventID" value="{{$editEvent->ID}}">

                    <div class="input-group col-lg-12">
                        <label class="label ffe-font">Event/Venue Name</label>
                        <input class="input--style-4" type="text" name="eventName" value="{{$editEvent->EventName}}">
                    </div>

                    <div class="input-group col-lg-12">
                      <label class="label ffe-font">Short Description</label>
                      <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                                          title="This will be displayed in the general view."></i>
                      <textarea style="border: none;line-height: 25px;padding: 12px 22px;" name="shortDescription" id="" class="input--style-4" id="" cols="35" rows="5">{{$editEvent->EventShortDescription}}</textarea>
                    </div>
  
                    <div class="input-group col-lg-12">
                        <label class="label ffe-font">Long Description</label>
                        <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                                          title="This will be displayed in the detailed view."></i>
                        <textarea style="border: none;line-height: 25px;padding: 12px 22px;" name="longDescription" id="" class="input--style-4" id="" cols="35" rows="10">{{$editEvent->EventLongDescription}}</textarea>
                    </div>

                    <label class="label ffe-font">Time</label>
                    <div class="row row-space" style="padding-right: 0px">
                        <div class="col-lg-6">
                            <div class="input-group col-lg-12 selectbox-div">
                                <input class="input--style-4" type="text" name="beginTime" placeholder="Begin"
                                    id="beginTime" value="{{$editEvent->BeginTime}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group col-lg-12 selectbox-div">
                                <input class="input--style-4" type="text" name="endTime" placeholder="End" id="endTime" value="{{$editEvent->EndTime}}">
                            </div>
                        </div>
                    </div>

                    <div class="input-group col-lg-12">
                        <label class="label ffe-font">Email (For more information)</label>
                        <input class="input--style-4" type="text" name="email" value="{{$editEvent->Email}}">
                    </div>
                    <div class="input-group col-lg-12">
                        <label class="label ffe-font">Phone (For more information)</label>
                        <input class="input--style-4" type="text" name="phone" value="{{$editEvent->Phone}}">
                    </div>

                    <div class="input-group col-lg-12">
                      <label class="label ffe-font">Landmark</label>
                      <input class="input--style-4" type="text" name="landmark" value="{{$editEvent->Landmark}}">
                    </div>
                    <div class="input-group col-lg-12">
                      <label class="label ffe-font">Country</label>
                      <select class="form-control input--style-4" style="" id="country" name="country">
                        <option hidden selected="" value="">Country</option>
                        <option value="{{Auth::user()->Country}}" selected>{{Auth::user()->Country}}</option>
                      </select>                    
                    </div>
                    <div class="row row-space" style="padding-right: 0px">
                      <div class="col-lg-4">
                          <div class="input-group col-lg-12 selectbox-div">
                              <label class="label ffe-font">State
                              </label>
                              <select class="form-control input--style-4" style="" id="state" name="state">
                                  <option hidden value="">State</option>
                                  @foreach ($locationsState as $locationsStateData)
                                    <option @if($editEvent->State == $locationsStateData->State) selected @endif value="{{$locationsStateData->State}}">{{$locationsStateData->State}}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                        <div class="col-lg-4">
                            <div class="input-group col-lg-12 selectbox-div">
                                <label class="label ffe-font">District
                                </label>
                                <input type="hidden" value="{{$editEvent->District}}" id="savedDistrict">
                                <select class="form-control input--style-4" style="" id="district" name="district">
                                    <option hidden value="">District</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group col-lg-12 selectbox-div">
                                <label class="label ffe-font">City</label>
                                <input class="input--style-4" type="text" name="city" id="city" value="{{$editEvent->City}}">
                            </div>
                        </div>
                    </div>

                    <div class="input-group col-lg-12" style="margin-bottom: 0px;">
                        <label class="label ffe-font">Image</label>

                        <div class="col-md-12 input-group">
                            <input class=" form-control input--style-4" id="fileName" type="text"
                                style="height: 50px;" />
                            <div class="input-group-btn">
                                <label for="files" class="btn btn-default input--style-4 browsebtn"
                                    style="height: 50px;border-radius: 0px 5px 5px 0px;">Browse</label>
                                <input name="eventImage" id="files" accept="image/*" type="file" class="btn btn-default"
                                    style="visibility:hidden;" />
                            </div>
                        </div>
                    </div>

                    @if(!$editEvent->EventImage)
                      <div class="col-lg-12 noImagediv" style="text-align: center;margin-top: -50px;">
                        <label class="label ffe-font">No image added</label>
                      </div>
                    @endif

                    @if($editEvent->EventImage)
                      <div class="container-cust input-group col-lg-12" style="margin-bottom: 0px;border: 2px solid #ececec;border-radius: 5px">
                        <img src="{{ asset($editEvent->EventImage) }}" alt="" width="550px" height="350px" style="border-radius: 5px">
                        <button class="btn" id="imgDeleteBtn" type="button" data-value="{{$editEvent->ID}}">&times;</button>
                      </div>
                    @endif

                    <div class="" style="text-align: center; @if($editEvent->EventImage) margin-top: 45px; @endif">
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
                    the best of your knowledge and you are willing to provide more information if required.</p>
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
<script src="{{ asset('vendor/flatpickr/dist/flatpickr.min.js') }}"></script>

<script>
    $("input[name='typeofdonation']").change(function () {
        var type = $('input[name="typeofdonation"]:checked').val();

        if (type == 'Restaurant') {
            $(".type-rest").removeClass('hide');
        } else {
            $(".type-rest").addClass('hide');
        }

    });

    $("#beginTime").flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "h:i:K",
    });

    $("#endTime").flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "h:i:K",
    });

    $(document).ready(function () {

        // Add Event form validation
        $("form[name='addEvent']").validate({
            errorPlacement: function (error, element) {
                if (element.parent().hasClass('selectbox-div') || element.parent().hasClass(
                        'amount-div')) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },
            rules: {
                eventName: "required",
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    number: true
                },
                beginTime: {
                    required: true
                },
                endTime: {
                    required: true
                },
                shortDescription: {
                    required: true
                },
                longDescription: {
                    required: true
                },
                district: {
                    required: true
                },
                state: {
                    required: true
                },
                city: {
                    required: true
                },
                landmark: {
                    required: true
                },
            },
            messages: {
                firstName: "Please enter your first name",
                lastName: "Please enter your last name",
                eventName: "Please enter your event name",
                shortDescription: {
                    required: "Please enter short description",
                },
                longDescription: {
                    required: "Please enter long description",
                },
                beginTime: {
                    required: "Please enter begining time",
                },
                endTime: {
                    required: "Please enter ending time",
                },
                district: {
                    required: "Please select a district",
                },
                state: {
                    required: "Please select a state",
                },
                city: {
                    required: "Please enter a city",
                },
                landmark: {
                    required: "Please enter a landmark",
                },
                phone: {
                    required: "Please enter your mobile number",
                    number: "Please enter numbers only"
                },
                email: "Please enter a valid email address"
            },
        });

        $('#submitbtn').click(function () {
            var isFormValid = $('#addEvent').valid();
            if (isFormValid == true) {
                console.log("Form is valid");
                jQuery.noConflict();
                $('#confirmationModal').modal('show');
            } else {
                console.log("Form is invalid");
            }
        });
    });

    $('input[type=file]').change(function () {
        var filename = $('input[type=file]').val().split('\\').pop();
        $('#fileName').val(filename);
    });

    $('#confirmForm').click(function () {
          $('#addEvent').submit();
    });

    $('#imgDeleteBtn').click(function () {
      $.ajax({
            url:'{{ route("deleteEventImage") }}',
            type:'GET',
            data:{
              eventID   : $(this).attr("data-value"),
            },
            success:function(data) {
              location.reload();
            }
      });
    });

    $('.browsebtn').click(function () {
          $('.noImagediv').hide();
    });

    locationsSpecificDataCustom("State",$('#state').val(),"UserMenu","onLoad");
    $('#state').change(function(){
        if($(this).val() != ""){
          $('#district')
              .empty()
              .append('<option hidden value="">District</option>')
              ;
          locationsSpecificDataCustom("State",$(this).val(),"UserMenu");
        }
    });

    // Ajax function to get district according to selected state.
    var selected,selectedID,from,optionValue,onLoad;
    function locationsSpecificDataCustom(selected,selectedID,from = "",onLoad = ""){
      $.ajax({
              url:'{{ route("adminLocationsSpecificData") }}',
              type:'GET',
              data:{
                  selected   : selected,
                  selectedID : selectedID,
                  from       : from,
              },
              success:function(data) {
                $.each(data, function (i) {
                    $.each(data[i], function (key, val) {
                      if(selected == "State"){
                          optionValue = from == "UserMenu" ? data[i]['District'] : data[i]['ID'];
                          if(onLoad == ""){
                            $('#district').append($("<option></option>").attr("value", optionValue).text(data[i]['District'])); 
                          }
                          else if( data[i]['District'] == $("#savedDistrict").val() ){
                            $('#district').append($("<option></option>").attr("value", optionValue).attr('selected','selected').text(data[i]['District'])); 
                          }
                          else{
                            $('#district').append($("<option></option>").attr("value", optionValue).text(data[i]['District'])); 
                          }
                        }
                      return false;
                    });
                });
              }
          });
    }

</script>
@stop
