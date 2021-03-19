@extends('templates.main')
<link
    href="{{ url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i') }}"
    rel="stylesheet">
<link href="{{ url('css/form.css') }}" rel="stylesheet" media="all">
<link href="{{ url('font-awesome/css/all.css') }}" rel="stylesheet" media="all">
<title>Add Locations</title>
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

    .plus-icon {
        color: #49a448;
        font-size: 30px !important;
        margin-top: 8px;
        cursor: pointer;
    }

    #country-error {
        margin-top: -22px !important;
    }

    body.modal-open .supreme-container{
      -webkit-filter: blur(1px);
      -moz-filter: blur(1px);
      -o-filter: blur(1px);
      -ms-filter: blur(1px);
      filter: blur(1px);
    }

</style>
@section('content')

<section>
    <div style="margin: 0px 50px 0px 50px;">
        @include('templates.alertSuccessOrErrorMessage')
    </div>
    <h2 style="margin-top: 0px;">
        <span class="custom-underline"> Add Locations</span>
    </h2>
</section>

<div class="page-wrapper p-b-100 font-poppins supreme-container" style="padding-top: 50px">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <form action="{{ route('adminLocationsAddSave') }}" method="POST"
                    enctype="multipart/form-data" name="addLocation" id="addLocation">
                    {{ csrf_field() }}
                    <div class="row row-space" style="padding-right: 0px">
                        <div class="col-lg-11">
                            <div class="input-group col-lg-12 selectbox-div">
                                <label class="label ffe-font">District</label>
                                <select class="form-control input--style-4" style="" id="district" name="district" disabled>
                                    <option hidden value="">District</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="input-group col-lg-12 selectbox-div">
                                <label class="label ffe-font">&nbsp;</label>
                                <span>
                                    <i class="fa fa-plus plus-icon" aria-hidden="true" data-name="District"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row row-space" style="padding-right: 0px">
                        <div class="col-lg-11">
                            <div class="input-group col-lg-12 selectbox-div">
                                <label class="label ffe-font">State</label>
                                <select class="form-control input--style-4" style="" id="state" name="state" disabled>
                                    <option hidden value="">State</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="input-group col-lg-12 selectbox-div">
                                <label class="label ffe-font">&nbsp;</label>
                                <span>
                                    <i class="fa fa-plus plus-icon" aria-hidden="true" data-name="State"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row row-space" style="padding-right: 0px">
                        <div class="col-lg-11">
                            <div class="input-group col-lg-12 selectbox-div">
                                <label class="label ffe-font">Country</label>
                                <select class="form-control input--style-4" style="" id="country" name="country">
                                    <option hidden value="">Country</option>
                                    @foreach($locationCountry as $locationCountryData)
                                        <option value="{{ $locationCountryData->ID }}">
                                            {{ $locationCountryData->Country }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="input-group col-lg-12 selectbox-div">
                                <label class="label ffe-font">&nbsp;</label>
                                <span>
                                    <i class="fa fa-plus plus-icon" aria-hidden="true" data-name="Country"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="" style="text-align: center;margin-top: 30px;">
                        <button type="submit" id="mainSubmitBtn" class="btn button-bg-green"
                            style="padding: 0px;width: 120px;height: 60px;">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Begin : Add new country/state/district modal --}}
<div class="modal fade" id="newLocationModal" role="dialog" aria-labelledby="newLocationModalLabel" aria-hidden="true"
    tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 13px;border: none">
            <div class="modal-header ffe-font">
                <h5 class="modal-title" id="newLocationModalLabel">
                    <span id="modal-title">New Location</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
            <div class="modal-body col-lg-12 ffe-font" style="padding: 20px;">
                <div class="page-wrapper font-poppins" style="min-height: auto;">
                    <div class="wrapper wrapper--w680">
                        <div style="">
                            <div class="card-body">
                                <form action="javascript:void(0)" method="POST" enctype="multipart/form-data"
                                    name="newLocationForm" id="newLocationForm">
                                    {{ csrf_field() }}
                                    <div class="input-group col-lg-12">
                                        <label class="label ffe-font" id="locationLabel">Location</label>
                                        <input class="input--style-4" type="text" name="location" value=""
                                            id="locationValue">
                                    </div>
                                    <div class="" style="text-align: center;">
                                        <button id="subSubmitBtn" class="btn button-bg-green"
                                            style="padding: 0px;width: 120px;height: 60px;">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="padding: 0px;">
            </div>
        </div>
    </div>
</div>
{{-- End : Add new country/state/district modal --}}
@include('templates.defaultModal', ['title' => 'Error!','message' => 'Please select appropriate options first.'])
@stop
@section('custom-script')
<script>
    var selected;
    $(document).ready(function () {
        // Add Volunteer form validation
        $("form[name='newLocationForm']").validate({
            rules: {
                location: "required",
            },
            messages: {
                location: "Please enter a value",
            },
        });

        $("form[name='addLocation']").validate({
            errorPlacement: function (error, element) {
                if (element.parent().hasClass('selectbox-div')) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },
            rules: {
                district: "required",
                state: "required",
                country: "required",
            },
            messages: {
                district: "Please choose a district",
                state: "Please choose a state",
                country: "Please choose a country",
            },
        });
    });

    $(document).ready(function(){
      $(".plus-icon").click(function () {
          $("#newLocationForm").valid();
          $("#locationValue").val("");
          selected = $(this).attr('data-name');
          if (selected == "Country") {
            $('#newLocationModal').addClass("in");
            $('#newLocationModal').modal('show');
          }

          if (selected == "State") {
              if ($("#country").val() != "") {
                  $('#newLocationModal').addClass("in");
                  $('#newLocationModal').modal('show');
              } else {
                  $("#cust-modal-message").text("Please select a country first.");
                  $('#defaultModal').addClass("in");
                  $('#defaultModal').modal('show');
              }
          }

          if (selected == "District") {
              if ($("#country").val() != "" && $("#state").val() != "") {
                  $('#newLocationModal').addClass("in");
                  $('#newLocationModal').modal('show');
              } else {
                  $("#cust-modal-message").text("Please select country and state first.");
                  $('#defaultModal').addClass("in");
                  $('#defaultModal').modal('show');
              }
          }

          $("#modal-title").text("New " + selected);
          $("#locationLabel").text(selected);
          $('input[name="location"]').each(function () {
              $(this).rules('add', {
                  messages: {
                      required: "Please enter a " + selected.toLowerCase() + " name"
                  }
              });
          });
      });

      $('#country').change(function(){
        if($(this).val() != ""){
          $('#state')
              .empty()
              .append('<option hidden value="">State</option>')
              ;
          locationsSpecificData("Country",$(this).val());
          $("#state").removeAttr('disabled');
        }
      });

      $('#state').change(function(){
        if($(this).val() != ""){
          $('#district')
              .empty()
              .append('<option hidden value="">District</option>')
              ;
          locationsSpecificData("State",$(this).val());
          $("#district").removeAttr('disabled');
          $("#district").removeAttr('disabled');
        }
      });

    });

    // Ajax function to save a new country/state/district
    $("#newLocationForm").on("submit", function () {
        var isFormValid = $("form[name='newLocationForm']").valid();
        if (isFormValid) {
            $.ajax({
                url: '{{ route("adminLocationsSpecificSave") }}',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    selected: selected,
                    countryID: $("#country").val(),
                    stateID: $("#state").val(),
                    value: $("#locationValue").val()
                },
                success: function (data) {
                    $('#newLocationModal').removeClass("in");
                    $('#newLocationModal').removeClass("show");
                    $('#newLocationModal').modal('hide');
                    if (data['selected'] == "Country") {
                        $(new Option(data['value'], data['valueID'])).appendTo('#country');
                        $("#country").val(data['valueID']);
                        $("#state").val("");
                        $("#district").val("");
                        $("#state").removeAttr('disabled');
                    } else if (data['selected'] == "State") {
                        $(new Option(data['value'], data['valueID'])).appendTo('#state');
                        $("#state").val(data['valueID']);
                        $("#district").val("");
                        $("#district").removeAttr('disabled');
                    }
                    else if (data['selected'] == "District") {
                        $(new Option(data['value'], data['valueID'])).appendTo('#district');
                        $("#district").val(data['valueID']);
                    }
                }
            });
        }
    });

    // Ajax function to get state or district according to selected country or state.
    var selected,selectedID;
    function locationsSpecificData(selected,selectedID){
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

                      if(selected == "Country"){
                        $('#state').append($("<option></option>").attr("value", data[i]['ID']).text(data[i]['State'])); 
                      }
                      else if(selected == "State"){
                        $('#district').append($("<option></option>").attr("value", data[i]['ID']).text(data[i]['District'])); 
                      }
                      return false;
                    });
                });
              }
          });
    }

</script>
@endsection
