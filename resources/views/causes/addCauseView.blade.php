@extends('templates.main')
<title>Add Cause</title>
<link
    href="{{ url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i') }}"
    rel="stylesheet">
<link href="{{ url('css/form.css') }}" rel="stylesheet" media="all">

<style>
    .wrapper section>h2::before {
        width: 150px !important;
        left: 44% !important;
    }

    .card {
        box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.5);
    }

    select {
        background: #fafafa !important;
        border-radius: 5px !important;
        color: #666 !important;
        height: 50px !important;
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
</style>
@section('content')
<section>
  <h2 style="margin-top: 0px;">Add cause</h2>
  <p>Add causes and their details here.Please make sure the details you provide including the time and location are as accurate as possible.</p>
</section>

<div class="page-wrapper p-b-100 font-poppins" style="padding-top: 50px">
  <div class="wrapper wrapper--w680">
      <div class="card card-4">
          <div class="card-body">
              <form action="" method="POST"
                  enctype="multipart/form-data" name="addCause" id="addCause">
                  {{ csrf_field() }}
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  
                  <div class="input-group col-lg-12">
                    <label class="label ffe-font">Cause Title</label>
                    <input class="input--style-4" type="text" name="causeTitle">
                  </div>

                  <div class="input-group col-lg-12">
                      <label class="label ffe-font">Cause Description</label>
                      <textarea style="border: none;" name="causeDescription" id="causeDescription" class="input--style-4" id="" cols="35" rows="5"></textarea>
                  </div>

                  <label class="label ffe-font">Expected Amount</label>
                  <div class="input-group col-lg-12 amount-div">
                    <span class="input-group-addon left-input-addon" id="sizing-addon1">₹</span>
                    <input class="input--style-4" id="expectedAmount" type="text" name="expectedAmount"
                        aria-describedby="sizing-addon1" style="border-radius: 0px 5px 5px 0px;">
                  </div>

                  <div class="input-group col-lg-12">
                      <label class="label ffe-font">Email (For more infrmation)</label>
                      <input class="input--style-4" type="text" name="email">
                  </div>
                  <div class="input-group col-lg-12">
                      <label class="label ffe-font">Phone (For more information</label>
                      <input class="input--style-4" type="text" name="phone">
                  </div>
                  <div class="row row-space" style="padding-right: 0px">
                      <div class="col-lg-4">
                          <div class="input-group col-lg-12 selectbox-div">
                              <label class="label ffe-font">District</label>
                              <select class="form-control input--style-4" style="" id="district" name="district">
                                  <option hidden selected="" value="">District</option>
                                  <option value="Kerala">Kerala</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="input-group col-lg-12 selectbox-div">
                              <label class="label ffe-font">State</label>
                              <select class="form-control input--style-4" style="" id="state" name="state">
                                  <option hidden selected="" value="">District</option>
                                  <option value="Calicut">Calicut</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="input-group col-lg-12 selectbox-div">
                            <label class="label ffe-font">City</label>
                            <select class="form-control input--style-4" style="" id="city" name="city">
                                <option hidden selected="" value="">City</option>
                                <option value="City">Puthiyara</option>
                            </select>
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
              <h5 class="modal-title" id="confirmationModalLabel">Confirmation
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </h5>
          </div>
          <div class="modal-body col-lg-12 ffe-font" style="padding: 20px;">
              <p>By clicking the confirm button you hereby acknowledge that the details provided by you is genuine to the best of your knowledge.</p>
          </div>
          <div class="modal-footer">
              <button id="" type="submit" class="btn btn-primary button-bg-green"
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

      // Add Available Food form validation
      $("form[name='addCause']").validate({
          errorPlacement: function (error, element) {
              if ( element.parent().hasClass('selectbox-div') || element.parent().hasClass('amount-div') ) {
                  error.insertAfter(element.parent());
              } else {
                  error.insertAfter(element);
              }
          },
          rules: {
              causeTitle: "required",
              causeDescription: {
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
          },
          messages: {
              causeTitle: "Please enter the cause title",
              causeDescription: {
                  required: "Please enter the cause description",
              },
              district: {
                  required: "Please select a district",
              },
              state: {
                  required: "Please select a state",
              },
              city: {
                  required: "Please select a city",
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
            console.log("Form is valid");
            jQuery.noConflict(); 
            $('#confirmationModal').modal('show'); 
          }
          else{
            console.log("Form is invalid");
          }
      });
  });

</script>
@stop