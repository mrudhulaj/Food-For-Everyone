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

    #availableFoodsTable{
      width: auto !important;
    }

    .mr-30{
      margin-right: 30px !important;
    }

    .mr-10{
      margin-right: 10px !important;
    }

</style>
@section('content')
<div class="container">
    @include('templates.alertSuccessMessage')
    <section>
        <h2 style="margin-top: 0px;padding-left: 100px;">
            Waiting for you to pick up!
            <button class="btn button-bg-green" style="padding: 0px;width: 100px;height: 40px;float: right">
                <a class="a-none" href="{{ route('addAvailableFoodsView') }}">Add Food</a>
            </button>
        </h2>
        <p>Here we list out the food's contributed by our user's and partner's.We make sure that these items comply
            strictly with our standard terms and policies.
            <br> All the food's that is not collected within the user specified time is automatically deleted to
            avoid any complications.</p>
    </section>
    <div class="col-lg-12 plr-0 filter" style="margin-top: 30px;">

        <form class="form-inline">
          
          <div class="col-lg-12">
            <div class="col-lg-3 pright-0">
              <div class="input-group" style="width: 100%;">
                  <label class="label ffe-font">Location</label>
                  <select class="form-control input--style-4" style="" id="filterCity" name="filterCity">
                    <option value="" selected hidden>Select City</option>
                    <option value="Koduvally">Koduvally</option>
                    <option value="Kunnamangalam">Kunnamangalam</option>
                  </select>
              </div>
            </div>
            <div class="col-lg-3 pright-0">
              <div class="input-group" style="width: 100%;">
                  <label class="label ffe-font">&nbsp;</label>
                  <select class="form-control input--style-4" style="" id="filterDistrict" name="filterDistrict">
                    <option value="" selected hidden>Select District</option>
                    <option value="Calicut">Calicut</option>
                    <option value="Kannur">Kannur</option>                  
                  </select>
              </div>
            </div>
            <div class="col-lg-3 pright-0">
              <div class="input-group" style="width: 100%;">
                  <label class="label ffe-font">&nbsp;</label>
                  <select class="form-control input--style-4" style="" id="filterState" name="filterState">
                    <option value="" selected hidden>Select State</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>                 
                  </select>
              </div>
            </div>
            <div class="col-lg-3 pright-0">
              <div class="input-group">
                  <label class="label ffe-font">Expiry Time</label>
                  <select class="form-control input--style-4" style="" id="filterExpTime" name="filterExpTime">
                    <option value="" selected hidden>Select Time</option>
                    <option>Less than 1 hour</option>
                    <option>Less than 1 hour</option>           
                  </select>
              </div>
            </div>
          </div>
          <div class="col-lg-12" style="margin-bottom: 30px">

            <div class="col-lg-3 pright-0">
              <div class="input-group col-lg-12">
                <label class="label ffe-font">Food Count</label>
                <input class="input--style-4" type="text" name="filterFoodCount" id="filterFoodCount" value="">
              </div>
            </div>

            <div class="col-lg-3 pright-0">
              <div class="input-group">
                <label class="label ffe-font">Veg/Non-Veg</label>
                <div class="p-t-10">
                    <label class="radio-container mr-30 ffe-font">Vegeterian
                        <input type="radio" checked="checked" name="filterVegFlag" value="Veg">
                        <span class="checkmark"></span>
                    </label>
                    <label class="radio-container ffe-font">Non Vegeterian
                        <input type="radio" name="filterVegFlag" value="Non Veg">
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
                        <input type="radio" checked="checked" name="filterType" value="Veg">
                        <span class="checkmark"></span>
                    </label>
                    <label class="radio-container ffe-font">Event
                        <input type="radio" name="filterType" value="Non Veg">
                        <span class="checkmark"></span>
                    </label>
                </div>
             </div>
            </div>

            <div class="col-lg-3 pright-0" style="padding-top: 28px;">
              <div class="input-group col-lg-12">
                <div class="col-lg-6 plr-0">
                  <button class="btn button-bg-green" style="padding: 0px;width: 130px;height: 40px" type="button"
                  id="filterbtn">Filter</button>
                </div>
                <div class="col-lg-6 plr-0">
                  <button class="btn button-bg-green" style="padding: 0px;width: 130px;height: 40px" type="button"
                  id="resetFilter">Reset</button>
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
                    <th scope="col">Added Date & Time</th>
                    <th scope="col">Expiry Time</th>
                    <th scope="col">Food Count</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@include('templates.defaultModal',['title' => "Error!", 'message' => "Please provide any filters to search."])

<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script type="text/javascript" charset="utf8"
    src="{{ asset('vendor/datatables.net/js/jquery.dataTables.min.js') }}" defer>
</script>
<script>
    $(document).ready(function () {

        fillDatatable();

        function fillDatatable(filterCity='',filterDistrict='',filterState='',filterExpTime='',filterFoodCount='',filterVegFlag='',filterType='') {
            var dataTable = $('#availableFoodsTable').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('availableFoodListFilter') }}",
                    data: {
                      filterCity      :filterCity,            
                      filterDistrict  :filterDistrict,    
                      filterState     :filterState,          
                      filterExpTime   :filterExpTime,      
                      filterFoodCount :filterFoodCount,  
                      filterVegFlag   :filterVegFlag,      
                      filterType      :filterType         
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

            var filterCity        = $('#filterCity').val();
            var filterDistrict    = $('#filterDistrict').val();
            var filterState       = $('#filterState').val();
            var filterExpTime     = $('#filterExpTime').val();
            var filterFoodCount   = $('#filterFoodCount').val();
            var filterVegFlag     = $('#filterVegFlag').val();
            var filterType        = $('#filterType').val();

            if (
              filterCity      != '' ||
              filterDistrict  != '' ||
              filterState     != '' ||
              filterExpTime   != '' ||
              filterFoodCount != '' ||
              filterVegFlag   != '' ||
              filterType      != ''
              ){
                $('#availableFoodsTable').DataTable().destroy();
                fillDatatable(filterCity,filterDistrict,filterState,filterExpTime,filterFoodCount,filterVegFlag,filterType);
              } else {
                  jQuery.noConflict();
                  $('#defaultModal').modal('show');
              }
        });

        $('#resetFilter').click(function(){
            $('#filterCity').val('');
            $('#filterDistrict').val('');
            $('#filterState').val('');
            $('#filterExpTime').val('');
            $('#filterFoodCount').val('');
            $('#filterVegFlag').val('');
            $('#filterType').val('');

            $('#availableFoodsTable').DataTable().destroy();
            fillDatatable();
        });

    });

</script>
@stop
