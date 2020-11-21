@extends('templates.main')
<title>Events</title>
<style>
.wrapper .events_section_area #cust-h2 {
    color: #3c354e;
    font-family: "Roboto", sans-serif;
    font-size: 32px;
    font-weight: 700;
    margin: 0px auto 50px;
    position: relative;
    text-transform: uppercase;
    width: 100%;
    text-align: center;
}

.wrapper section>h2::before{
  width: 160px !important;
  left: 44% !important;
}

</style>
@section('content')
<section class="events_section_area">
  <h2 id="cust-h2">UPCOMING EVENTS</h2>
  <p>Missed our previous events? Don't worry, we have plenty of them coming up!</p>
  <div class="container" style="margin-bottom: 50px">
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
@stop
