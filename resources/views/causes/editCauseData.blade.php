@extends('templates.main')
<title>Edit Cause</title>
<link
    href="{{ url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i') }}"
    rel="stylesheet">
<link href="{{ url('css/form.css') }}" rel="stylesheet" media="all">
<link href="{{ url('font-awesome/css/all.css') }}" rel="stylesheet" media="all">

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

    #expectedAmount-error{
      margin-top: -22px;
      margin-bottom: 22px;
    }

    #state-error,
    #district-error,
    #city-error {
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
  top: 7%;
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
<div class="page-wrapper" style="min-height: auto !important;">
  <div class="wrapper wrapper--w680">
    @include('templates.alertSuccessOrErrorMessage')
  </div>
</div>
<section>
  <h2 style="margin-top: 0px;"> <span class="custom-underline">Edit cause</span></h2>
  <p>Please make sure the details you provide are as accurate as possible.</p>
</section>
<div class="page-wrapper p-b-100 font-poppins" style="padding-top: 50px">
  <div class="wrapper wrapper--w680">
      <div class="card card-4">
          <div class="card-body">
              <form action="{{ route('editCauseDataSave') }}" method="POST"
                  enctype="multipart/form-data" name="addCause" id="addCause">
                  {{ csrf_field() }}
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="causeID" value="{{$editCause->ID}}">
                  <div class="input-group col-lg-12">
                    <label class="label ffe-font">Cause Name</label>
                    <input class="input--style-4" type="text" name="causeName" value="{{$editCause->CauseName}}">
                  </div>

                  <div class="input-group col-lg-12">
                    <label class="label ffe-font">Short Description</label>
                    <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                                        title="This will be displayed in the general view."></i>
                    <textarea style="border: none;line-height: 25px;padding: 12px 22px;" name="causeShortDescription" id="causeShortDescription" class="input--style-4" id="" cols="35" rows="5">{{$editCause->CauseShortDescription}}</textarea>
                  </div>

                  <div class="input-group col-lg-12">
                      <label class="label ffe-font">Long Description</label>
                      <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                                        title="This will be displayed in the detailed view."></i>
                      <textarea style="border: none;line-height: 25px;padding: 12px 22px;" name="causeLongDescription" id="causeLongDescription" class="input--style-4" id="" cols="35" rows="10">{{$editCause->CauseLongDescription}}</textarea>
                  </div>

                  <label class="label ffe-font">Expected Amount</label>
                  <div class="input-group col-lg-12 amount-div">
                    <span class="input-group-addon left-input-addon" id="sizing-addon1">₹</span>
                    <input class="input--style-4" id="expectedAmount" type="text" name="expectedAmount"
                        aria-describedby="sizing-addon1" style="border-radius: 0px 5px 5px 0px;" value="{{$editCause->ExpectedAmount}}">
                  </div>

                  <div class="input-group col-lg-12">
                      <label class="label ffe-font">Email (For more infrmation)</label>
                      <input class="input--style-4" type="text" name="email" value="{{$editCause->Email}}">
                  </div>
                  <div class="input-group col-lg-12">
                      <label class="label ffe-font">Phone (For more information)</label>
                      <input class="input--style-4" type="text" name="phone" value="{{$editCause->Phone}}">
                  </div>
                  <div class="input-group col-lg-12">
                    <label class="label ffe-font">Landmark</label>
                    <input class="input--style-4" type="text" name="landmark" value="{{$editCause->Landmark}}">
                  </div>
                  <div class="input-group col-lg-12">
                    <label class="label ffe-font">Country</label>
                    <select class="form-control input--style-4" style="" id="country" name="country">
                      <option hidden selected="" value="">Country</option>
                      @foreach ($locationsCountry as $locationsCountryData)
                        <option value="{{$locationsCountryData->CountryID}}" @if($editCause->Country == $locationsCountryData->Country) selected @endif>{{$locationsCountryData->Country}}</option>
                      @endforeach
                    </select>                    
                  </div>
                  <div class="row row-space" style="padding-right: 0px">
                    <div class="col-lg-4">
                      <div class="input-group col-lg-12 selectbox-div">
                          <label class="label ffe-font">State</label>
                          <select class="form-control input--style-4" style="" id="state" name="state">
                              <option hidden value="">State</option>
                              @foreach ($locationsState as $locationsStateData)
                                <option @if($editCause->State == $locationsStateData->State) selected @endif value="{{$locationsStateData->ID}}">{{$locationsStateData->State}}</option>
                              @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group col-lg-12 selectbox-div">
                            <label class="label ffe-font">District</label>
                            <input type="hidden" value="{{$editCause->District}}" id="savedDistrict">
                            <select class="form-control input--style-4" style="" id="district" name="district">
                                <option hidden value="">District</option>
                                @foreach ($locationsDistrict as $locationsDistrictData)
                                  <option @if($editCause->District == $locationsDistrictData->District) selected @endif value="{{$locationsDistrictData->ID}}">{{$locationsDistrictData->District}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                      <div class="col-lg-4">
                        <div class="input-group col-lg-12 selectbox-div">
                            <label class="label ffe-font">City</label>
                            <input class="input--style-4" type="text" name="city" id="city" value="{{$editCause->City}}">
                        </div>
                    </div>
                  </div>

                  <div class="input-group col-lg-12" style="margin-bottom: 0px;">
                    <label class="label ffe-font">Image</label>
                    <div class="col-md-12 input-group">
                        <input class=" form-control input--style-4" id="fileName" type="text" style="height: 50px;"/>
                        <div class="input-group-btn">
                            <label for="files" class="btn btn-default input--style-4 browsebtn" style="height: 50px;border-radius: 0px 5px 5px 0px;">Browse</label>
                            <input name="causeImage" id="files" accept="image/*" type="file" class="btn btn-default" style="visibility:hidden;" />
                        </div>
                    </div>
                    @if(!$editCause->Image)
                      <div class="col-lg-12 noImagediv" style="text-align: center;margin-top: -30px;">
                        <label class="label ffe-font">No image added</label>
                      </div>
                    @endif
                </div>
                
                @if($editCause->Image)
                  <div class="container-cust input-group col-lg-12" style="margin-bottom: 0px;border: 2px solid #ececec;border-radius: 5px">
                    <img src="{{ asset($editCause->Image) }}" alt="" width="550px" height="350px" style="border-radius: 5px">
                    <button class="btn" id="imgDeleteBtn" type="button" data-value="{{$editCause->ID}}">&times;</button>
                  </div>
                @endif

                  <div class="" style="text-align: center;padding-top: 40px;">
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
              <p>By clicking the confirm button you here by acknowledge that the details provided by you is genuine to the best of your knowledge.</p>
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

  $(document).ready(function () {
      // Add Cause form validation
      $("form[name='addCause']").validate({
          errorPlacement: function (error, element) {
              if ( element.parent().hasClass('selectbox-div') || element.parent().hasClass('amount-div') ) {
                  error.insertAfter(element.parent());
              } else {
                  error.insertAfter(element);
              }
          },
          rules: {
              causeName: "required",
              causeLongDescription: {
                  required: true,
                  minlength:8
              },
              causeShortDescription: {
                  required: true,
                  minlength:8
              },
              restaurantName: "required",
              email: {
                  required: true,
                  email: true
              },
              expectedAmount: {
                  required: true,
                  number: true
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
              city: {
                  required: true
              },
              landmark: {
                  required: true
              },
          },
          messages: {
              causeName: "Please enter the cause name",
              causeLongDescription: {
                  required: "Please enter the long description",
              },
              causeShortDescription: {
                  required: "Please enter the short description",
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
              expectedAmount: {
                  required: "Please enter expected amount of cause",
                  number: "Please enter numbers only"
              },
              phone: {
                  required: "Please enter your mobile number",
                  number: "Please enter numbers only"
              },
              email: "Please enter a valid email address"
          },
      });

      $('#submitbtn').click(function () {
          var isFormValid = $('#addCause').valid();
          if(isFormValid == true){
            jQuery.noConflict(); 
            $('#confirmationModal').modal('show'); 
          }
          else{
          }
      });
  });

  $('input[type=file]').change(function() {
        var filename = $('input[type=file]').val().split('\\').pop();
        $('#fileName').val(filename);
  });

  $('#confirmForm').click(function () {
          $('#addCause').submit();
  });

  $('.browsebtn').click(function () {
          $('.noImagediv').hide();
  });

  $('#imgDeleteBtn').click(function () {
      $.ajax({
            url:'{{ route("deleteCauseImage") }}',
            type:'GET',
            data:{
              causeID   : $(this).attr("data-value"),
            },
            success:function(data) {
              location.reload();
            }
      });
    });

    var isAdminLoggedIn = "{{Auth::user()->TypeOfAccount}}";
      if(isAdminLoggedIn == "Admin"){
        $('#country').change(function(){
          if($(this).val() != ""){
            $('#state')
                .empty()
                .append('<option hidden value="">State</option>')
                ;
            $('#district')
            .empty()
            .append('<option hidden value="">District</option>')
            ;
            locationsSpecificData("Country",$(this).val(),"UserMenu");
            $("#state").removeAttr('disabled');
          }
        });
      }

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
              },
              success:function(data) {
                $.each(data, function (i) {
                    $.each(data[i], function (key, val) {
                      if(selected == "State"){
                          optionValue =  data[i]['ID'];
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
                        else if (selected == "Country"){
                          optionValue =  data[i]['ID'];
                          if(onLoad == ""){
                            $('#state').append($("<option></option>").attr("value", optionValue).text(data[i]['State'])); 
                          }
                          else if( data[i]['State'] == $("#savedDistrict").val() ){
                            $('#state').append($("<option></option>").attr("value", optionValue).attr('selected','selected').text(data[i]['State'])); 
                          }
                          else{
                            $('#state').append($("<option></option>").attr("value", optionValue).text(data[i]['State'])); 
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
