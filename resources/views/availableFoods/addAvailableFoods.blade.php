@extends('templates.main')
<title>Add Available Food</title>
<link
    href="{{ url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i') }}"
    rel="stylesheet">
<link href="{{ url('css/form.css') }}" rel="stylesheet" media="all">
<link href="{{ url('font-awesome/css/all.css') }}" rel="stylesheet" media="all">
<link href="{{ url('vendor/flatpickr/dist/flatpickr.css') }}" rel="stylesheet" media="all">

<style>
    .wrapper section>h2::before {
        width: 190px !important;
        left: 42% !important;
    }

    .wrapper section>h2::before {
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

    #state-error,
    #district-error,
    #city-error{
        margin-top: -22px;
        margin-bottom: 22px;
    }

</style>
@section('content')
<section>
    <h2 style="margin-top: 0px;"> <span class="custom-underline">Contribute here !</span></h2>
    <p>Willing to contribute? Please make sure the food you provide is edible and passes the basic quality test,
        <br> that is, you will be having no problem giving this food to your own children and family.</p>
</section>
<div class="col-lg-12" style="text-align: right;margin-top: -158px;padding-right: 62px;">
  <button class="back-button"><a style="text-decoration: none;color: inherit !important;" href="{{ URL::previous() }}">Back</a></button>
</div>
<div class="page-wrapper p-b-100 font-poppins" style="padding-top: 50px">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <form action="{{ route('addAvailableFoodsSave') }}" method="POST"
                    enctype="multipart/form-data" name="addAvailableFood" id="addAvailableFood">
                    @csrf
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label ffe-font">First Name</label>
                                <input class="input--style-4" type="text" name="firstName" value="{{Auth::user()->FirstName}}" readonly>
                              </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label ffe-font">Last name</label>
                                <input class="input--style-4" type="text" name="lastName" value="{{Auth::user()->LastName}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                      <div class="col-2">
                          <div class="input-group">
                              <label class="label ffe-font">Food Count </label>
                              <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                                title="How many people can be fed with your contribution?"></i>
                              <input class="input--style-4" type="text" name="foodCount" id="foodCount" value="">
                          </div>
                      </div>
                      <div class="col-2">
                          <div class="input-group">
                              <label class="label ffe-font">Expiry Time</label>
                              <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                                title="Within what time should this food be consumed?"></i>
                              <select class="form-control input--style-4" style="" id="expiryTime" name="expiryTime">
                                <option hidden selected="" value="">Expiry Time</option>
                                <option value="1">Within 1 hour</option>
                                <option value="2">Within 2 hours</option>
                                <option value="3">Within 3 hours</option>
                                <option value="4">Within 4 hours</option>
                              </select>
                          </div>
                      </div>
                    </div>
                    <div class="row row-space">

                        <div class="col-lg-6">
                            <div class="input-group">
                                <label class="label ffe-font pleft-0">Restaurent/Event</label>
                                <div class="p-t-10">
                                    <label class="radio-container m-r-45 ffe-font">Event
                                        <input type="radio" checked="checked" name="typeofdonation" value="Event">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container ffe-font">Restaurant
                                        <input type="radio" name="typeofdonation" value="Restaurant">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="input-group">
                              <label class="label ffe-font pleft-0">Veg/Non-Veg</label>
                              <div class="p-t-10">
                                  <label class="radio-container m-r-45 ffe-font">Veg
                                      <input type="radio" checked="checked" name="vegFlag" value="Veg">
                                      <span class="checkmark"></span>
                                  </label>
                                  <label class="radio-container ffe-font">Non-Veg
                                      <input type="radio" name="vegFlag" value="Non-Veg">
                                      <span class="checkmark"></span>
                                  </label>
                              </div>
                          </div>
                        </div>
                    </div>
                    <div class="input-group col-lg-12 hide type-rest">
                        <label class="label ffe-font">Restaurant Name</label>
                        <input class="input--style-4" type="text" name="restaurantName" value="">
                    </div>
                    <div class="input-group col-lg-12">
                        <label class="label ffe-font">Email</label>
                        <input class="input--style-4" type="text" name="email" value="{{Auth::user()->Email}}" readonly>
                    </div>
                    <div class="input-group col-lg-12">
                        <label class="label ffe-font">Phone</label>
                        <input class="input--style-4" type="text" name="phone" value="{{Auth::user()->Phone}}" readonly>
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
                              <label class="label ffe-font">State</label>
                              <select class="form-control input--style-4" style="" id="state" name="state">
                                  <option hidden selected="" value="">State</option>
                              </select>
                          </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group col-lg-12 selectbox-div">
                                <label class="label ffe-font">District</label>
                                <select class="form-control input--style-4" style="" id="district" name="district" disabled>
                                    <option hidden selected="" value="">District</option>
                                    <option value="Calicut">Calicut</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="input-group col-lg-12 selectbox-div">
                              <label class="label ffe-font">City</label>
                              <input class="input--style-4" type="text" name="city" id="city" value="">
                          </div>
                      </div>
                    </div>
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
                <h5 class="modal-title" id="confirmationModalLabel">Confirm your contribution
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
            <div class="modal-body col-lg-12 ffe-font" style="padding: 20px;">
                <p>By clicking the confirm button you hereby acknowledge that the food provided by you is safe and
                    edible and if any problem is to occur after it's consumption, you take full responsibilty of it.</p>
            </div>
            <div class="modal-footer">
                <button id="confirmForm" type="button" class="btn btn-primary button-bg-green"
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
@stop
@section('custom-script')
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

    $(document).ready(function () {

        // Add Available Food form validation
        $("form[name='addAvailableFood']").validate({
            errorPlacement: function (error, element) {
                if (element.parent().hasClass('selectbox-div')) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },
            rules: {
                firstName: "required",
                lastName: "required",
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
                city: {
                    required: true
                },
                foodCount: {
                    required: true,
                    number: true
                },
                expiryTime: {
                    required: true
                },
            },
            messages: {
                firstName: "Please enter your first name",
                lastName: "Please enter your last name",
                district: {
                    required: "Please select a district",
                },
                state: {
                    required: "Please select a state",
                },
                city: {
                    required: "Please enter a city",
                },
                foodCount: {
                    required: "Please enter the food count",
                },
                expiryTime: {
                    required: "Please enter the expiry time",
                },
                phone: {
                    required: "Please enter your mobile number",
                    number: "Please enter numbers only"
                },
                email: "Please enter a valid email address"
            },
        });

        $('#submitbtn').click(function () {
            var isFormValid = $('#addAvailableFood').valid();
            if(isFormValid == true){
              jQuery.noConflict(); 
              $('#confirmationModal').modal('show'); 
            }
        });

        $('#confirmForm').click(function () {
          $('#addAvailableFood').submit();
        });

    });

      locationsSpecificData("Country",$('#country').val(),"UserMenu");
      $('#state').change(function(){
        if($(this).val() != ""){
          $('#district')
              .empty()
              .append('<option hidden value="">District</option>')
              ;
          locationsSpecificData("State",$(this).val(),"UserMenu");
          $("#district").removeAttr('disabled');
        }
      });
      

</script>
@endsection
