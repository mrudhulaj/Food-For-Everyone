@extends('templates.main')
<style>
	.aboutUs{
		background-image: url("../images/about-us-1.png");
		margin-top: 0px;
	}

	.wrapper section>h2::before{
		width: 190px !important;
		left: 42% !important;
	}

	.bg-text{
	padding-top: 40px;
	padding-bottom: 40px;
	margin-top: -342px;
	position: absolute;
	padding-left: 15px;
    padding-right: 15px;
	background: rgba(0, 0, 0, 0.5);

	color: white;
    font-family: Okra,Helvetica,sans-serif;
    font-size: 20px;
    font-weight: 400;
    line-height: 26px;
	}
</style>
@section('content')
<div class="">
	<section>
		<h2 style="margin-top: 0px;">Our Story and Our Vision</h2>
	</section>
	<div>
		<img src="{{url('../images/about-us-1.png')}}" alt="" style="width: 100%;">
	</div>
	<div class="bg-text">
		<p> 
			<b> Food For Everyone </b>
			provides the right channels for compassionate citizens to begin and manage initiatives, that solve for hunger locally.
		</p>
		<p style="margin-top: 35px">
			Our goal is to end all forms of human poverty by going to the hard places and walking with the world’s most vulnerable people. We’ve been serving through purposeful relief and development for over a decade. We believe in the fight against poverty, and strongly believe in a world where no one has to sleep hungry.
		</p>
		<p style="margin-top: 35px">
			We believe that every person has intrinsic value, and that it’s our responsibility to advocate for the poor and marginalized without regard to race, creed or nationality and without adverse distinction of any kind. We serve on the basis of need alone. We strive to respect the culture and customs of the people we serve in order to preserve their humanity and dignity.
		</p>
	</div>
</div>
@stop