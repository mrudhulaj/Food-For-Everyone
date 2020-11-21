@extends('templates.main')
<title>Add Cause</title>
<link
    href="{{ url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i') }}"
    rel="stylesheet">
<link href="{{ url('css/form.css') }}" rel="stylesheet" media="all">

<style>
    .wrapper section>h2::before {
        width: 150px !important;
        left: 44% !important;
    }

    .card {
        box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.5);
    }

    select {
        background: #fafafa !important;
        border-radius: 5px !important;
        color: #666 !important;
        height: 50px !important;
    }

    .modal-header {
        background-color: #00E660;
        color: black;
        font-weight: bold;
        border-radius: 13px 13px 0px 0px;
    }

</style>
@section('content')
<section>
    <h2 style="margin-top: 0px;">Add a cause</h2>
    {{--  <p></p>  --}}
</section>

<div class="page-wrapper p-b-100 font-poppins" style="padding-top: 50px">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <form action="{{ url('insert-donation') }}" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label ffe-font">First Name</label>
                                <input class="input--style-4" type="text" name="firstname" value="Qamr">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label ffe-font">Last name</label>
                                <input class="input--style-4" type="text" name="lastname" value="Abdullah">
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">

                        <div class="col-lg-12">
                            <div class="input-group">
                                <label class="label ffe-font">Type of Donation</label>
                                <div class="p-t-10">
                                    <label class="radio-container m-r-45 ffe-font">Event
                                        <input type="radio" checked="checked" name="typeofdonation" value="Event">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container ffe-font">Restaurent
                                        <input type="radio" name="typeofdonation" value="Restaurent">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-group col-lg-12 hide type-rest">
                        <label class="label ffe-font">Restaurent Name</label>
                        <input class="input--style-4" type="text" name="restaurent_name">
                    </div>
                    <div class="input-group col-lg-12">
                        <label class="label ffe-font">Phone</label>
                        <input class="input--style-4" type="text" name="phone">
                    </div>
                    <div class="row row-space" style="padding-right: 0px">
                        <div class="col-lg-6">
                            <div class="input-group col-lg-12">
                                <label class="label ffe-font">District</label>
                                <select class="form-control input--style-4" style="">
                                    <option>Select District</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group col-lg-12">
                                <label class="label ffe-font">State</label>
                                <select class="form-control input--style-4" style="">
                                    <option>Select District</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="" style="text-align: center;padding-top: 40px;">
                        <button type="button" id="submitbtn" data-toggle="modal" data-target="#confirmationModal"
                            class="btn button-bg-green" style="padding: 0px;width: 120px;height: 60px;">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Begin :Confirmation box --}}
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 13px;border: none">
            <div class="modal-header ffe-font">
                <h5 class="modal-title" id="confirmationModalLabel">Confirm your contribution
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
            <div class="modal-body col-lg-12 ffe-font" style="padding: 20px;">
                <p>By clicking the confirm button you hereby acknowledge that the food provided by you is safe and
                    edible and if any problem is to occur after it's consumption, you take full responsibilty of it.</p>
            </div>
            <div class="modal-footer">
                <button id="" type="submit" class="btn btn-primary button-bg-green"
                    style="padding: 6px 12px;border-radius: 4px;">
                    Confirm
                </button>
                <button id="" data-dismiss="modal" type="button" class="btn btn-secondary mdl-btn-cancel">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
{{-- End :Confirmation Box --}}
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script>
    $("input[name='typeofdonation']").change(function () {
        var type = $('input[name="typeofdonation"]:checked').val();

        if (type == 'Restaurent') {
            $(".type-rest").removeClass('hide');
        } else {
            $(".type-rest").addClass('hide');
        }

    });

</script>
@stop
