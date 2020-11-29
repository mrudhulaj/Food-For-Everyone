@extends('templates.main')
<title>Home</title>
<style>
    ::placeholder {
        color: white;
        opacity: 1;
    }

    .our_activity .single-Promo h2::before{
      background: none !important;
    }

    .wrapper section>h2::before{
      background: none !important;
    }

    .cust-underline{
      border-bottom: 2px solid #01d262 !important;
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
                    <a href="{{route('causesView')}}" class="a-none ffe-font">
                      <h2 style="text-align: center;font-size: 22px;text-decoration: underline;" >Causes</h2>
                      <p>We are continously trying to expand our reach to different areas where people need support to
                          help build a better future.
                          <br>
                        </p>
                        <p style="margin-top: 16px;">
                          Click <a href="{{route('causesView')}}" class="a-none" style="color: #00A348">here</a> to learn more about the causes we support currently.</p>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="single-Promo" style="height: 330px;">
                    <div class="promo-icon">
                        <i class="material-icons">favorite</i>
                    </div>
                    <a href="{{route('volunteersView')}}" class="a-none ffe-font">
                      <h2 style="text-align: center;font-size: 22px;text-decoration: underline;" >Volunteering</h2>
                      <p>We are always looking for genuine, kind hearted volunters to support & participate in
                          events. 
                          <br>
                        </p>
                        <p style="margin-top: 37px;">
                          Click <a href="{{route('volunteersView')}}" class="a-none" style="color: #00A348">here</a> to learn more about it and how you can join our
                          family.</p>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="single-Promo" style="height: 330px;">
                    <div class="promo-icon">
                        <i class="material-icons">dashboard</i>
                    </div>
                    <a href="{{route('eventsView')}}" class="a-none ffe-font">
                      <h2 style="text-align: center;font-size: 22px;text-decoration: underline;" >Events</h2>
                      <p>We always conduct transparent events with the only aim of helping the needy people.We are always open to ideas & events.
                          <br>
                      </p>
                      <p>
                          Click <a href="{{route('eventsView')}}" class="a-none" style="color: #00A348">here</a> to learn more about out our events.</p>
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
                <h4 style="margin-top: 35px;">Next upcoming event at Government Childrens Hospital, Calicut</h4>
                <div class="progress-text">
                    <p class="progress-top">50%</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                            aria-valuemax="100" style="width:50%"></div>
                    </div>
                    <p class="progress-left">Raised: 12,500 ₹</p>
                    <p class="progress-right">Goal: 25,000 ₹</p>
                </div>
                <h2><a href="#" data-toggle="modal" data-target="#donationModal">DONATE NOW</a></h2>
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
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="events_single">
                    <img src="{{ url('images/events_single_one.jpg') }}">
                    <p><span class="event_left"><i class="material-icons">access_time</i>9:00 am - 2:00 pm</span><span
                            class="event_right"><i class="material-icons">location_on</i>Nagaland</span></p>
                    <div class="clear"></div>
                    <h3 style="text-decoration: none;">Angels Orphanage</h3>
                    <h6>We are planning a program to engage with our beatiful kids from Angels Orphanage to spend some
                        quality time with them and give them some tasty launch.
                        <br>
                        Click <span><a href="#" style="color: #00A348;text-decoration: none"> here </a></span>to see more details.</h6>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="events_single">
                    <img src="{{ url('images/events_single_two.jpg') }}">
                    <p><span class="event_left"><i class="material-icons">access_time</i>2:00 pm - 9:00 pm</span><span
                            class="event_right"><i class="material-icons">location_on</i>Chennai</span></p>
                    <h3 style="text-decoration: none;">Goverment Old Age Home</h3>
                    <h6>We are planning to visit our charming grandma's and grandpa's at Government Old Age Home,
                        Chennai.We have some amazing activites planned along with a fabulous dinner.
                        <br>
                        Click <span><a href="#" style="color: #00A348;text-decoration: none"> here </a></span>to see more details.</h6>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="events_single">
                    <img src="{{ url('images/events_single_three.jpg') }}">
                    <p><span class="event_left"><i class="material-icons">access_time</i>9:00 pm - 3:00 pm</span><span
                            class="event_right"><i class="material-icons">location_on</i>Kerala</span></p>
                    <h3 style="text-decoration: none;">Mytra School For Special Children</h3>
                    <h6>We are planning to see our friends from Mytra School For Special Children, Kerala.We have
                        arranged a grand breakfast and lunch along with some fun games and activities.
                        <br>
                        Click <span><a href="#" style="color: #00A348;text-decoration: none"> here </a></span>to see more details.</h6>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-6 for-border">
                <div class="block">
                    <p><i class="material-icons">favorite</i></p>
                    <p class="counter-wrapper"><span class="white-bold">117</span></p>
                    <p class="text-block">Donaters</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 for-border">
                <div class="block">
                    <p><i class="material-icons">language</i></p>
                    <p class="counter-wrapper"><span class="white-bold">37</span></p>
                    <p class="text-block">Places</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 for-border">
                <div class="block">
                    <p><i class="material-icons">person_add</i></p>
                    <p class="counter-wrapper"><span class="white-bold">18</span></p>
                    <p class="text-block">Volunteers</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 for-border">
                <div class="block">
                    <p><i class="material-icons">people</i></p>
                    <p class="counter-wrapper"><span class="white-bold">348</span></p>
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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="our_cuauses_single owl-carousel owl-theme">
                    <div class="item">
                        <img src="{{ url('images/our_cuauses_one.jpg') }}">
                        <div class="for_padding">
                            <h2>FUTURE FOR CHILDREN</h2>
                            <p style="height: 120px;">Join us in helping build our bright youngsters a school to
                                showcase their skills and to make them a change and making the world a better place.</p>
                            <div class="progress-text">
                                <p class="progress-top">50%</p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100" style="width:50%"></div>
                                </div>
                                <p class="progress-left">Raised: <span>1200 ₹</span></p>
                                <p class="progress-right">Goal: <span>2400 ₹</span></p>
                            </div>
                            <h2 class="borderes"><a href="#" data-toggle="modal" data-target="#donationModal">DONATE NOW</a></h2>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{ url('images/our_cuauses_two.jpg') }}">
                        <div class="for_padding">
                            <h2>CARE HOME FOR ELDERS</h2>
                            <p style="height: 120px;">Let's not forget how we got here.Join us in building our elders a
                                safe and protective home to assure them that kindness still exists.</p>
                            <div class="progress-text">
                                <p class="progress-top">50%</p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100" style="width:50%"></div>
                                </div>
                                <p class="progress-left">Raised: <span>1200 ₹</span></p>
                                <p class="progress-right">Goal: <span>2400 ₹</span></p>
                            </div>
                            <h2 class="borderes"><a href="#" data-toggle="modal" data-target="#donationModal">DONATE NOW</a></h2>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{ url('images/our_cuauses_three.jpg') }}">
                        <div class="for_padding">
                            <h2>CHARITABLE HOSPITAL FOR ALL</h2>
                            <p style="height: 120px;">The most helpless one's are the most disease prone
                                one's.Malnutrition , unhygenic living conditions comes at a cost.But we help them
                                recover for a better tommorow.Join us in helping this dream a possibility.</p>
                            <div class="progress-text">
                                <p class="progress-top">50%</p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100" style="width:50%"></div>
                                </div>
                                <p class="progress-left">Raised: <span>1200 ₹</span></p>
                                <p class="progress-right">Goal: <span>2400 ₹</span></p>
                            </div>
                            <h2 class="borderes"><a href="#" data-toggle="modal" data-target="#donationModal">DONATE NOW</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="donors">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="donors_input">
                    <h2>DONATE NOW</h2>
                    <form action="#" method="post">
                        <p class="amount">
                            <label for="usd">AMOUNT : </label>
                            <input type="radio" name="usd" id="usd" checked>20 ₹
                            <input type="radio" name="usd" id="usd">50 ₹
                            <input type="radio" name="usd" id="usd">100 ₹</p>
                        <p class="type">
                            <label for="type">TYPE : </label>
                            <input type="radio" name="time" id="type" checked>One Time
                            <input type="radio" name="time" id="type">Monthly
                            <input type="radio" name="time" id="type">Yearly <br>
                        </p>
                        <h5>
                            <input type="text" placeholder="Name">
                            <input type="email" placeholder="Email">
                        </h5>
                        <h4>
                            <select>
                                <option>I Want To Donate For 1</option>
                                <option>I Want To Donate For 2</option>
                                <option>I Want To Donate For 3</option>
                            </select>
                        </h4>
                        <input type="submit" class="borderes" value="DONATE NOW" style="width: auto;">
                    </form>
                </div>
                <div class="donors_image">
                    <h2>FEATURED DONORS</h2>
                    <div class="donors_featured owl-carousel owl-theme">
                        <div class="item">
                            <img src="{{ url('images/donors_featured_one.jpg') }}">
                            <h3>Kenneth J. Garnica</h3>
                            <p>Donated Amount : <span>1,000 ₹</span> </p>
                        </div>
                        <div class="item">
                            <img src="{{ url('images/donors_featured_one.jpg') }}">
                            <h3>Kenneth J. Garnica</h3>
                            <p>Donated Amount : <span>6,000 ₹</span> </p>
                        </div>
                        <div class="item">
                            <img src="{{ url('images/donors_featured_one.jpg') }}">
                            <h3>Kenneth J. Garnica</h3>
                            <p>Donated Amount : <span>12,000 ₹</span> </p>
                        </div>
                        <div class="item">
                            <img src="{{ url('images/donors_featured_one.jpg') }}">
                            <h3>Kenneth J. Garnica</h3>
                            <p>Donated Amount : <span>15,500 ₹</span> </p>
                        </div>
                    </div>
                </div>
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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="volunteer_single owl-carousel owl-theme" style="padding-left: 100px;">
                    <div class="item">
                        <img src="{{ url('images/volanteer_1.jpg') }}">
                        <div class="text" style="height: 178px;">
                            <h3>Laura Jammy</h3>
                            <h6>Designer</h6>
                            <p>With us since 2015</p>
                            <h5><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i
                                        class="fa fa-twitter" aria-hidden="true"></i></a><a href="#"><i
                                        class="fa fa-behance" aria-hidden="true"></i></a></h5>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{ url('images/volanteer_2.jpg') }}">
                        <div class="text" style="height: 178px;">
                            <h3>Albert R. Ardoin</h3>
                            <h6>Actor</h6>
                            <p>With us since 2018</p>
                            <h5><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i
                                        class="fa fa-twitter" aria-hidden="true"></i></a><a href="#"><i
                                        class="fa fa-behance" aria-hidden="true"></i></a></h5>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{ url('images/volanteer_3.jpg') }}">
                        <div class="text" style="height: 178px;">
                            <h3>Cynthia Anni</h3>
                            <h6>Singer</h6>
                            <p>With us since 2020</p>
                            <h5><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i
                                        class="fa fa-twitter" aria-hidden="true"></i></a><a href="#"><i
                                        class="fa fa-behance" aria-hidden="true"></i></a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="carosal_bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="carosal_bottom_single owl-carousel owl-theme">
                    <div class="item">
                        <img src="{{ url('images/volanteer_1.jpg') }}">
                        <p>Genuine people,genuine love. Every activity, every transaction is transparent and open for
                            anyone to check.That's what I love about this group. They are happy to answer you questions
                            about donations or any other issues.This is what seperates them from other's.You can be sure
                            your money and effort are going to the right causes here.</p>
                        <h5><i class="material-icons">format_quote</i></h5>
                        <h4>Florence M. Cofer</h4>
                        <h6>Designer</h6>
                    </div>
                    <div class="item">
                        <img src="{{ url('images/volanteer_2.jpg') }}">
                        <p>I have never seen this level of sincerity anywhere else.Kudos to the entire team and
                            organizers for keeping up this wonderful project. I am so happy to be a part of this great
                            team and effort.Looking forward to bringing this mission to even greater heights!</p>
                        <h5><i class="material-icons">format_quote</i></h5>
                        <h4>Florence M. Cofer</h4>
                        <h6>Designer</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="letast_news">
    <h2>
      <span class="cust-underline">
        Latest News From Around The World
      </span>
    </h2>
    <p>Hungry stomach's and stretching arm's are not just around us, they are all over the world. </p>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single_news">
                    <img src="{{ url('images/news_images_1.jpg') }}">
                    <div class="texts" style="height: 250px;">
                        <p class="date"><a href="#">30 May, 2020</a></p>
                        <h3>Bill Gates Donates $10mn towards childrens welfare in Africa</h3>
                        <p class="test">The Billionare and ex chairman of Microsoft announced this in his recent press
                            conference in Washington, USA.</p>
                        <h3><a href="#">READ MORE</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single_news">
                    <img src="{{ url('images/news_images_2.jpg') }}">
                    <div class="texts" style="height: 250px;">
                        <p class="date"><a href="#">22 June, 2020</a></p>
                        <h3>Amazon to build schools and hospitals in Uganda</h3>
                        <p class="test">The tech conglomerate announced their plans to build a brighter future for the
                            children and elders in their annual conference held at LA, USA.</p>
                        <h3><a href="#">READ MORE</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single_news">
                    <img src="{{ url('images/news_images_3.jpg') }}">
                    <div class="texts" style="height: 250px;">
                        <p class="date"><a href="#">15 Sep, 2020</a></p>
                        <h3>UN joins hands with governments to eradicate polio.</h3>
                        <p class="test">UN has joined with world leaders and governments to ensure that no child will
                            have to suffer from polio anymore and to completly eradicate it within the next 5 years.</p>
                        <h3><a href="#">READ MORE</a></h3>
                    </div>
                </div>
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
<script src="{{ asset('vendor/jquery-validation/dist/jquery.validate.min.js') }}" defer></script>
<script>
    $(document).ready(function () {

      // Display Logged out modal after logging out
      var authenticated = "{{Session::get('authenticated')}}";
      if( authenticated == "false" ){
        jQuery.noConflict();
        $('#defaultModal').modal('show');
        "{{Session::put('authenticated','')}}";
      }
    });
    
</script>
