@extends('templates.main')
<link href="{{ url('css/form.css') }}" rel="stylesheet" media="all">
<title>Edit Foods</title>
<style>
    .wrapper section>h2::before {
        width: 270px !important;
        left: 40% !important;
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

    .cust-btn{
      padding: 0px !important;
      width: 50px !important;
      height: 25px !important;
      font-size: 15px !important;
      background-color: #5b5b5b !important;
      border: none !important;
      color: white !important;
    }

</style>
@section('content')
<div class="container">
    @include('templates.alertSuccessMessage')
    <section style="margin-bottom: 50px">
        <h2 style="margin-top: 0px;padding-left: 130px;">
            Edit your contributions
            <button class="btn button-bg-green" style="padding: 0px;width: 110px;height: 40px;float: right">
              <a class="a-none" href="{{route('availableFoodsView')}}">Back</a>
            </button>
        </h2>
        <p>Here you can edit or delete the food's you have added.</p>
    </section>

    <div style="margin-bottom: 50px">
        <table class="table" style="" id="">
            <thead class="table-striped">
                <tr>
                    <th>Restaurent / Event</th>
                    <th>Restaurent Name</th>
                    <th>Veg / Non Veg</th>
                    <th>Phone</th>
                    <th>Location</th>
                    <th>Added Date</th>
                    <th>Expiry Time</th>
                    <th>Food Count</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
              @if(count($editAvailableFoods)== 0)
                <tr >
                  <td colspan="9">
                    <p style="margin-top: 20px"><b>You have not added any item to edit.</b></p>
                  </td>
                </tr>
              @endif
              @foreach($editAvailableFoods as $editAvailableFoodsData)
                <tr>
                    <td>{{$editAvailableFoodsData->TypeOfDonation}}</td>
                    <td>{{$editAvailableFoodsData->RestaurantName}}</td>
                    <td>{{$editAvailableFoodsData->VegNonVeg}}</td>
                    <td>{{$editAvailableFoodsData->Phone}}</td>
                    <td>{{$editAvailableFoodsData->Location}}</td>
                    <td>{{$editAvailableFoodsData->AddedDate}}</td>
                    <td>{{$editAvailableFoodsData->ExpiryTime}}</td>
                    <td>{{$editAvailableFoodsData->FoodCount}}</td>
                    <td>
                      <button class="btn button-bg-green cust-btn">
                        <a class="a-none" href="{{route('editAvailableFoodsData',["foodID" => Crypt::encrypt($editAvailableFoodsData->ID)])}}">Edit</a>
                      </button>    
                      
                      <button class="btn button-bg-green cust-btn" id="deleteFoodBtn" style="background-color: #c13131 !important;width: 55px !important;" data-value="{{$editAvailableFoodsData->ID}}" data-toggle="modal"
                        data-target="#deleteModal">
                        Delete
                      </button>  
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 13px;border: none">
            <div class="modal-header ffe-font">
                <h5 class="modal-title" id="deleteModalLabel">Confirm
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
            <div class="modal-body col-lg-12 ffe-font" style="padding: 20px;">
                <p class="ffe-font">Are you sure you want to delete this item?</p>
            </div>
            <div class="modal-footer">
              <button id="confirmForm" type="button" class="btn btn-primary button-bg-green"
                    style="padding: 6px 12px;border-radius: 4px;" data-dismiss="modal">
                    Confirm
                </button>
                <button id="" data-dismiss="modal" type="button" class="btn btn-secondary mdl-btn-cancel">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script>
  var foodID;
   $('#deleteFoodBtn').click(function () {
     foodID = $(this).attr("data-value");
    });

    $('#confirmForm').click(function () {
      $.ajax({
            url:'{{ route("deleteAvailableFoodsData") }}',
            type:'GET',
            data:{
                foodID   : foodID,
            },
            success:function(data) {
              location.reload();
            }
      });
    });
</script>
@stop
