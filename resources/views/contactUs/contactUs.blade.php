@extends('templates.main')
<title>Contact</title>
<link rel="stylesheet" href="{{ url('css/contact-us-css/util.css') }}">
<link rel="stylesheet" href="{{ url('css/contact-us-css/main.css') }}">

<link
    href="{{ url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i') }}"
    rel="stylesheet">
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

    /*  */
    .input--style-4 {
        /* border-radius: 0px !important; */
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
                    <form action="" method="POST" enctype="multipart/form-data" name="contactUs" id="contactUs">
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
                            <input class="input--style-4" type="text" name="email" id="email">
                        </div>

                        <div class="input-group col-lg-12">
                            <label class="label ffe-font">Phone</label>
                            <input class="input--style-4" type="text" name="phone" id="phone">
                        </div>

                        <div class="input-group col-lg-12">
                            <label class="label ffe-font">Message</label>
                            <textarea style="border: none;line-height: 25px;padding: 12px 22px;" name="message"
                                id="message" class="input--style-4" cols="52" rows="10"></textarea>
                        </div>

                        <div class="" style="text-align: center;margin-top: 80px;">
                            <button type="submit" id="submitbtn" class="btn button-bg-green"
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
                <p>Thank you for reaching out to us.Your message was successfully sent, if there was any query we will get back to you shortly in your provided email.</p>
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

<script>
    $(document).ready(function () {

        // Add Contact form validation
        $("form[name='contactUs']").validate({
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
                    number: true
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
                email: "Please enter a valid email address"
            },
        });

        var savedFlag = "{{$savedFlag}}";
        console.log("Saved Flag = "+savedFlag);

    });

    // $('#submitbtn').click(function () {
    //         var isFormValid = $('#addVolunteer').valid();
    //         if (isFormValid == true) {

    //           var firstName   = $("#firstName").val();
    //           var lastName    = $("#lastName").val();
    //           var email       = $("#email").val();
    //           var phone       = $("#phone").val();
    //           var message     = $("#message").val();

    //             $.ajax({
    //                 url:'/getmsg',
    //                 type:'POST',
    //                 data:{
    //                     name:name, 
    //                     address:address
    //                 },
    //                 success:function(data) {
    //                   $("#msg").html(data.msg);
    //                 }
    //             });
    //         }
    // });
</script>
@stop
