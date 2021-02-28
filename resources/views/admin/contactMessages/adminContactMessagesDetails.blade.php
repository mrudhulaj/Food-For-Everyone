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
        width: 400px !important;
        left: 35% !important;
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
        <h2 style="margin-top: 0px;">CONTACT MESSAGE DETAILS</h2>
    </section>
    <div class="container mainbox plr-0" style="margin-bottom: 50px;width: 50%">
        <div class="col-lg-12 plr-0" style="">
            <div class="row mrl-0" style="margin-top: 50px">
                <div class="col-lg-12 cust-form-style">
                    <form action="javascript:void(0)" method="POST" enctype="multipart/form-data" name="contactUs" id="contactUs">
                        @csrf
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label ffe-font">First Name</label>
                                    <input class="input--style-4" type="text" id="firstName" name="firstName" value="">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label ffe-font">Last name</label>
                                    <input class="input--style-4" type="text" name="lastName" id="lastName" value="">
                                </div>
                            </div>
                        </div>

                        <div class="input-group col-lg-12">
                            <label class="label ffe-font">Email</label>
                            <input class="input--style-4" type="text" name="email" id="email" value="">
                        </div>

                        <div class="input-group col-lg-12">
                            <label class="label ffe-font">Phone</label>
                            <input class="input--style-4" type="text" name="phone" id="phone" value="">
                        </div>

                          <div class="input-group col-lg-12 ffe-font" style="margin-bottom: 0px;">
                            <label class="checkbox-container">Raise a ticket
                              <input type="checkbox" class="createCheckbox" id="raiseTicket" name="raiseTicket" value="0">
                              <span class="checkmark-cust" style="top: 4px !important;"></span>
                            </label>
                          </div>

                          <div class="row row-space" id="raiseTicketDiv" style="margin-left: -12px;">
                            <div class="col-2">
                                <div class="input-group custvalid">
                                  <label class="label ffe-font">Category</label>
                                  <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                                    title="Within what time should this food be consumed?"></i>
                                  <select class="form-control input--style-4" style="width: 105%" id="ticketCategory" name="ticketCategory">
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
                                    <select class="form-control input--style-4" style="width: 144%" id="ticketItem" name="ticketItem">
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

                        <div class="input-group col-lg-12">
                          <label class="label ffe-font">Subject</label>
                          <input class="input--style-4" type="text" name="subject" id="subject" value="">
                        </div>

                        <div class="input-group col-lg-12">
                            <label class="label ffe-font">Message</label>
                            <textarea style="border: none;line-height: 25px;padding: 12px 22px;" name="message"
                                id="message" class="input--style-4" cols="57" rows="6"></textarea>
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
@stop
