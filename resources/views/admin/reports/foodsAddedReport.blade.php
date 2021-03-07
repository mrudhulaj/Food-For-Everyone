@extends('templates.main')
<title>Foods Added Report</title>
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
        width: auto !important;
        left: 45% !important;
    }

    tr:nth-child(even) {
        background-color: transparent !important;
    }

    .checkbox-container {
        display: initial !important;
    }

    .ffe-font {
        font-size: 20px !important;
    }

    table {
        margin-bottom: 0px !important;
    }

    .pagination > .active > span{
      z-index: 3;
      color: #fff;
      cursor: default;
      background-color: #00A348 !important;
      border-color: #00A348 !important;
    }

    .pagination > li > a{
      color: black !important;
    }

</style>
@section('content')
<div class="container plr-0">
    @include('templates.alertSuccessMessage')
    <section class="events_section_area">
        <h2 id="cust-h2">
            Foods Added Report
        </h2>
    </section>
</div>
<div class="container plr-0" style="margin-bottom: 50px">
    <table class="table" style="" id="">
        <thead class="table-striped">
            <tr>
                <th class="txt-left">Name</th>
                <th class="txt-left">Type Of Donation</th>
                <th class="txt-left">Food Count</th>
                <th class="txt-left">Non-Veg</th>
                <th class="txt-left">Restaurent Name</th>
                <th class="txt-left">Account Type</th>
                <th class="txt-left">Email</th>
                <th class="txt-left">Phone</th>
                <th class="txt-left">Location</th>
                <th class="txt-left">Added Time</th>
                <th class="txt-left">Expiry Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach($foodsAdded as $foodsAddedData)
                <tr>
                    <td class="txt-left">{{ $foodsAddedData->FirstName." ".$foodsAddedData->LastName }}</td>
                    <td class="txt-left">{{ $foodsAddedData->TypeOfDonation }}</td>
                    <td class="txt-left">{{ $foodsAddedData->FoodCount }}</td>
                    <td class="txt-left">
                      @if($foodsAddedData->VegNonVeg == 'Non-Veg')
                        <i class="fa fa-check" aria-hidden="true" style="color: #00A348"></i>
                      @else
                        <i class="fa fa-times" aria-hidden="true" style="color: red"></i>
                      @endif
                    </td>
                    <td class="txt-left">{{ $foodsAddedData->RestaurantName }}</td>
                    <td class="txt-left">{{ $foodsAddedData->AccountType }}</td>
                    <td class="txt-left">{{ $foodsAddedData->Email }}</td>
                    <td class="txt-left">{{ $foodsAddedData->Phone }}</td>
                    <td class="txt-left">{{ $foodsAddedData->City.",".$foodsAddedData->District.",".$foodsAddedData->State }}</td>
                    <td class="txt-left">{{ $foodsAddedData->AddedDate }}</td>
                    <td class="txt-left">{{ $foodsAddedData->ExpiryTime }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="text-align: right">
      {!! $foodsAdded->render() !!}
    </div>
</div>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script>
</script>
@stop
