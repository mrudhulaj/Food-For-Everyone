@extends('templates.main')
<title>Contact</title>
<link rel="stylesheet" href="{{ url('css/contact-us-css/util.css') }}">
<link rel="stylesheet" href="{{ url('css/contact-us-css/main.css') }}">

<link href="{{ url('css/form.css') }}" rel="stylesheet" media="all">
<style>
    ::placeholder {
        color: #3c354e;
        font-family: "Roboto", sans-serif;
        font-size: 15px;
        font-weight: 400;
        line-height: 26px;
    }

    .wrapper section>h2::before {
        width: 190px !important;
        left: 42% !important;
    }

    .mainbox {
        margin-bottom: 20px;
        border-radius: 7px;
        box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.5);
    }

    .cust-form-style {
        padding-left: 50px !important;
        padding-right: 50px !important;
    }

    .cust-ffe-font {
        color: #3c354e;
        font-family: "Roboto", sans-serif;
        font-size: 15px;
        font-weight: 400;
        line-height: 26px;
    }

    .contact100-form-btn:hover {
        background: #00A348;
        font-weight: bold;
    }

    #ticketCategory-error,#ticketItem-error{
      margin-top: -20px;
    }

</style>
@section('content')
<div class="">
    <section>
        <h2 style="margin-top: 0px;">We'd love to hear from you !</h2>
    </section>
    <div class="container mainbox plr-0" style="margin-bottom: 50px;">
        <div class="col-lg-6 plr-0" style="">
            <div>
                <img src="{{ url('../images/children-eating-1.jpg') }}" alt=""
                    style="width: 100%;border-top-left-radius: 4px;border-bottom-left-radius: 5px;height: 962px;">
            </div>
        </div>
        <div class="col-lg-6 plr-0" style="">
            <div class="row">
                <div class="col-lg-12 cust-ffe-font">
                    <h2 style="text-align: center;padding-top: 25px;padding-bottom: 25px;font-weight: 400;">Send Us A
                        Message</h2>
                </div>
            </div>
            <div class="row mrl-0">
                <div class="col-lg-12 cust-form-style">
                    <form action="javascript:void(0)" method="POST" enctype="multipart/form-data" name="contactUs" id="contactUs">
                        @csrf
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label ffe-font">First Name</label>
                                    <input class="input--style-4" type="text" id="firstName" name="firstName" 
                                    @if(Auth::check()) value="{{Auth::user()->FirstName}}" @else value="" @endif>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label ffe-font">Last name</label>
                                    <input class="input--style-4" type="text" name="lastName" id="lastName" 
                                    @if(Auth::check()) value="{{Auth::user()->LastName}}" @else value="" @endif>
                                </div>
                            </div>
                        </div>

                        <div class="input-group col-lg-12">
                            <label class="label ffe-font">Email</label>
                            <input class="input--style-4" type="text" name="email" id="email"
                            @if(Auth::check()) value="{{Auth::user()->Email}}" @else value="" @endif>
                        </div>

                        <div class="input-group col-lg-12">
                            <label class="label ffe-font">Phone</label>
                            <input class="input--style-4" type="text" name="phone" id="phone"
                            @if(Auth::check()) value="{{Auth::user()->Phone}}" @else value="" @endif>
                        </div>

                        @if(Auth::check())
                          <div class="input-group col-lg-12 ffe-font" style="margin-bottom: 0px;">
                            <label class="checkbox-container">Raise a ticket
                              <input type="checkbox" class="createCheckbox" id="raiseTicket" name="raiseTicket" value="0">
                              <span class="checkmark-cust" style="top: 4px !important;"></span>
                            </label>
                          </div>

                          <div class="row row-space hide" id="raiseTicketDiv" style="margin-left: -12px;">
                            <div class="col-2">
                                <div class="input-group custvalid">
                                  <label class="label ffe-font">Category</label>
                                  <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                                    title="Within what time should this food be consumed?"></i>
                                  <select class="form-control input--style-4" style="" id="ticketCategory" name="ticketCategory">
                                    <option hidden selected="" value="">Select Category</option>
                                    <option value="Available Foods">Available Foods</option>
                                    <option value="Causes">Causes</option>
                                    <option value="Volunteers">Volunteers</option>
                                    <option value="Events">Events</option>
                                  </select>                                
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group" id="ticketItemDiv">
                                  <div class="input-group custvalid">
                                    <label class="label ffe-font">Item</label>
                                    <select class="form-control input--style-4" style="" id="ticketItem" name="ticketItem">
                                      <option hidden selected="" value="">Select Item</option>
                                    </select>                                
                                  </div>                                
                                </div>
                            </div>

                            <div class="col-12" style="margin-left: 14px;">
                              <div class="input-group">
                                <label class="label ffe-font">Severity</label>
                                <div class="" style="margin-left: 8px;">
                                    <label class="radio-container mr-30 ffe-font" style="padding-right: 80px;">Low
                                        <input type="radio" name="severity" value="0" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container ffe-font" style="padding-right: 80px;">Medium
                                        <input type="radio" name="severity" value="1">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container ffe-font">High
                                      <input type="radio" name="severity" value="2">
                                      <span class="checkmark"></span>
                                    </label>
                                </div>
                              </div>
                            </div>

                          </div>
                        @endif

                        <div class="input-group col-lg-12">
                            <label class="label ffe-font">Message</label>
                            <textarea style="border: none;line-height: 25px;padding: 12px 22px;" name="message"
                                id="message" class="input--style-4" cols="52" rows="6"></textarea>
                        </div>

                        <div class="" style="text-align: center;@if(Auth::check()) margin-top: 23px; @else margin-top: 80px; @endif">
                            <button id="confirmForm" class="btn button-bg-green"
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
{{--  Begin: Message sent successfully Modal  --}}
<div class="modal fade" id="successfullModal" tabindex="-1" role="dialog" aria-labelledby="successfullModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 13px;border: none">
            <div class="modal-header ffe-font">
                <h5 class="modal-title" id="successfullModalLabel">Success!
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
            <div class="modal-body col-lg-12 ffe-font" style="padding: 20px;">
                <p class="ffe-font">Thank you for reaching out to us.Your message was successfully sent, if there was any query we will get back to you shortly in your provided email.</p>
            </div>
            <div class="modal-footer">
                <button id="" data-dismiss="modal" type="button" class="btn btn-secondary mdl-btn-cancel">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
{{-- End : Message sent successfully Modal --}}
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('vendor/flatpickr/dist/flatpickr.min.js') }}"></script>
<script src="{{ asset('vendor/moment/moment.js') }}"></script>

<script>
    $(document).ready(function () {

        // Add Contact form validation
        $("form[name='contactUs']").validate({
            errorPlacement: function (error, element) {
                if (element.parent().hasClass('custvalid')) {
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
                message: {
                    required: true,
                },
              },
            messages: {
                firstName: "Please enter your first name",
                lastName: "Please enter your last name",
                phone: {
                    required: "Please enter your mobile number",
                    number: "Please enter numbers only"
                },
                message: {
                    required: "Please enter your message",
                },
                ticketCategory: {
                    required: "Please select a category",
                },
                ticketItem: {
                    required: "Please select an item",
                },
                email: "Please enter a valid email address"
            },
        });

    });

    $("#contactUs").on("submit", function(){            

        $.ajax({
            url:'{{ route("saveContactUs") }}',
            type:'POST',
            data:{
                "_token"         : "{{ csrf_token() }}",
                firstName        : $("#firstName").val(),
                lastName         : $("#lastName").val(),
                email            : $("#email").val(),
                phone            : $("#phone").val(),
                message          : $("#message").val(),
                raiseTicket      : $("#raiseTicket").val(),
                ticketCategory   : $("#ticketCategory").val(),
                ticketCategoryID : $("#ticketItem").val(),
                ticketSeverity   : $('input[name="severity"]:checked').val(),
            },
            success:function(data) {
              jQuery.noConflict();
              $('#successfullModal').modal('show');
            }
        });
    });

    $("#raiseTicket").change(function() {
        if(this.checked) {
          $("#raiseTicketDiv").toggleClass("hide");
          $("#raiseTicket").val("1");

          // validation
            $('#ticketCategory').rules('add', {
              required: true
            });

            if( $("#ticketCategory").val() != "" || $("#ticketCategory").val() != "Volunteers" ){
              $('#ticketItem').rules('add', {
                required: true
              });
            }

        }
        else{
          $("#raiseTicketDiv").toggleClass("hide");
          $("#raiseTicket").val("0");

          // validation
          $('#ticketCategory').rules('remove');
          $('#ticketItem').rules('remove');
          
        }
    });

    $('#ticketCategory').on('change', function() {
      $('#ticketItem').empty().append('<option selected="selected" value="" hidden>Select Item</option>');
      let category = this.value;

      if(category == "Volunteers"){
        $("#ticketItemDiv").addClass("hide");
        $('#ticketItem').rules('remove');
        $("form[name='contactUs']").validate();
      }
      else{
        $("#ticketItemDiv").removeClass("hide");
        $('#ticketItem').rules('add', {
                required: true
        });
        $("form[name='contactUs']").validate();
      }

      $.ajax({
            url:'{{ route("contactUsTicketData") }}',
            type:'GET',
            data:{
                ticketCategory   : category,
            },
            success:function(data) {
              $.each(data, function (i) {
                  $.each(data[i], function (key, val) {
                    if(category == "Available Foods"){
                      var itemName = "Added at :"+moment(data[i]['EditedDate']).format("D/M/YYYY, h:mm:ss a");
                    }
                    else if(category == "Causes"){
                      var itemName = data[i]['CauseName'];
                    }
                    else if(category == "Events"){
                      var itemName = data[i]['EventName'];
                    }
                    $('#ticketItem').append($("<option></option>").attr("value", data[i]['ID']).text(itemName)); 
                    return false;
                  });
              });
            }
        });
    });
</script>
@stop
