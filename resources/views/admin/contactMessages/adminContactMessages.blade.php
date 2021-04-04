@extends('templates.main')
<title>Contact Messages</title>
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
        Contact Messages
      </span>
    </h2>
</section>
<div class="container plr-0">
@include('templates.alertSuccessOrErrorMessage')
    {{-- Begin:Filter Area --}}
    <div class="col-lg-12 plr-0 filter" style="margin-top: 30px;">
        <form class="form-inline" name="filterForm" id="filterForm">
            <div class="col-lg-12" style="margin-bottom: 30px">
                <div class="col-lg-3 pright-0">
                    <div class="input-group">
                        <label class="label ffe-font">Raised / Non-Raised</label>
                        <div class="p-t-10">
                            <label class="radio-container mr-30 ffe-font">Raised
                                <input type="radio" id="ticketStatusRaised" name="ticketStatus" value="1" checked>
                                <span class="checkmark"></span>
                            </label>
                            <label class="radio-container ffe-font">Non-Raised
                                <input type="radio" name="ticketStatus" value="0">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 pright-0">
                    <div class="input-group pendingOrReview">
                        <label class="label ffe-font">Status</label>
                        <div class="p-t-10">
                            <label class="radio-container mr-30 ffe-font">Pending
                                <input type="radio" id="pendingOrReview" name="pendingOrReview" value="0">
                                <span class="checkmark"></span>
                            </label>
                            <label class="radio-container ffe-font">Review
                                <input type="radio" name="pendingOrReview" value="1">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 pright-0">
                    <div class="input-group ticketSeverityDiv">
                        <label class="label ffe-font">Ticket Severity</label>
                        <div class="p-t-10">
                            <label class="radio-container mr-30 ffe-font">Low
                                <input type="radio" name="ticketSeverity" value="0">
                                <span class="checkmark"></span>
                            </label>
                            <label class="radio-container ffe-font mr-30">Medium
                                <input type="radio" name="ticketSeverity" value="1">
                                <span class="checkmark"></span>
                            </label>
                            <label class="radio-container ffe-font">High
                                <input type="radio" name="ticketSeverity" value="2">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 pright-0" style="padding-top: 28px;">
                    <div class="input-group col-lg-12">
                      <div class="col-lg-3">
                          <button class="btn button-bg-green" style="padding: 0px;width: 130px;height: 40px"
                              type="button" id="filterbtn">Filter</button>
                      </div>
                      <div class="col-lg-3" style="margin-left: 85px;">
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
    <div style="margin-bottom: 50px">
        <table class="table" style="width: 100% !important" id="contactMessageTable">
            <thead class="table-striped">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">User Type</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Severity</th>
                    <th scope="col">Status</th>
                    <th scope="col">Category</th>
                    <th scope="col">Category Details</th>
                    <th scope="col">Date</th>
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

      $("input[name='ticketStatus']").change(function () {
        let val = $('input[name="ticketStatus"]:checked').val();

        if (val == '1') {
            $(".ticketSeverityDiv,.pendingOrReview").removeClass('hide');
        } else {
            $(".ticketSeverityDiv,.pendingOrReview").addClass('hide');
        }

      });

        var filterValues = {
            filterTicketStatus        : $('input[name="ticketStatus"]:checked').val(),
            filterTicketSeverity      : $('input[name="ticketSeverity"]:checked').val(),
            filterPendingOrReview     : $('input[name="pendingOrReview"]:checked').val()
            };

        var table;

        fillDatatable(filterValues);
        $('.dataTables_empty').html('No data available');
          function fillDatatable(filterValues) {
            var dataTable = $('#contactMessageTable').DataTable({
                "oLanguage": {
                    "sEmptyTable": "No data found"
                },
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('adminContactMessagesFilter') }}",
                    data: {
                      filterValues : filterValues
                    }
                },
                columns: [{
                        data: 'Name',
                        name: 'Name'
                    },
                    {
                        data: 'UserType',
                        name: 'UserType'
                    },
                    {
                        data: 'Email',
                        name: 'Email'
                    },
                    {
                        data: 'Phone',
                        name: 'Phone'
                    },
                    {
                        data: 'Subject',
                        name: 'Subject'
                    },
                    {
                        data: 'Severity',
                        name: 'Severity',
                        "defaultContent": ""
                    },
                    {
                        data: 'Status',
                        name: 'Status',
                    },
                    {
                        data: 'Category',
                        name: 'Category',
                        "defaultContent": ""
                    },
                    {
                        data: 'CategoryDetails',
                        name: 'CategoryDetails',
                        "defaultContent": ""
                    },
                    {
                        data: 'Date',
                        name: 'Date'
                    }
                ],
                "columnDefs": [
                         {
                            'targets': [5],
                            'render': function (data, row){
                                var ticketStatus =$('input[name="ticketStatus"]:checked').val();
                                if(ticketStatus == "0"){
                                  $('td:nth-child(6),th:nth-child(6)').hide();
                                  $('td:nth-child(7),th:nth-child(7)').hide();
                                  $('td:nth-child(8),th:nth-child(8)').hide();
                                  $('td:nth-child(9),th:nth-child(9)').hide();
                                }
                                else{
                                  $('td:nth-child(6),th:nth-child(6)').show();
                                  $('td:nth-child(7),th:nth-child(7)').show();
                                  $('td:nth-child(8),th:nth-child(8)').show();
                                  $('td:nth-child(9),th:nth-child(9)').show();
                                }
                            }
                        },
                ],
                "rowCallback": function( row, data ) {
                  // Severity
                  if ( data.Severity == "Low" ) {
                    $('td:eq(5)', row).html( '<span style="color:green">Low</span>' );
                  }
                  else if(data.Severity == "Medium"){
                    $('td:eq(5)', row).html( '<span style="color:orange">Medium</span>' );
                  }
                  else if(data.Severity == "High"){
                    $('td:eq(5)', row).html( '<span style="color:red">High</span>' );
                  }

                  // Ticket Status
                  if ( data.Status == "0" ) {
                    $('td:eq(6)', row).html( '<span>Pending</span>' );
                  }
                  else if(data.Status == "1"){
                    $('td:eq(6)', row).html( '<span>Review</span>' );
                  }
                },
            });

        }


        $('#filterbtn').click(function () {
            var filterValues = {
            filterTicketStatus        : $('input[name="ticketStatus"]:checked').val(),
            filterTicketSeverity      : $('input[name="ticketSeverity"]:checked').val(),
            filterPendingOrReview     : $('input[name="pendingOrReview"]:checked').val()
            };

            $('#contactMessageTable').DataTable().destroy();
            fillDatatable(filterValues);
            table = $('#contactMessageTable').DataTable();

        });

        $('#resetFilter').click(function () {
            $("#ticketStatusRaised").prop("checked", true);
            $('input[name="pendingOrReview"]').prop('checked', false);
            $(".ticketSeverityDiv,.pendingOrReview").removeClass('hide');

            $('#contactMessageTable').DataTable().destroy();
            fillDatatable(filterValues);
        });

        table = $('#contactMessageTable').DataTable();

        $('#contactMessageTable tbody').on('click', 'tr', function () {
          var data                  = table.row( this ).data();
          var route                 = "{!! route('adminContactMessagesDetails',['ticketStatus' => 'ticketStatusData','ContactUsID' => 'ContactUsIDData','RaisedTicketsID' => 'RaisedTicketsIDData']) !!}";

          var mapObj = {
                        ticketStatusData    : data['TicketStatus'],
                        ContactUsIDData     : data['ContactUsID'],
                        RaisedTicketsIDData : data['RaisedTicketsID']
                      };

          route = route.replace(/ticketStatusData|ContactUsIDData|RaisedTicketsIDData/gi, function(matched){
            return mapObj[matched];
          });

          window.location.href = route;

        } );

    });

</script>
@stop
