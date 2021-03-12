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

    .btn-review:hover{
      background: darkorange !important;
    }

</style>
@section('content')
<div class="">
    <section>
        <h2 style="margin-top: 0px;"><span class="custom-underline">CONTACT MESSAGE DETAILS </span></h2>
    </section>
    <div class="col-lg-12" style="text-align: right;margin-top: -90px;padding-right: 62px;">
      <button class="back-button"><a style="text-decoration: none;color: inherit !important;" href="{{ URL::previous() }}">Back</a></button>
    </div>
    <div class="container mainbox plr-0" style="margin-bottom: 50px;width: 50%">
        <div class="col-lg-12 plr-0" style="">
            <div class="row mrl-0" style="margin-top: 50px">
                <div class="col-lg-12 cust-form-style">
                    <form action="{{route('adminContactMessagesDetailsSave')}}" method="POST" enctype="multipart/form-data" name="contactUs" id="contactUs">
                        @csrf
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label ffe-font">First Name</label>
                                    <input class="input--style-4" type="text" id="firstName" name="firstName" value="{{$contactUsdata->FirstName}}" disabled>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label ffe-font">Last name</label>
                                    <input class="input--style-4" type="text" name="lastName" id="lastName" value="{{$contactUsdata->LastName}}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="input-group col-lg-12">
                            <label class="label ffe-font">Email</label>
                            <input class="input--style-4" type="text" name="email" id="email" value="{{$contactUsdata->Email}}" disabled>
                        </div>

                        <div class="input-group col-lg-12">
                            <label class="label ffe-font">Phone</label>
                            <input class="input--style-4" type="text" name="phone" id="phone" value="{{$contactUsdata->Phone}}" disabled>
                        </div>

                        @if($ticketStatus == "Raised")
                          <div class="input-group col-lg-12 ffe-font" style="margin-bottom: 0px;">
                            <label class="checkbox-container">Raised ticket
                              <input type="checkbox" class="createCheckbox" id="" name="" value="1" checked disabled>
                              <input type="hidden" class="createCheckbox" id="raiseTicket" name="raiseTicket" value="1" checked>
                              <span class="checkmark-cust" style="top: 4px !important;"></span>
                            </label>
                          </div>

                          <div class="row row-space" id="raiseTicketDiv" style="margin-left: -12px;">
                            <div class="col-2">
                                <div class="input-group custvalid">
                                  <label class="label ffe-font">Category</label>
                                  <input class="input--style-4" type="text" name="lastName" id="lastName" value="{{$contactUsdata->Category}}" disabled>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group" id="ticketItemDiv">
                                  <div class="input-group custvalid">
                                      <label class="label ffe-font">Item</label>
                                      <input class="input--style-4" type="text" name="email" id="email" value="{{$categoryData}}" disabled>  
                                  </div>                                
                                </div>
                            </div>

                            <div class="col-12" style="margin-left: 14px;">
                              <div class="input-group">
                                <label class="label ffe-font">Severity</label>
                                <div class="" style="margin-left: 8px;">
                                    <label class="radio-container mr-30 ffe-font" style="padding-right: 80px;">Low
                                        <input type="radio" name="severity" value="0" @if($contactUsdata->Severity == 0) checked @endif disabled>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container ffe-font" style="padding-right: 80px;">Medium
                                        <input type="radio" name="severity" value="1" @if($contactUsdata->Severity == 1) checked @endif disabled>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container ffe-font">High
                                      <input type="radio" name="severity" value="2" @if($contactUsdata->Severity == 2) checked @endif disabled>
                                      <span class="checkmark"></span>
                                    </label>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endif


                        <div class="input-group col-lg-12">
                          <label class="label ffe-font">Subject</label>
                          <input class="input--style-4" type="text" name="subject" id="subject" value="{{$contactUsdata->Subject}}" disabled>
                        </div>

                        <div class="input-group col-lg-12">
                            <label class="label ffe-font">Message</label>
                            <textarea style="border: none;line-height: 25px;padding: 12px 22px;" name="message"
                                id="message" class="input--style-4" cols="74" rows="6" disabled>{{$contactUsdata->Message}}</textarea>
                        </div>

                        <div class="" style="text-align: center;@if(Auth::check()) margin-top: 23px; @else margin-top: 80px; @endif">
                            <button type="submit" name="status" class="btn button-bg-green btn-review"
                                style="padding: 0px;width: 120px;height: 60px;margin-right: 30px;background-color: orange;border: orange;" value="1">
                                Review
                            </button>
                            <button type="submit" name="status" class="btn button-bg-green"
                                style="padding: 0px;width: 120px;height: 60px;" value="2">
                                Resolved
                            </button>
                            <input type="hidden" name="contactUsID" value="{{$contactUsID}}">
                            <input type="hidden" name="raisedTicketsID" value="{{$raisedTicketsID}}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
