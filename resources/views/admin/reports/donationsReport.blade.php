@extends('templates.main')
<title>Donations Report</title>
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
            Donations Reports
        </h2>
    </section>
</div>
<div class="col-lg-12" style="text-align: right;margin-top: -90px;padding-right: 62px;">
  <button class="back-button"><a style="text-decoration: none;color: inherit !important;" href="{{ URL::previous() }}">Back</a></button>
</div>
<div class="container" style="margin-bottom: 50px">
    <table class="table" style="" id="">
        <thead class="table-striped">
            <tr>
                <th class="txt-left">Name</th>
                <th class="txt-left">Amount Donated (₹)</th>
                <th class="txt-left">Cause</th>
                <th class="txt-left">Cause Goal (₹)</th>
                <th class="txt-left">Account Type</th>
                <th class="txt-left">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($donations as $donationsData)
                <tr>
                    <td class="txt-left">{{ $donationsData->donationFirstName." ".$donationsData->donationLastName }}</td>
                    <td class="txt-left">{{ number_format($donationsData->donationAmount) }}</td>
                    <td class="txt-left">{{ $donationsData->ActivityName }}</td>
                    <td class="txt-left">{{ number_format($donationsData->Goal) }}</td>
                    <td class="txt-left">{{ $donationsData->AccountType }}</td>
                    <td class="txt-left">{{ $donationsData->Date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="text-align: right">
      {!! $donations->render() !!}
    </div>
</div>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script>
</script>
@stop
