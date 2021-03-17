@extends('templates.main')
<title>Locations</title>
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
        width: 250px !important;
        left: 41% !important;
    }

    .odd:hover , .even:hover {
      background-color:#9cf19c;
      cursor: pointer;
    }

</style>
@section('content')
<section class="events_section_area">
    <h2 id="cust-h2">
      <span class="custom-underline">
        Locations
      </span>
    </h2>
</section>
<div class="container plr-0">
@include('templates.alertSuccessMessage')
    {{-- Begin:Filter Area --}}
    <div class="col-lg-12 plr-0 filter" style="margin-top: 30px;">
        <form class="form-inline" name="filterForm" id="filterForm">
            <div class="col-lg-12 pright-0" style="margin-bottom: 30px">
                <div class="col-lg-3 pright-0">
                  <div class="input-group" style="width: 100%;">
                    <label class="label ffe-font">State</label>
                    <select class="form-control input--style-4" style="" id="filterState" name="filterState">
                        <option value="" selected hidden>Select State</option>
                        {{-- @foreach ($filterValues['City'] as $values)
                         <option value="{{$values['City']}}">{{$values['City']}}</option>
                        @endforeach --}}
                    </select>
                  </div>
                </div>
                <div class="col-lg-3 pright-0">
                  <div class="input-group" style="width: 100%;">
                    <label class="label ffe-font">Country</label>
                    <select class="form-control input--style-4" style="" id="filterCountry" name="filterCountry">
                        <option value="" selected hidden>Select Country</option>
                        {{-- @foreach ($filterValues['City'] as $values)
                         <option value="{{$values['City']}}">{{$values['City']}}</option>
                        @endforeach --}}
                    </select>
                  </div>
                </div>
                <div class="col-lg-6 pright-0" style="padding-top: 28px;">
                    <div class="input-group col-lg-12">
                      <div class="col-lg-3 plr-0" style="float: right;text-align: right;">
                          <button class="btn button-bg-green" style="padding: 0px;width: 130px;height: 40px"
                              type="button" id="filterbtn">Filter</button>
                      </div>
                      <div class="col-lg-3 plr-0" style="float: right;text-align: right;">
                        <button class="btn button-bg-green" style="padding: 0px;width: 130px;height: 40px"
                        type="button" id="resetFilter">Reset</button>
                      </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- End:Filter Area --}}
    {{-- Begin:Table Area --}}
    <div class="col-lg-12 plr-0" style="margin-bottom: 10px">
      <div class="col-lg-3 plr-0" style="float: right;text-align: right;">
        <button class="btn button-bg-green" style="padding: 0px;width: 130px;height: 40px"
            type="button" id="filterbtn">
            <a href="{{route('adminLocationsAddView')}}" style="text-decoration: none !important;color: inherit;">Add Location</a>
          </button>
      </div>
    </div>

    <div style="margin-bottom: 50px">
        <table class="table" style="" id="locationTable">
            <thead class="table-striped">
                <tr>
                  <th scope="col">District</th>
                  <th scope="col">State</th>
                  <th scope="col">Country</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    {{-- End:Table Area --}}
</div>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script type="text/javascript" charset="utf8"
    src="{{ asset('vendor/datatables.net/js/jquery.dataTables.min.js') }}" defer>
</script>
<script>
    $(document).ready(function () {

        var filterValues = {
            filterTicketStatus        : $('input[name="ticketStatus"]:checked').val(),
            filterTicketSeverity      : $('input[name="ticketSeverity"]:checked').val()
            };

        var table;

        fillDatatable(filterValues);
        $('.dataTables_empty').html('No data available');
          function fillDatatable(filterValues) {
            var dataTable = $('#locationTable').DataTable({
                "oLanguage": {
                    "sEmptyTable": "No locations found"
                },
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('adminLocationsFilter') }}",
                    data: {
                      filterValues : filterValues
                    }
                },
                columns: [{
                        data: 'District',
                        name: 'District'
                    },
                    {
                        data: 'State',
                        name: 'State'
                    },
                    {
                        data: 'Country',
                        name: 'Country'
                    }
                ],
            });

        }


        $('#filterbtn').click(function () {
            var filterValues = {
            filterTicketStatus        : $('input[name="ticketStatus"]:checked').val(),
            filterTicketSeverity      : $('input[name="ticketSeverity"]:checked').val()
            };

            $('#locationTable').DataTable().destroy();
            console.log(filterValues);
            fillDatatable(filterValues);
            table = $('#locationTable').DataTable();

        });

        $('#resetFilter').click(function () {
            $("#ticketStatusRaised").prop("checked", true);
            $(".ticketSeverityDiv").removeClass('hide');

            $('#locationTable').DataTable().destroy();
            fillDatatable(filterValues);
        });

        // table = $('#locationTable').DataTable();

        // $('#locationTable tbody').on('click', 'tr', function () {
        //   var data                  = table.row( this ).data();
        //   var route                 = "{!! route('adminContactMessagesDetails',['ticketStatus' => 'ticketStatusData','ContactUsID' => 'ContactUsIDData','RaisedTicketsID' => 'RaisedTicketsIDData']) !!}";

        //   var mapObj = {
        //                 ticketStatusData    : data['TicketStatus'],
        //                 ContactUsIDData     : data['ContactUsID'],
        //                 RaisedTicketsIDData : data['RaisedTicketsID']
        //               };

        //   route = route.replace(/ticketStatusData|ContactUsIDData|RaisedTicketsIDData/gi, function(matched){
        //     return mapObj[matched];
        //   });

        //   window.location.href = route;

        // } );

    });

</script>
@stop
