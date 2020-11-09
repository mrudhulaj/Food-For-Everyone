@extends('templates.main')
<style>
	.wrapper section>h2::before{
		width: 190px !important;
		left: 42% !important;
	}

	.mainbox{
		margin-bottom: 20px;
	 }

</style>
@section('content')
<div class="">
	<section>
		<h2 style="margin-top: 0px;">We'd love to hear from you !</h2>
	</section>
	<div class="container mainbox plr-0" style="border: 1px solid red;margin-bottom: 20px;">
		<div class="col-lg-6 plr-0" style="border: 1px solid blue;">
			<div>
				<img src="{{url('../images/children-eating-1.jpg')}}" alt="" style="width: 100%;">
			</div>
		</div>
		<div class="col-lg-6 plr-0" style="border: 1px solid blue">
			<div class="col-lg-12">
				<h2 style="text-align: center">Send Us A Message</h2>
			</div>
			<div class="col-lg-8">
				<label class="label-input100" for="first-name">Tell us your name *</label>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
					<input id="first-name" class="input100" type="text" name="first-name" placeholder="First name">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
					<input class="input100" type="text" name="last-name" placeholder="Last name">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="email">Enter your email *</label>
				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input id="email" class="input100" type="text" name="email" placeholder="Eg. example@email.com">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="phone">Enter phone number</label>
				<div class="wrap-input100">
					<input id="phone" class="input100" type="text" name="phone" placeholder="Eg. +1 800 000000">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="message">Message *</label>
				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<textarea id="message" class="input100" name="message" placeholder="Write us a message"></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						Send Message
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
@stop