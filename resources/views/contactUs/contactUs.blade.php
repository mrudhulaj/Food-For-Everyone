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
                                    <input class="input--style-4" type="text" name="firstName" value="">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label ffe-font">Last name</label>
                                    <input class="input--style-4" type="text" name="lastName" value="">
                                </div>
                            </div>
                        </div>

                        <div class="input-group col-lg-12">
                            <label class="label ffe-font">Email</label>
                            <input class="input--style-4" type="text" name="email">
                        </div>

                        <div class="input-group col-lg-12">
                            <label class="label ffe-font">Phone</label>
                            <input class="input--style-4" type="text" name="phone">
                        </div>

                        <div class="input-group col-lg-12">
                            <label class="label ffe-font">Message</label>
                            <textarea style="border: none;line-height: 25px;padding: 12px 22px;" name="message"
                                id="message" class="input--style-4" id="" cols="52" rows="10"></textarea>
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

    });


</script>
@stop
