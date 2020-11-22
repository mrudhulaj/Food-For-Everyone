@extends('templates.main')
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

    .input--style-4{
      height: 34px !important;
    }

    td,th{
      text-align: center !important;
    }

</style>
@section('content')
<div class="container">
  @include('templates.alertSuccessMessage')
    <section>
        <h2 style="margin-top: 0px;padding-left: 100px;">
            Waiting for you to pick up!
            <button class="btn button-bg-green" style="padding: 0px;width: 100px;height: 40px;float: right">
                <a class="a-none" href="{{ route('addAvailableFoodsView') }}">Contribute</a>
            </button>
        </h2>
        <p>Here we list out the food's contributed by our user's and partner's.We make sure that these items comply
            strictly with our standard terms and policies.
            <br> All the food's that is not collected within the user specified time is automatically deleted to
            avoid any complications.</p>
    </section>
    <div class="col-lg-12 plr-0 filter" style="margin-top: 30px;">

        <form class="form-inline">
            <div class="form-group">
                <label for="" class="">Location</label>
                <select class="form-control pr-20 input--style-4" style="width: 215px">
                    <option>Select District</option>
                </select>
                <select class="form-control pr-20 input--style-4" style="width: 215px">
                    <option>Select State</option>
                </select>
            </div>

            <div class="form-group">
                <label for="" class="pl-20">Time</label>
                <select class="form-control input--style-4" style="width: 188px">
                    <option>Less than 1 hour</option>
                </select>
            </div>

            <div class="form-group">
                <label for="" class="pl-20">Food Count</label>
                <input type="text" class="pl-20 form-control input--style-4" name="" id="" placeholder="Food Count"
                    style="width: 150px">
            </div>

            <div class="form-group">
                <input type="radio" name="vegFlag" id="nonVegFlag" checked>
                <label for="nonVegFlag" class="pl-20">Non Veg</label>
                <input type="radio" name="vegFlag" id="vegFlag">
                <label for="vegFlag" class="pl-20">Veg</label>
            </div>

            <div class="col-lg-12" style="text-align: center;margin-top: 20px;margin-bottom: 20px;">
                <button class="btn button-bg-green" style="padding: 0px;width: 100px;height: 40px"
                    type="submit">Filter</button>
            </div>

        </form>

    </div>

    <table class="table" style="margin-bottom: 50px;">
        <thead class="table-striped">
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Type</th>
                <th scope="col">Restaurent Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Location</th>
            </tr>
        </thead>
        <tbody>
          @foreach($availableFoods as $availableFoodsData)
            <tr>
              <td>{{$availableFoodsData->FirstName}}</td>
              <td>{{$availableFoodsData->LastName}}</td>
              <td>{{$availableFoodsData->TypeOfDonation}}</td>
              <td>
                @if($availableFoodsData->TypeOfDonation != 'Event')
                  {{$availableFoodsData->RestaurantName}}
                @else
                  Nil
                @endif
              </td>
              <td>+91 {{$availableFoodsData->Phone}}</td>
              <td>{{$availableFoodsData->City.", ".$availableFoodsData->District}}</td>
            </tr>
          @endforeach
        </tbody>
    </table>
</div>
@stop
