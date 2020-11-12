@extends('templates.main')
<title>Causes</title>
<style>
	.wrapper section>h2::before{
		width: 190px !important;
		left: 42% !important;
	}

  .box{
    width: 373.333px;
    margin-right: 50px;
  }

</style>
@section('content')
<div class="">
	<section>
    <h2 style="margin-top: 0px;">We are expanding our reach!</h2>
    <p>We are continously trying to expand our reach to different areas where people need support to help build a better future.
			<br>These are the current causes which we support currently.</p>
	</section>
    {{--  <section class="our_cuauses">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="our_cuauses_single owl-carousel owl-theme">
                      <div class="item">
                          <img src="{{url('images/our_cuauses_one.jpg')}}">
                          <div class="for_padding">
                              <h2>FUTURE FOR CHILDREN</h2>
                              <p style="height: 120px;">Join us in helping build our bright youngsters a school to showcase their skills and to make them a change and making the world a better place.</p>
                              <div class="progress-text">
                                  <p class="progress-top">50%</p>
                                  <div class="progress">
                                      <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%"></div>
                                  </div>
                                  <p class="progress-left">Raised: <span>1200 ₹</span></p>
                                  <p class="progress-right">Goal: <span>2400 ₹</span></p>
                              </div>
                              <h2 class="borderes"><a href="#">DONATE NOW</a></h2>
                          </div>
                      </div>
                      <div class="item">
                          <img src="{{url('images/our_cuauses_two.jpg')}}">
                          <div class="for_padding">
                              <h2>CARE HOME FOR ELDERS</h2>
                              <p style="height: 120px;">Let's not forget how we got here.Join us in building our elders a safe and protective home to assure them that kindness still exists.</p>
                              <div class="progress-text">
                                  <p class="progress-top">50%</p>
                                  <div class="progress">
                                      <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%"></div>
                                  </div>
                                  <p class="progress-left">Raised: <span>1200 ₹</span></p>
                                  <p class="progress-right">Goal: <span>2400 ₹</span></p>
                              </div>
                              <h2 class="borderes"><a href="#">DONATE NOW</a></h2>
                          </div>
                      </div>
                      <div class="item">
                          <img src="{{url('images/our_cuauses_three.jpg')}}">
                          <div class="for_padding">
                              <h2>CHARITABLE HOSPITAL FOR ALL</h2>
                              <p style="height: 120px;">The most helpless one's are the most disease prone one's.Malnutrition , unhygenic living conditions comes at a cost.But we help them recover for a better tommorow.Join us in helping this dream a possibility.</p>
                              <div class="progress-text">
                                  <p class="progress-top">50%</p>
                                  <div class="progress">
                                      <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%"></div>
                                  </div>
                                  <p class="progress-left">Raised: <span>1200 ₹</span></p>
                                  <p class="progress-right">Goal: <span>2400 ₹</span></p>
                              </div>
                              <h2 class="borderes"><a href="#">DONATE NOW</a></h2>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>  --}}
  <div class="container">
    <div class="box">
      <div class="item">
        <img src="{{url('images/our_cuauses_one.jpg')}}">
        <div class="for_padding">
            <h2>FUTURE FOR CHILDREN</h2>
            <p style="height: 120px;">Join us in helping build our bright youngsters a school to showcase their skills and to make them a change and making the world a better place.</p>
            <div class="progress-text">
                <p class="progress-top">50%</p>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%"></div>
                </div>
                <p class="progress-left">Raised: <span>1200 ₹</span></p>
                <p class="progress-right">Goal: <span>2400 ₹</span></p>
            </div>
            <h2 class="borderes"><a href="#">DONATE NOW</a></h2>
        </div>
      </div>
    </div>
  </div>
@stop