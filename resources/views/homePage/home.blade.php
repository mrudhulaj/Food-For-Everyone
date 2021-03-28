@extends('templates.main')
<title>Home</title>
<link href="{{ url('font-awesome/css/all.css') }}" rel="stylesheet" media="all">
<style>
    ::placeholder {
        color: white;
        opacity: 1;
    }

    .our_activity .single-Promo h2::before {
        background: none !important;
    }

    .wrapper section>h2::before {
        background: none !important;
    }

    .cust-underline {
        border-bottom: 2px solid #01d262 !important;
    }

    /* Causes css */

    .box {
        width: 350px;
        min-height: 660px;
    }

    .mainbox {
        margin-bottom: 80px;
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
        margin: 35px 0 15px;
    }

    hr {
        margin-top: 20px;
        margin-bottom: 20px;
        border: 0;
        border-top: 2px solid #01d262 !important;
        width: 50% !important;
    }

    .box-p,
    .progress-text {
        color: #595959;
        font-family: "Roboto", sans-serif;
        font-size: 15px;
        font-weight: 400;
        margin: 0;
        text-align: center;
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

    .progress-amount {
        color: #01d262;
    }

    .progress-left {
        left: 0;
        margin-top: 15px;
        position: absolute;
    }

    .progress-right {
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

    .img-div {
        overflow: hidden;
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        display: flex;
        justify-content: center;
    }

    .learn-more {
        color: #00ab47;
    }

    .learn-more:hover {
        color: #00A348 !important;
        font-weight: bold !important;
        text-decoration: none;
    }

    .h2-title:hover {
        color: #00A348 !important;
        font-weight: bold !important;
        text-decoration: none;
    }

    /* End causes css */

    .cust-volunteer>.owl-stage-outer{
      padding-left: 100px;
    }

    /* Begin: Volunteers css */

    .item-vol {
        box-shadow: 0px 2px 10px 0px rgba(0, 0, 0, 0.15);
        width: 365px;
        margin-right: 10px;
        margin-bottom: 30px;
        margin-top: 30px;
    }

    .item-vol .text {
        box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.15);
        float: right;
        width: 205px;
        padding: 5px 30px;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .item-vol .text h5 a{
      padding-right: 10px;
    }

    .cust-img-div-vol{
      width: 160px !important;
      height: 178px;
      overflow: hidden;
      box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.15);
      border-radius: 10px 0px 0px 10px;
    }

    /* End:Volunteers css */

    .h2-title:hover {
      color: #00A348 !important;
      font-weight: bold !important;
      text-decoration: none;
    }

</style>
@section('content')
{{-- Main Content Begins --}}
<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

        <div class="item active">
            <img src="{{ url('images/home-carousel/mizoram.jpg') }}" alt="Mizoram" width="100%">
            <div class="carousel-caption">
                <h3>Mizoram</h3>
            </div>
        </div>

        <div class="item">
            <img src="{{ url('images/home-carousel/mizoram.jpg') }}" alt="Chennai" width="100%">
            <div class="carousel-caption">
                <h3>Chennai</h3>
            </div>
        </div>

        <div class="item">
            <img src="{{ url('images/home-carousel/mizoram.jpg') }}" alt="Punjab" width="100%">
            <div class="carousel-caption">
                <h3>Punjab</h3>
            </div>
        </div>

    </div>

    <!-- Left and right control -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<section class="our_activity">
    <h2>
        <span class="cust-underline">
            OUR ACTIVITIES
        </span>
    </h2>
    <p>We continuosly strive to provide the best care and feed every needy people out there. Please take a look at our
        activities and volunteer or contribute in any way you can !</p>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="single-Promo" style="height: 330px;">
                    <div class="promo-icon">
                        <i class="material-icons">near_me</i>
                    </div>
                    <a href="{{ route('causesView') }}" class="a-none ffe-font">
                        <h2 style="text-align: center;font-size: 22px;text-decoration: underline;">Causes</h2>
                        <p>We are continously trying to expand our reach to different areas where people need support to
                            help build a better future.
                            <br>
                        </p>
                        <p style="margin-top: 16px;">
                            Click <a href="{{ route('causesView') }}" class="a-none"
                                style="color: #00A348">here</a> to learn more about the causes we support currently.</p>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="single-Promo" style="height: 330px;">
                    <div class="promo-icon">
                        <i class="material-icons">favorite</i>
                    </div>
                    <a href="{{ route('volunteersView') }}" class="a-none ffe-font">
                        <h2 style="text-align: center;font-size: 22px;text-decoration: underline;">Volunteering</h2>
                        <p>We are always looking for genuine, kind hearted volunters to support & participate in
                            events.
                            <br>
                        </p>
                        <p style="margin-top: 37px;">
                            Click <a href="{{ route('volunteersView') }}" class="a-none"
                                style="color: #00A348">here</a> to learn more about it and how you can join our
                            family.</p>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="single-Promo" style="height: 330px;">
                    <div class="promo-icon">
                        <i class="material-icons">dashboard</i>
                    </div>
                    <a href="{{ route('eventsView') }}" class="a-none ffe-font">
                        <h2 style="text-align: center;font-size: 22px;text-decoration: underline;">Events</h2>
                        <p>We always conduct transparent events with the only aim of helping the needy people.We are
                            always open to ideas & events.
                            <br>
                        </p>
                        <p>
                            Click <a href="{{ route('eventsView') }}" class="a-none"
                                style="color: #00A348">here</a> to learn more about out our events.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="donate_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 for-padding">
                <h3>You have the heart to help, but not the time?</h3>
                <p>We understand everyone's struggles, but it's the thought that always counts. If you like , it's
                    always possible to contribute to help our volunteers and the people. Our activites and events are
                    always transparent and you are always welcome to attend any of our events.</p>
                @if( $latestEvent && $latestCause )
                  <h4 style="margin-top: 35px;">Next upcoming event at {{$latestEvent->Landmark.", ".$latestEvent->District}}</h4>
                  <h4 style="margin-top: 35px;">Latest cause we are supporting: {{$latestCause->CauseName." at ".$latestCause->District.", ".$latestCause->State}}</h4>
                  <div class="progress-text">
                      <p class="progress-top"><b>{{ number_format($latestCause->raisedAmountPercentage) }}%</b></p>
                      <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                              aria-valuemax="100" style="width:{{ number_format($latestCause->raisedAmountPercentage) }}%"></div>
                      </div>
                      <p class="progress-left">Raised: {{ number_format($latestCause->RaisedAmount) }} ₹</p>
                      <p class="progress-right">Goal: {{ number_format($latestCause->ExpectedAmount) }} ₹</p>
                  </div>
                  <h2><a href="#" data-toggle="modal" class="donateButton" data-causeID="{{$latestCause->ID}}" data-target="#donationModal">DONATE NOW FOR {{strtoupper($latestCause->CauseName)}}</a></h2>
                @endif
              </div>
        </div>
    </div>
</section>
<section class="events_section_area">
    <h2>
        <span class="cust-underline">
            UPCOMING EVENTS
        </span>
    </h2>
    <p>Missed our previous events? Don't worry, we have plenty of them coming up!</p>
    <p>
      @if(count($events) > 0)
        <a href="{{route('eventsView',)}}" style="color: #00A348;text-decoration: none"> 
        See all 
        </a>
      @else
        <span class="ffe-font"><b>No events added.</b></span>
      @endif
    </p>
    <div class="container">
        <div class="row">
            @foreach($events as $eventsData)
            <div class="col-md-4 col-xs-12">
              <div class="events_single" style="height: 570px;width: 351px;border-radius: 13px;
              box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.5);">
                  <div style="width: 351px;height: 207px;overflow: hidden;border-radius: 13px 13px 0px 0px;">
                      @if($eventsData->EventImage)
                        <img style="width: 351px;height: 207px;" src="{{ asset($eventsData->EventImage) }}">
                      @else
                        <i class="fas fa-calendar-check iDashboard" style="padding: 50px 132px;"></i>
                      @endif
                  </div>
                  <div style="padding: 10px;">
                    <p><span class="event_left"><i
                      class="material-icons">access_time</i>{{ $eventsData->BeginTime }} -
                  {{ $eventsData->EndTime }}</span>
                  <br>
                    <span class="event_right" style="right: auto"><i
                      class="material-icons">location_on</i>{{$eventsData->Landmark.", ".$eventsData->City.", ".$eventsData->District.", ".$eventsData->State}}</span>
                     </p>
                    <div class="clear"></div>
                    <h3 style="text-decoration: none;"> <a href="{{route('eventDetailsView',['eventID' => Crypt::encrypt($eventsData->ID)])}}" class="a-none">{{$eventsData->EventName}}</a> </h3>
                    <h6 style="min-height: 128px;">{{$eventsData->EventShortDescription}}</h6>
                        <br>
                  </div>
                  <div style="text-align: center;">
                    <span>
                      Click 
                        <a href="{{route('eventDetailsView',['eventID' => Crypt::encrypt($eventsData->ID)])}}" style="color: #00A348;text-decoration: none"> 
                          here 
                        </a>
                      to see more details.
                    </span>
                  </div>
              </div>
          </div>
            @endforeach

        </div>
    </div>
</section>


<div class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-6 for-border">
                <div class="block">
                    <p><i class="material-icons">favorite</i></p>
                    <p class="counter-wrapper"><span class="white-bold">{{$countItems['donations']}}</span></p>
                    <p class="text-block">Donations</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 for-border">
                <div class="block">
                    <p><i class="material-icons">language</i></p>
                    <p class="counter-wrapper"><span class="white-bold">{{$countItems['events']}}</span></p>
                    <p class="text-block">Events</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 for-border">
                <div class="block">
                    <p><i class="material-icons">person_add</i></p>
                    <p class="counter-wrapper"><span class="white-bold">{{$countItems['volunteers']}}</span></p>
                    <p class="text-block">Volunteers</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 for-border">
                <div class="block">
                    <p><i class="material-icons">people</i></p>
                    <p class="counter-wrapper"><span class="white-bold">{{$countItems['food']}}</span></p>
                    <p class="text-block">People Served</p>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="our_cuauses">
    <h2>
        <span class="cust-underline">
            OUR CAUSES
        </span>
    </h2>
    <p>We also believe in investing for a better future for our kids and also to take care of our old pals by building
        them a place which they deserve.</p>
    <p>
      @if(count($causes) > 0)
        <a href="{{route('causesView',)}}" style="color: #00A348;text-decoration: none"> 
        See all 
        </a>
      @else
        <span class="ffe-font"><b>No causes added.</b></span>
      @endif
    </p>
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top: 50px;">
                {{-- If Causes <= 2 use static items else uses carousel items.Done to avoid carousel style breaking --}}
                @if(count($causes) <= 2)
                    @foreach($causes as $causesData)
                        <div class="box mainbox">
                            <div class="img-div">
                              @if($causesData->Image != "")
                                <img src="{{ asset($causesData->Image) }}"
                                  style="border-top-left-radius: inherit;border-top-right-radius: inherit;width: 420px;height: 220px;">
                              @else
                                <i class="fas fa-seedling iDashboard" style="padding: 40px 20px 20px 30px;"></i>
                              @endif
                            </div>
                            <div class="box-content" style="padding: 0 30px;">
                                <a href="{{ route('causesDetails',['causeID' => Crypt::encrypt($causesData->ID)]) }}"
                                    class="h2-title">
                                    <h2 style="text-align: center;text-transform: uppercase;" class="h2-title">
                                        {{ $causesData->CauseName }}
                                    </h2>
                                </a>
                                <p class="box-p" style="height: 120px;margin-top: 30px;">
                                    {{ $causesData->CauseShortDescription }}
                                    <br>
                                    <a href="{{ route('causesDetails',['causeID' => Crypt::encrypt($causesData->ID)]) }}"
                                        class="learn-more">
                                        Learn more.
                                    </a>
                                </p>
                                <div class="progress-text">
                                    <p class="progress-top">{{ number_format($causesData->raisedAmountPercentage) }}%</p>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="50"
                                            aria-valuemin="0" aria-valuemax="100"
                                            style="width:{{ number_format($causesData->raisedAmountPercentage) }}%;background-color: #01d262;"></div>
                                    </div>
                                    <p class="progress-left">Raised: <span class="progress-amount">{{ number_format($causesData->RaisedAmount) }} ₹</span></p>
                                    <p class="progress-right">Goal: <span
                                            class="progress-amount">{{ number_format($causesData->ExpectedAmount) }}
                                            ₹</span>
                                    </p>
                                </div>
                                <h2 class="borderes" style="text-align: center;margin-top: 100px;"><a
                                        data-toggle="modal" class="donateButton" data-causeID="{{$causesData->ID}}" data-target="#donationModal" href="#">DONATE NOW</a></h2>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="our_cuauses_single owl-carousel owl-theme">
                      @foreach($causes as $causesData)
                          <div class="item">
                              <img src="{{ asset($causesData->Image) }}" style="border-radius: 10px 10px 0px 0px;">
                              <div class="for_padding">
                                <a href="{{ route('causesDetails',['causeID' => Crypt::encrypt($causesData->ID)]) }}"
                                  class="h2-title">
                                  <h2 class="h2-title">
                                      {{ $causesData->CauseName }}
                                  </h2>
                              </a>
                                  <p style="height: 120px;">{{ $causesData->CauseShortDescription }}</p>
                                  <div class="progress-text">
                                      <p class="progress-top">{{ number_format($causesData->raisedAmountPercentage) }}%</p>
                                      <div class="progress">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="50"
                                              aria-valuemin="0" aria-valuemax="100" style="width:{{ number_format($causesData->raisedAmountPercentage) }}%"></div>
                                      </div>
                                      <p class="progress-left">Raised: <span>{{ number_format($causesData->RaisedAmount) }}₹</span></p>
                                      <p class="progress-right">Goal: <span>{{ number_format($causesData->ExpectedAmount) }}₹</span></p>
                                  </div>
                                  <h2 class="borderes"><a href="#" class="donateButton" data-causeID="{{$causesData->ID}}" data-toggle="modal" data-target="#donationModal">DONATE
                                          NOW</a></h2>
                              </div>
                          </div>
                      @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
<div class="clear"></div>
<section class="volunteer_area">
    <h2>
        <span class="cust-underline">
            Our Volunteers
        </span>
    </h2>
    <p>Meet our superhero's.The people who bring joy to our kids and elders.The silent warriors.</p>
    <p>
      @if(count($volunteers) > 0)
        <a href="{{route('volunteersView',)}}" style="color: #00A348;text-decoration: none"> 
        See all 
        </a>    
      @else
        <span class="ffe-font"><b>No volunteers added.</b></span>
      @endif
    </p>
    <div class="container">
        <div class="row">
            <div class="col-md-12" @if(count($volunteers)<= 3) style="margin-bottom: 100px;" @endif >
                @if(count($volunteers)<= 3)
                @php $i = 0; @endphp {{-- To dynamically set Occup,Links etc to same height if name height differ --}}
                @foreach($volunteers as $volunteersData)
                <div class="col-lg-12" style="width: auto">
                  <div class="item-vol" style="border-radius: 10px;">
                    <div class="col-lg-5 plr-0 cust-img-div-vol">
                      <img src="{{ asset($volunteersData->ProfileImage) }}" alt="Not Found" onerror=this.src="{{url('images/user-icon.png')}}"
                      style="border-top-left-radius: 10px;border-bottom-left-radius: 10px;width: 160px;height: 178px;">
                    </div>
                      <div class="text col-lg-7 plr-0" style="height: 178px;">
                          <h3 class="vNames">{{$volunteersData->FirstName." ".$volunteersData->LastName}}</h3>
                          <h6 class="vOccup-{{$i}}">{{$volunteersData->Occupation}}</h6>
                          <p>With us since {{ date('Y', strtotime($volunteersData->CreatedDate)) }}</p>
                          <h5 style="" class="">
                            <a href="#">
                              <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="#">
                              <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="#">
                              <i class="fa fa-behance" aria-hidden="true"></i>
                            </a>
                          </h5>
                      </div>
                  </div>
                </div>
                @php $i++; @endphp {{-- To dynamically set Occup,Links etc to same height if name height differ --}}
                @endforeach
                @else
                <div class="volunteer_single owl-carousel owl-theme cust-volunteer">
                @foreach($volunteers as $volunteersData)

                       <div class="item">
                        <img src="{{ asset($volunteersData->ProfileImage) }}">
                        <div class="text" style="height: 178px;">
                            <h3>{{$volunteersData->FirstName." ".$volunteersData->LastName}}</h3>
                            <h6>{{$volunteersData->Occupation}}</h6>
                            <p>With us since {{ date('Y', strtotime($volunteersData->CreatedDate)) }}</p>
                            <h5><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i
                                        class="fa fa-twitter" aria-hidden="true"></i></a><a href="#"><i
                                        class="fa fa-behance" aria-hidden="true"></i></a></h5>
                        </div>
                    </div>
                  @endforeach
                </div>

                @endif
            </div>
        </div>
    </div>
</section>

<section>
    <h2 style="margin-top: 0px;">
        <span class="cust-underline">
            Our Supporting Partners
        </span>
    </h2>
</section>
<section class="footer_carosal">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top: -35px;padding-left: 60px;">
                <div class="footer_carosal_icon owl-carousel owl-theme">
                    <div class="item">
                        <img src="{{ url('images/brand-logos/swiggy.png') }}"
                            style="width: 105;margin-top: 5px;">
                    </div>
                    <div class="item">
                        <img src="{{ url('images/brand-logos/zomato.png') }}">
                    </div>
                    <div class="item">
                        <img src="{{ url('images/brand-logos/just-eat.png') }}">
                    </div>
                    <div class="item">
                        <img src="{{ url('images/brand-logos/food-panda.png') }}"
                            style="width: 210px;margin-top: -13px">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- Main Content Ends --}}
@include('templates.donationModal')
@include('templates.defaultModal', ['title' => 'Logged Out','message' => 'You have successfully logged out.'])
@stop

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-validation/dist/jquery.validate.min.js') }}" defer>
    </script>
    <script>
        $(document).ready(function () {

            // Display Logged out modal after logging out
            var authenticated = "{{ Session::get('authenticated') }}";
            if (authenticated == "false") {
                jQuery.noConflict();
                $('#defaultModal').modal('show');
                "{{ Session::put('authenticated','') }}";
            }

            // Pass CauseID to donation modal on donate button click
            $(".donateButton").click(function () {
                $('#causeIdDonation').val( $(this).attr('data-causeID') );
            });

        });

    </script>
