@extends('templates.main')
<title>Reports</title>
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
        width: 125px !important;
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
    .report-heading{
      color: #034922
    }
    .report-heading:hover {
        color: #208f52 !important;
    }

    .main-table > tbody > tr > td{
      border: none !important;
    }

    .main-table > tbody > tr > td > div{
      margin-top: 70px;
      padding-right: 15px;
    }

    .txt-left{
      text-align: left !important;
    }
    

</style>
@section('content')
<div class="container plr-0">
    @include('templates.alertSuccessMessage')
    <section class="events_section_area">
        <h2 id="cust-h2">
            Reports
        </h2>
    </section>
</div>
<div class="container">
    <table class="table main-table" style="margin-bottom: 50px !important;">
        <tr>
            <td>
                <div class="" style="margin-top: 0px !important;">
                    <h5 class="ffe-font" style="text-align: left">
                        Donations
                    </h5>
                    <table class="table" style="" id="">
                        <thead class="table-striped">
                            <tr>
                                <th class="txt-left">Activity Name</th>
                                <th class="txt-left">Goal (₹)</th>
                                <th class="txt-left">Raised (₹)</th>
                                <th class="txt-left">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($donations as $donationsData)
                                <tr>
                                    <td class="txt-left">{{ $donationsData->ActivityName }}</td>
                                    <td class="txt-left">{{ number_format($donationsData->Goal) }}</td>
                                    <td class="txt-left">{{ number_format($donationsData->Raised) }}</td>
                                    <td class="txt-left">{{ $donationsData->Date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </td>
            <td>
                <div class="" style="margin-top: 0px !important;">
                    <h5 class="ffe-font" style="text-align: left">Foods Added</h5>
                    <table class="table" style="" id="">
                        <thead class="table-striped">
                            <tr>
                                <th class="txt-left">Food Count</th>
                                <th class="txt-left">Type</th>
                                <th class="txt-left">District</th>
                                <th class="txt-left">State</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($foodsAdded as $foodsAddedData)
                            <tr>
                              <td class="txt-left">
                                {{$foodsAddedData->FoodCount}}
                              </td>
                              <td class="txt-left">
                                {{$foodsAddedData->TypeOfDonation}}
                              </td>
                              <td class="txt-left">
                                {{$foodsAddedData->District}}
                              </td>
                              <td class="txt-left">
                                {{$foodsAddedData->State}}
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
        <tr>
          <td  class="txt-left">
            <a href="{{ route('reportsDonationView') }}" class="report-heading"
            style="text-decoration: none">See all</a>
          </td>
          <td class="txt-left">
            <a href="{{ route('reportsFoodsAddedView') }}" class="report-heading"
            style="text-decoration: none">See all</a>
          </td>
        </tr>
        <tr>
            <td>
                <div class="">
                    <h5 class="ffe-font" style="text-align: left">Causes</h5>
                    <table class="table" style="" id="">
                        <thead class="table-striped">
                            <tr>
                                <th class="txt-left">Name</th>
                                <th class="txt-left">Goal</th>
                                <th class="txt-left">Is Approved?</th>
                                <th class="txt-left">District</th>
                                <th class="txt-left">State</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($causes as $causesData)
                            <tr>
                              <td class="txt-left">
                                {{$causesData->CauseName}}
                              </td>
                              <td class="txt-left">
                                {{$causesData->ExpectedAmount}}
                              </td>
                              <td >
                                @if($causesData->IsApproved == '1')
                                  <i class="fa fa-check" aria-hidden="true" style="color: #00A348"></i>

                                @else
                                  <i class="fa fa-times" aria-hidden="true" style="color: red"></i>

                                @endif
                              </td>
                              <td class="txt-left">
                                {{$causesData->District}}
                              </td>
                              <td class="txt-left">
                                {{$causesData->State}}
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </td>
            <td>
                <div class="">
                    <h5 class="ffe-font" style="text-align: left">Volunteers</h5>
                    <table class="table" style="" id="">
                        <thead class="table-striped">
                            <tr>
                                <th class="txt-left">Name</th>
                                <th class="txt-left">Occupation</th>
                                <th >Status</th>
                                <th class="txt-left">District</th>
                                <th class="txt-left">State</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($volunteers as $volunteersData)
                            <tr>
                              <td class="txt-left">
                                {{$volunteersData->FirstName." ".$volunteersData->LastName}}
                              </td>
                              <td class="txt-left">
                                {{$volunteersData->Occupation}}
                              </td>
                              <td >
                                @if($volunteersData->IsApproved == '1')
                                <i class="fa fa-check" aria-hidden="true" style="color: #00A348"></i>
                                @else
                                  <i class="fa fa-times" aria-hidden="true" style="color: red"></i>
                                @endif
                              </td>
                              <td class="txt-left">
                                {{$volunteersData->District}}
                              </td>
                              <td class="txt-left">
                                {{$volunteersData->State}}
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
        <tr>
          <td  class="txt-left">
            <a href="{{ route('reportsCausesView') }}" class="report-heading"
            style="text-decoration: none">See all</a>
          </td>
          <td class="txt-left">
            <a href="{{ route('reportsVolunteersView') }}" class="report-heading"
            style="text-decoration: none">See all</a>
          </td>
        </tr>
        <tr>
            <td>
                <div class="">
                    <h5 class="ffe-font" style="text-align: left">Events</h5>
                    <table class="table" style="" id="">
                        <thead class="table-striped">
                            <tr>
                                <th class="txt-left">Name</th>
                                <th class="txt-left">Date</th>
                                <th class="txt-left">Is Approved?</th>
                                <th class="txt-left">District</th>
                                <th class="txt-left">State</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($events as $eventsData)
                            <tr>
                              <td class="txt-left">
                                {{$eventsData->EventName}}
                              </td>
                              <td class="txt-left">
                                {{date('d-M-Y', strtotime($eventsData->EditedDate))}}
                              </td>
                              <td>
                                @if($eventsData->IsApproved == '1')
                                <i class="fa fa-check" aria-hidden="true" style="color: #00A348"></i>
                                @else
                                  <i class="fa fa-times" aria-hidden="true" style="color: red"></i>
                                @endif
                              </td>
                              <td class="txt-left">
                                {{$eventsData->District}}
                              </td>
                              <td class="txt-left">
                                {{$eventsData->State}}
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </td>
            <td>
                <div class="">
                    <h5 class="ffe-font" style="text-align: left">Contact Messages</h5>
                    <table class="table" style="" id="">
                        <thead class="table-striped">
                            <tr>
                                <th class="txt-left">Subject</th>
                                <th class="txt-left">Raised Ticket</th>
                                <th class="txt-left">Ticket Status</th>
                                <th class="txt-left">User Type</th>
                                <th class="txt-left">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($contactMessages as $contactMessagesData)
                            <tr>
                              <td class="txt-left">
                                {{$contactMessagesData->Subject}}
                              </td>
                              <td>
                                @if($contactMessagesData->RaisedTicket == '1')
                                <i class="fa fa-check" aria-hidden="true" style="color: #00A348"></i>
                                @else
                                  <i class="fa fa-times" aria-hidden="true" style="color: red"></i>
                                @endif
                              </td>
                              <td class="txt-left">
                                @if ($contactMessagesData->TicketStatus == "0")
                                  <span>Pending</span>
                                @elseif($contactMessagesData->TicketStatus == "1")
                                  <span>Review</span>
                                @elseif($contactMessagesData->TicketStatus == "2")
                                  <span>Resolved</span>
                                @endif
                              </td>
                              <td class="txt-left">
                                {{$contactMessagesData->UserType}}
                              </td>
                              <td class="txt-left">
                                {{date('d-M-Y', strtotime($contactMessagesData->EditedDate))}}
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
        <tr>
          <td  class="txt-left">
            <a href="{{ route('reportsEventsView') }}" class="report-heading"
            style="text-decoration: none">See all</a>
          </td>
          <td class="txt-left">
            <a href="{{ route('reportsCausesView') }}" class="report-heading"
            style="text-decoration: none">See all</a>
          </td>
        </tr>
    </table>

</div>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script>

</script>
@stop
