@extends('templates.main')
<link rel="stylesheet" href="{{url('css/contact-us-css/util.css')}}">
<link rel="stylesheet" href="{{url('css/contact-us-css/main.css')}}">
<style>
	.wrapper section>h2::before{
		width: 190px !important;
		left: 42% !important;
	}

	.mainbox{
		margin-bottom: 20px;
		border-radius: 7px;
    box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.5);
	 }

	 .cust-form-style{
		padding-left: 50px !important;
		padding-right: 50px !important;
	 }

	 .cust-ffe-font{
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

</style>
@section('content')
<div class="">
	<section>
		<h2 style="margin-top: 0px;">We'd love to hear from you !</h2>
	</section>
	<div class="container mainbox plr-0" style="margin-bottom: 50px;">
		<div class="col-lg-6 plr-0" style="">
			<div>
				<img src="{{url('../images/children-eating-1.jpg')}}" alt="" style="width: 100%;border-top-left-radius: 4px;border-bottom-left-radius: 5px;">
			</div>
		</div>
		<div class="col-lg-6 plr-0" style="">
			<div class="row">
				<div class="col-lg-12 cust-ffe-font">
					<h2 style="text-align: center;padding-top: 25px;padding-bottom: 25px;font-weight: 400;">Send Us A Message</h2>
				</div>
			</div>
			<div class="row mrl-0">
				<div class="col-lg-12 cust-form-style">
					<label class="label-input100 cust-ffe-font" for="first-name">Tell us your name *</label>
					<div class="wrap-input100 validate-input" data-validate="Type first name">
						<input id="first-name" class="input100" type="text" name="first-name" placeholder="First name">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Type last name">
						<input class="input100" type="text" name="last-name" placeholder="Last name">
						<span class="focus-input100"></span>
					</div>

					<label class="label-input100 cust-ffe-font" for="email">Enter your email *</label>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input id="email" class="input100" type="text" name="email" placeholder="Eg. example@email.com">
						<span class="focus-input100"></span>
					</div>

					<label class="label-input100 cust-ffe-font" for="phone">Enter phone number</label>
					<div class="wrap-input100">
						<input id="phone" class="input100" type="text" name="phone" placeholder="Eg. +91 9998887777">
						<span class="focus-input100"></span>
					</div>

					<label class="label-input100 cust-ffe-font" for="message">Message *</label>
					<div class="wrap-input100 validate-input" data-validate = "Message is required">
						<textarea style="min-height: 200px;" id="message" class="input100" name="message" placeholder="Write us a message"></textarea>
						<span class="focus-input100"></span>
					</div>

					<div class="container-contact100-form-btn" style="padding-top: 35px;">
						<button class="contact100-form-btn cust-ffe-font" style="color: white;">
							Send Message
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop