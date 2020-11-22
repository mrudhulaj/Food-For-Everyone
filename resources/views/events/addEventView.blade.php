@extends('templates.main')
<title>Add Event</title>
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
    <h2 style="margin-top: 0px;">Add an Event</h2>
    <p>Please make sure the details you provide including the time and location are as accurate as possible.</p>
</section>

<div class="page-wrapper p-b-100 font-poppins" style="padding-top: 50px">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data" name="addVolunteer" id="addVolunteer">
                    {{ csrf_field() }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="input-group col-lg-12">
                        <label class="label ffe-font">Event Name</label>
                        <input class="input--style-4" type="text" name="eventName">
                    </div>

                    <div class="input-group col-lg-12">
                        <label class="label ffe-font">Event Description</label>
                        <textarea style="border: none;" name="eventDescription" id="eventDescription"
                            class="input--style-4" id="" cols="35" rows="5"></textarea>
                    </div>

                    <label class="label ffe-font">Time</label>
                    <div class="row row-space" style="padding-right: 0px">
                        <div class="col-lg-4">
                            <div class="input-group col-lg-12 selectbox-div">
                                <input class="input--style-4" type="text" name="Hour" placeholder="Hour" id="hour">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group col-lg-12 selectbox-div">
                                <input class="input--style-4" type="text" name="minute" placeholder="Minute">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group col-lg-12 selectbox-div">
                                <select class="form-control input--style-4" style="" id="ampm" name="ampm">
                                    <option hidden selected="" value="">AM/PM</option>
                                    <option value="am">AM</option>
                                    <option value="pm">pm</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="input-group col-lg-12">
                        <label class="label ffe-font">Email (For more information)</label>
                        <input class="input--style-4" type="text" name="email">
                    </div>
                    <div class="input-group col-lg-12">
                        <label class="label ffe-font">Phone (For more information)</label>
                        <input class="input--style-4" type="text" name="phone">
                    </div>

                    <div class="row row-space" style="padding-right: 0px">
                        <div class="col-lg-4">
                            <div class="input-group col-lg-12 selectbox-div">
                                <label class="label ffe-font">District
                                </label>
                                <select class="form-control input--style-4" style="" id="district" name="district">
                                    <option hidden selected="" value="">District</option>
                                    <option value="Kerala">Kerala</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group col-lg-12 selectbox-div">
                                <label class="label ffe-font">State
                                </label>
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

                    <div class="input-group col-lg-12" style="margin-bottom: 0px;">
                        <label class="label ffe-font">Image</label>

                        <div class="col-md-12 input-group">
                            <input class=" form-control input--style-4" id="fileName" type="text"
                                style="height: 50px;" />
                            <div class="input-group-btn">
                                <label for="files" class="btn btn-default input--style-4"
                                    style="height: 50px;border-radius: 0px 5px 5px 0px;">Browse</label>
                                <input id="files" accept="image/*" type="file" class="btn btn-default"
                                    style="visibility:hidden;" />
                            </div>
                        </div>

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
      var $j = jQuery.noConflict();
      $j('#hour').datepicker({
          dateFormat: '',
          timeFormat: 'hh:mm tt'
      });

        // Add Available Food form validation
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
                eventName: "required",
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
                eventName: "Please enter your event name",
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

</script>
@stop
