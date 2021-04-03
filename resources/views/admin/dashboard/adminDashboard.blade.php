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

    .button-bg-green{
      padding: 6px 12px !important;
      background-color: #00B346 !important;
      border: 1px solid #00B346 !important;
    }

    .dropdown-menu.show{
      background: #00B346 none repeat scroll 0 0 !important;
      border: none !important;
      top: -2px !important;
      border-radius: 0px;
      border-top: #00E660;
    }

    .dropdown-menu > li > a{
      color: white !important;
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
                    <div class="text col-lg-7 plr-0 categoryDiv" style="height: 178px;">
                        <h3 class="vNames">Donations
                          <div class="dropdown">
                            <button class="button-bg-green btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                            <span class="caret" style="color: white"></span></button>
                            <ul class="dropdown-menu" style="margin-top: 5px !important;border-radius: 5px;" data-category="donations">
                              <li><a href="javascript:void(0)" class="ffe-font filter-item">Last 24h</a></li>
                              <li><a href="javascript:void(0)" class="ffe-font filter-item">Last Month</a></li>
                              <li><a href="javascript:void(0)" class="ffe-font filter-item">Last Year</a></li>
                              <li><a href="javascript:void(0)" class="ffe-font filter-item">All time</a></li>
                            </ul>
                          </div>
                        </h3>
                        <p class="filter-text">In last 24h:</p>
                        <div style="padding: 15px 0px;">
                          <span class="ffe-font dashboard-font filter-value">
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
                    <div class="text col-lg-7 plr-0 categoryDiv" style="height: 178px;">
                        <h3 class="vNames">Foods Added
                          <div class="dropdown">
                            <button class="button-bg-green btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                            <span class="caret" style="color: white"></span></button>
                            <ul class="dropdown-menu" style="margin-top: 5px !important;border-radius: 5px;" data-category="foodsAdded">
                              <li><a href="javascript:void(0)" class="ffe-font filter-item">Last 24h</a></li>
                              <li><a href="javascript:void(0)" class="ffe-font filter-item">Last Month</a></li>
                              <li><a href="javascript:void(0)" class="ffe-font filter-item">Last Year</a></li>
                              <li><a href="javascript:void(0)" class="ffe-font filter-item">All time</a></li>
                            </ul>
                          </div>
                        </h3>
                        <p class="filter-text">In last 24h:</p>
                        <div style="padding: 15px 0px;">
                          <span class="ffe-font dashboard-font filter-value">
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
                    <div class="text col-lg-7 plr-0 categoryDiv" style="height: 178px;">
                        <h3 class="vNames">Causes
                          <div class="dropdown">
                            <button class="button-bg-green btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                            <span class="caret" style="color: white"></span></button>
                            <ul class="dropdown-menu" style="margin-top: 5px !important;border-radius: 5px;" data-category="causes">
                              <li><a href="javascript:void(0)" class="ffe-font filter-item">Total Pending</a></li>
                              <li><a href="javascript:void(0)" class="ffe-font filter-item">Total Approved</a></li>
                              <li><a href="javascript:void(0)" class="ffe-font filter-item">Total Cancelled</a></li>
                            </ul>
                          </div>
                        </h3>
                        <p class="filter-text">Total pending approval:</p>
                        <div style="padding: 15px 0px;">
                          <span class="ffe-font dashboard-font filter-value">
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
                  <div class="text col-lg-7 plr-0 categoryDiv" style="height: 178px;">
                      <h3 class="vNames">Volunteers
                        <div class="dropdown">
                          <button class="button-bg-green btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                          <span class="caret" style="color: white"></span></button>
                          <ul class="dropdown-menu" style="margin-top: 5px !important;border-radius: 5px;" data-category="volunteers">
                            <li><a href="javascript:void(0)" class="ffe-font filter-item">Total Pending</a></li>
                            <li><a href="javascript:void(0)" class="ffe-font filter-item">Total Approved</a></li>
                            <li><a href="javascript:void(0)" class="ffe-font filter-item">Total Cancelled</a></li>
                          </ul>
                        </div>
                      </h3>
                      <p class="filter-text">Total pending approval:</p>
                      <div style="padding: 15px 0px;">
                        <span class="ffe-font dashboard-font filter-value">
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
                  <div class="text col-lg-7 plr-0 categoryDiv" style="height: 178px;">
                      <h3 class="vNames">Events
                        <div class="dropdown">
                          <button class="button-bg-green btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                          <span class="caret" style="color: white"></span></button>
                          <ul class="dropdown-menu" style="margin-top: 5px !important;border-radius: 5px;" data-category="events">
                            <li><a href="javascript:void(0)" class="ffe-font filter-item">Total Pending</a></li>
                            <li><a href="javascript:void(0)" class="ffe-font filter-item">Total Approved</a></li>
                            <li><a href="javascript:void(0)" class="ffe-font filter-item">Total Cancelled</a></li>
                          </ul>
                        </div>
                      </h3>
                      <p class="filter-text">Total pending approval:</p>
                      <div style="padding: 15px 0px;">
                        <span class="ffe-font dashboard-font filter-value">
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
                  <div class="text col-lg-7 plr-0 categoryDiv" style="height: 178px;">
                      <h3 class="vNames">Contact
                        <div class="dropdown">
                          <button class="button-bg-green btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                          <span class="caret" style="color: white"></span></button>
                          <ul class="dropdown-menu" style="margin-top: 5px !important;border-radius: 5px;" data-category="contactMessages">
                            <li><a href="javascript:void(0)" class="ffe-font filter-item">Total Raised Tickets (24h)</a></li>
                            <li><a href="javascript:void(0)" class="ffe-font filter-item">Total Non Raised Tickets (24h)</a></li>
                            <li><a href="javascript:void(0)" class="ffe-font filter-item">Total Raised Tickets</a></li>
                            <li><a href="javascript:void(0)" class="ffe-font filter-item">Total Non Raised Tickets</a></li>
                          </ul>
                        </div>
                      </h3>
                      <p class="filter-text">Total Raised Tickets:</p>
                      <div style="padding: 15px 0px;">
                        <span class="ffe-font dashboard-font filter-value">
                          {{$dashboardCount['contactRaisedTickets']}}
                        </span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@stop
<script src="{{ asset('vendor/jquery-validation/dist/jquery.validate.min.js') }}" defer>
</script>
<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script>
    $(document).ready(function () {
      
      $('.filter-item').on('click', function() {
        var category    = $(this).closest('.dropdown-menu').attr('data-category');
        var item        = $(this).text();
        var filterText  = $(this).closest('.categoryDiv').find('.filter-text');
        var filterValue = $(this).closest('.categoryDiv').find('.filter-value');
        $.ajax({
                url:'{{ route("adminDashboardFilter") }}',
                type:'GET',
                data:{
                  category    : category,
                  item        : item,
                },
                success:function(data) {
                  filterText.text(item+" :");
                  filterValue.text(data);
                }
              });
      });


    });

</script>
