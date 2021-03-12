@extends('templates.main')
<title>Admin Home</title>
<link href="{{ url('font-awesome/css/all.css') }}" rel="stylesheet" media="all">
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

    .wrapper section>h2::before {
        width: 160px !important;
        left: 44% !important;
    }


    .item {
        box-shadow: 0px 2px 10px 0px rgba(0, 0, 0, 0.15);
        width: 365px;
        margin-right: 10px;
        margin-bottom: 30px;
        /* margin-top: 30px; */
    }

    .item .text {
        box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.15);
        float: right;
        width: 205px;
        padding: 5px 30px;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .item .text h5 a {
        padding-right: 10px;
    }

    .cust-img-div {
        width: 160px !important;
        height: 178px;
        overflow: hidden;
        box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.15);
        border-radius: 10px 0px 0px 10px;
    }

    .iDashboard{
      font-size: 100px;
      /* padding: 20px 20px 20px 33px; */
      color: #00A348;
    }

    .dashboard-font{
      font-size: 50px !important;
      color:#0d6d38 !important;
    }

</style>
@section('content')
<section class="events_section_area">
    <h2 id="cust-h2">
      <span class="custom-underline">DASHBOARD</span>
    </h2>
</section>
<div class="container plr-0">
    <div class="col-lg-12 plr-0">

        <div class="col-lg-4">
            <div class="col-lg-12" style="width: auto">
                <div class="item" style="border-radius: 10px;">
                    <div class="col-lg-5 plr-0 cust-img-div">
                      <i class="fas fa-hand-holding-heart iDashboard" style="padding: 35px 20px 20px 23px;"></i>
                    </div>
                    <div class="text col-lg-7 plr-0" style="height: 178px;">
                        <h3 class="vNames">Donations</h3>
                        <p>In last 24h:</p>
                        <div style="padding: 15px 0px;">
                          <span class="ffe-font dashboard-font">
                            {{$dashboardCount['donations']}}
                          </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="col-lg-12" style="width: auto">
                <div class="item" style="border-radius: 10px;">
                    <div class="col-lg-5 plr-0 cust-img-div">
                      <i class="fas fa-utensils iDashboard" style="padding: 40px 20px 20px 36px;"></i>
                    </div>
                    <div class="text col-lg-7 plr-0" style="height: 178px;">
                        <h3 class="vNames">Foods Added</h3>
                        <p>In last 24h:</p>
                        <div style="padding: 15px 0px;">
                          <span class="ffe-font dashboard-font">
                            {{$dashboardCount['availableFoods']}}
                          </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="col-lg-12" style="width: auto">
                <div class="item" style="border-radius: 10px;">
                    <div class="col-lg-5 plr-0 cust-img-div">
                      <i class="fas fa-seedling iDashboard" style="padding: 40px 20px 20px 30px;"></i>
                    </div>
                    <div class="text col-lg-7 plr-0" style="height: 178px;">
                        <h3 class="vNames">Causes</h3>
                        <p>Total pending approval:</p>
                        <div style="padding: 15px 0px;">
                          <span class="ffe-font dashboard-font">
                            {{$dashboardCount['causes']}}
                          </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 plr-0" style="margin-top: 50px;margin-bottom: 50px;">

      <div class="col-lg-4">
          <div class="col-lg-12" style="width: auto">
              <div class="item" style="border-radius: 10px;">
                  <div class="col-lg-5 plr-0 cust-img-div">
                    <i class="fas fa-people-carry iDashboard" style="padding: 45px 20px 20px 20px;"></i>
                  </div>
                  <div class="text col-lg-7 plr-0" style="height: 178px;">
                      <h3 class="vNames">Volunteers</h3>
                      <p>Total pending approval:</p>
                      <div style="padding: 15px 0px;">
                        <span class="ffe-font dashboard-font">
                          {{$dashboardCount['volunteers']}}
                        </span>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="col-lg-4">
          <div class="col-lg-12" style="width: auto">
              <div class="item" style="border-radius: 10px;">
                  <div class="col-lg-5 plr-0 cust-img-div">
                    <i class="fas fa-calendar-check iDashboard" style="padding: 45px 20px 20px 35px;"></i>
                  </div>
                  <div class="text col-lg-7 plr-0" style="height: 178px;">
                      <h3 class="vNames">Events</h3>
                      <p>Total pending approval:</p>
                      <div style="padding: 15px 0px;">
                        <span class="ffe-font dashboard-font">
                          {{$dashboardCount['events']}}
                        </span>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="col-lg-4">
          <div class="col-lg-12" style="width: auto">
              <div class="item" style="border-radius: 10px;">
                  <div class="col-lg-5 plr-0 cust-img-div">
                    <i class="fas fa-address-card iDashboard" style="padding: 50px 20px 20px 23px;"></i>
                  </div>
                  <div class="text col-lg-7 plr-0" style="height: 178px;">
                      <h3 class="vNames">Contact</h3>
                      <span>Total Raised Tickets:</span>
                      <div style="padding: 5px 0px;">
                        <span class="ffe-font" style="font-size: 25px;color: #0d6d38 !important;">
                          {{$dashboardCount['contactRaisedTickets']}}
                        </span>
                      </div>
                      <span>Non Tickets (Last 24h):</span>
                      <div style="padding: 5px 0px;">
                        <span class="ffe-font" style="font-size: 25px;color: #0d6d38 !important;">
                          {{$dashboardCount['contactNonRaisedTickets']}}
                        </span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@stop
