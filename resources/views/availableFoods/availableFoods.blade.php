@extends('templates.main')
<link href="{{ url('css/form.css') }}" rel="stylesheet" media="all">
<title>Available Foods</title>
<style>
    .wrapper section>h2::before {
        width: 190px !important;
        left: 42% !important;
    }

    thead {
        background-color: #00E660;
    }

    .filter {
        font-size: 16px;
    }

    .pr-20 {
        padding-right: 20px !important;
    }

    .pl-20 {
        padding-left: 20px
    }

    .mr-20 {
        margin-right: 20px !important;
    }

    .ml-20 {
        margin-left: 20px
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .input--style-4 {
        height: 34px !important;
    }

    td,
    th {
        text-align: center !important;
    }

    #availableFoodsTable {
        width: auto !important;
    }

    .mr-30 {
        margin-right: 30px !important;
    }

    .mr-10 {
        margin-right: 10px !important;
    }

</style>
@section('content')
<div class="container">
    @include('templates.alertSuccessOrErrorMessage')
    <section>
        <h2 style="margin-top: 0px;">
            <span class="custom-underline">Waiting for you to pick up!</span>
            <div style="margin-top: -35px;">
              <button class="btn button-bg-green" style="padding: 0px;width: 110px;height: 40px;float: right">
                @guest
                  <a class="a-none" href="javascript:void(0)" data-toggle="modal" data-target="#defaultModal">Donate Food</a>
                @else
                    <a class="a-none" @if($role->hasPermissionTo('create AvailableFoods')) href="{{ route('addAvailableFoodsView') }}" @else href="javascript:void(0)"
                      data-toggle="modal" data-target="#permissionDeniedModal" @endif>Donate</a>
                    <button class="btn button-bg-green" style="padding: 0px;width: 110px;height: 40px;float: right;margin-right: 10px">
                      <a class="a-none" @if($role->hasPermissionTo('update AvailableFoods')) href="{{ route('editAvailableFoodsView') }}" @else href="javascript:void(0)"
                        data-toggle="modal" data-target="#permissionDeniedModal" @endif>Edit</a>
                    </button>
                @endguest
              </button>
            </div>
        </h2>
        <p>Here we list out the food's contributed by our user's and partner's.We make sure that these items comply
            strictly with our standard terms and policies.
            <br> All the food's that is not collected within the user specified time is automatically deleted to
            avoid any complications.</p>
    </section>
    <div class="col-lg-12 plr-0 filter" style="margin-top: 30px;">

        <form class="form-inline" name="filterForm" id="filterForm">

            <div class="col-lg-12">
                <div class="col-lg-3 pright-0">
                    <div class="input-group" style="width: 100%;">
                        <label class="label ffe-font">Location</label>
                        <select class="form-control input--style-4" style="" id="filterCountry" name="filterCountry">
                            <option value="" selected hidden>Select Country</option>
                            @guest
                              @foreach ($filterValues['Country'] as $values)
                              <option value="{{$values['Country']}}">{{$values['Country']}}</option>
                              @endforeach
                            @else
                              <option value="{{Auth::user()->Country}}" selected>{{Auth::user()->Country}}</option>
                            @endguest
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 pright-0">
                    <div class="input-group" style="width: 100%;">
                        <label class="label ffe-font">&nbsp;</label>
                        <select class="form-control input--style-4" style="" id="filterDistrict" name="filterDistrict">
                            <option value="" selected hidden>Select District</option>
                            @foreach ($filterValues['District'] as $values)
                              <option value="{{$values['District']}}">{{$values['District']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 pright-0">
                    <div class="input-group" style="width: 100%;">
                        <label class="label ffe-font">&nbsp;</label>
                        <select class="form-control input--style-4" style="" id="filterState" name="filterState">
                            <option value="" selected hidden>Select State</option>
                            @foreach ($filterValues['State'] as $values)
                              <option value="{{$values['State']}}">{{$values['State']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 pright-0">
                    <div class="input-group">
                        <label class="label ffe-font">Expiry Time</label>
                        <select class="form-control input--style-4" style="" id="filterExpTime" name="filterExpTime">
                            <option value="" selected hidden>Select Time</option>
                            <option value="1">Less than 1 hour</option>
                            <option value="2">Less than 2 hour</option>
                            <option value="3">Less than 3 hour</option>
                            <option value="4">Less than 4 hour</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-12" style="margin-bottom: 30px">

                <div class="col-lg-3 pright-0">
                    <div class="input-group col-lg-12">
                        <label class="label ffe-font">Minimum Food Count</label>
                        <input class="input--style-4" style="padding-right: 0px;" min="1" type="number" name="filterFoodCount" id="filterFoodCount" value="">
                    </div>
                </div>

                <div class="col-lg-3 pright-0">
                    <div class="input-group">
                        <label class="label ffe-font">Veg/Non-Veg</label>
                        <div class="p-t-10">
                            <label class="radio-container mr-30 ffe-font">Veg
                                <input type="radio" name="filterVegFlag" value="Veg">
                                <span class="checkmark"></span>
                            </label>
                            <label class="radio-container ffe-font">Non-Veg
                                <input type="radio" name="filterVegFlag" value="Non-Veg">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 pright-0">
                    <div class="input-group">
                        <label class="label ffe-font">Restaurent/Event</label>
                        <div class="p-t-10">
                            <label class="radio-container mr-30 ffe-font">Restaurant
                                <input type="radio" name="filterType" value="Restaurant">
                                <span class="checkmark"></span>
                            </label>
                            <label class="radio-container ffe-font">Event
                                <input type="radio" name="filterType" value="Event">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 pright-0" style="padding-top: 28px;">
                    <div class="input-group col-lg-12">
                        <div class="col-lg-6 plr-0">
                            <button class="btn button-bg-green" style="padding: 0px;width: 130px;height: 40px"
                                type="button" id="filterbtn">Filter</button>
                        </div>
                        <div class="col-lg-6 plr-0">
                            <button class="btn button-bg-green" style="padding: 0px;width: 130px;height: 40px"
                                type="button" id="resetFilter">Reset</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>

    </div>

    <div style="margin-bottom: 50px">
        <table class="table" style="" id="availableFoodsTable">
            <thead class="table-striped">
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Restaurent/Event</th>
                    <th scope="col">Restaurent Name</th>
                    <th scope="col">Veg/Non Veg</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Location</th>
                    <th scope="col">Added Date</th>
                    <th scope="col">Expiry Time</th>
                    <th scope="col">Food Count</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@include('templates.defaultModal', ['title' => 'Login Required','message' => 'Please login or sign up to continue.'])
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script type="text/javascript" charset="utf8"
    src="{{ asset('vendor/datatables.net/js/jquery.dataTables.min.js') }}" defer>
</script>
<script>
    $(document).ready(function () {

        fillDatatable();
        $('.dataTables_empty').html('No data available');
          function fillDatatable(filterValues) {
            var dataTable = $('#availableFoodsTable').dataTable({
                "oLanguage": {
                    "sEmptyTable": "No foods found."
                },
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('availableFoodListFilter') }}",
                    data: {
                      filterValues : filterValues
                    }
                },
                columns: [{
                        data: 'FirstName',
                        name: 'FirstName'
                    },
                    {
                        data: 'LastName',
                        name: 'LastName'
                    },
                    {
                        data: 'TypeOfDonation',
                        name: 'TypeOfDonation'
                    },
                    {
                        data: 'RestaurantName',
                        name: 'RestaurantName'
                    },
                    {
                        data: 'VegNonVeg',
                        name: 'VegNonVeg'
                    },
                    {
                        data: 'Phone',
                        name: 'Phone'
                    },
                    {
                        data: 'Location',
                        name: 'Location'
                    },
                    {
                        data: 'AddedDate',
                        name: 'AddedDate'
                    },
                    {
                        data: 'ExpiryTime',
                        name: 'ExpiryTime'
                    },
                    {
                        data: 'FoodCount',
                        name: 'FoodCount'
                    }
                ]
            });
        }


        $('#filterbtn').click(function () {
            var filterValues = {
            filterCountry        : $('#filterCountry').val(),
            filterDistrict    : $('#filterDistrict').val(),
            filterState       : $('#filterState').val(),
            filterExpTime     : $('#filterExpTime').val(),
            filterFoodCount   : $('#filterFoodCount').val(),
            filterType        : $('input[name="filterType"]:checked').val(),
            filterVegFlag     : $('input[name="filterVegFlag"]:checked').val()
            };

            $('#availableFoodsTable').DataTable().destroy();
            fillDatatable(filterValues);
        });

        $('#resetFilter').click(function () {
            $('#filterCountry').val('');
            $('#filterDistrict').val('');
            $('#filterState').val('');
            $('#filterExpTime').val('');
            $('#filterFoodCount').val('');
            $('input[type="radio"]').prop('checked', false); 

            $('#availableFoodsTable').DataTable().destroy();
            fillDatatable();
        });

      if(
        $('#filterDistrict option').length  == 1 &&
        $('#filterState option').length     == 1 &&
        $('#filterCountry option').length      == 1 
      ){

        $('#filterDistrict,#filterState,#filterCountry').append($("<option disabled>None</option>"));
      }


    });

</script>
@stop
