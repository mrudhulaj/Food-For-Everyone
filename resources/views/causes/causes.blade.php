@extends('templates.main')
<title>Causes</title>
<style>
	.wrapper section>h2::before{
		width: 190px !important;
		left: 42% !important;
	}

  .box{
    width: 420px;
    height: 725px;
  }

  .mainbox{
		margin-bottom: 20px;
		border-radius: 13px;
    box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.5);
    display: inline-block;
    margin-right: 50px;
   }
   
  .box .box-content h2 {
    color: #3c354e;
    font-family: "Roboto", sans-serif;
    font-size: 20px;
    font-weight: 700;
    margin: 100px 0 15px;
  }

  hr {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 0;
    border-top: 2px solid #01d262 !important;
    width: 50% !important;
  }

  .box-p, .progress-text{
    color: #595959;
    font-family: "Roboto", sans-serif;
    font-size: 15px;
    font-weight: 400;
    margin: 0;
  }

  .progress-text {
    margin: 0 auto;
    position: relative;
    text-align: center;
  }

  .progress {
    background-color: #e5e5e5 !important;
    height: 10px !important;
    margin-top: 20px !important;
    max-width: 100% !important;
  }

  .progress-amount{
    color: #01d262;
  }

  .progress-left{
    left: 0;
    margin-top: 15px;
    position: absolute;
  }

  .progress-right{
    right: 0;
    margin-top: 15px;
    position: absolute;
  }

  .box-content h2 a {
    background: #fff none repeat scroll 0 0;
    border-radius: 30px;
    color: #05ce68;
    font-family: "Roboto", sans-serif;
    font-size: 16px;
    font-weight: 500;
    padding: 15px 40px;
    text-decoration: none;
    border: 1px solid #05ce68;
  }
  .box-content h2 a:hover {
    background: #01d262 none repeat scroll 0 0;
    color: white;
	}

</style>
@section('content')
<div class="">
	<section>
    <h2 style="margin-top: 0px;">We are expanding our reach!</h2>
    <p>We are continously trying to expand our reach to different areas where people need support to help build a better future.
			<br>These are the current causes which we support currently.</p>

  <div class="container" style="margin-top: 70px;margin-bottom: 70px">
    {{--  Begin: To be repeated content  --}}
    <div class="box mainbox">
        <img src="{{url('images/our_cuauses_one.jpg')}}" style="border-top-left-radius: inherit;border-top-right-radius: inherit;">
        <div class="box-content" style="padding: 0 30px;">
            <h2 style="text-align: center">FUTURE FOR CHILDREN</h2>
            <hr>
            <p class="box-p" style="height: 120px;">Join us in helping build our bright youngsters a school to showcase their skills and to make them a change and making the world a better place.</p>
            <div class="progress-text">
                <p class="progress-top">50%</p>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%;background-color: #01d262;"></div>
                </div>
                <p class="progress-left">Raised: <span class="progress-amount">1200 ₹</span></p>
                <p class="progress-right">Goal: <span class="progress-amount">2400 ₹</span></p>
            </div>
            <h2 class="borderes" style="text-align: center;margin-top: 100px;"><a href="#">DONATE NOW</a></h2>
        </div>
    </div>
    {{--  End: To be repeated content  --}}
    {{-- Begin:  Sample repeated Items  --}}
    <div class="box mainbox">
      <img src="{{url('images/our_cuauses_one.jpg')}}" style="border-top-left-radius: inherit;border-top-right-radius: inherit;">
      <div class="box-content" style="padding: 0 30px;">
          <h2 style="text-align: center">FUTURE FOR CHILDREN</h2>
          <hr>
          <p class="box-p" style="height: 120px;">Join us in helping build our bright youngsters a school to showcase their skills and to make them a change and making the world a better place.</p>
          <div class="progress-text">
              <p class="progress-top">50%</p>
              <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%;background-color: #01d262;"></div>
              </div>
              <p class="progress-left">Raised: <span class="progress-amount">1200 ₹</span></p>
              <p class="progress-right">Goal: <span class="progress-amount">2400 ₹</span></p>
          </div>
          <h2 class="borderes" style="text-align: center;margin-top: 100px;"><a href="#">DONATE NOW</a></h2>
      </div>
  </div>
  <div class="box mainbox">
    <img src="{{url('images/our_cuauses_one.jpg')}}" style="border-top-left-radius: inherit;border-top-right-radius: inherit;">
    <div class="box-content" style="padding: 0 30px;">
        <h2 style="text-align: center">FUTURE FOR CHILDREN</h2>
        <hr>
        <p class="box-p" style="height: 120px;">Join us in helping build our bright youngsters a school to showcase their skills and to make them a change and making the world a better place.</p>
        <div class="progress-text">
            <p class="progress-top">50%</p>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%;background-color: #01d262;"></div>
            </div>
            <p class="progress-left">Raised: <span class="progress-amount">1200 ₹</span></p>
            <p class="progress-right">Goal: <span class="progress-amount">2400 ₹</span></p>
        </div>
        <h2 class="borderes" style="text-align: center;margin-top: 100px;"><a href="#">DONATE NOW</a></h2>
    </div>
</div>
    {{--  End : Sample repeated Items  --}}
  </div>
@stop