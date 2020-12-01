@extends('templates.main')
<title>Admin Home</title>
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
        width: 160px !important;
        left: 44% !important;
    }

    tr:nth-child(even) {
        background-color: transparent !important;
        /* border: none !important; */
    }

    .checkbox-container {
        display: initial !important;
    }

</style>
@section('content')
<section class="events_section_area">
    <h2 id="cust-h2">
        Permissions
    </h2>
</section>
<div class="container plr-0">
    <div class="col-lg-12">
        <form action="{{ route('adminPermissionsSave') }}" id="permissions">
          @csrf
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <div class="input-group">
                        <div class="p-t-10">
                            <label class="radio-container mr-30 ffe-font-heading" style="color: #3c354e;">Volunteers
                                <input type="radio" name="volOrUser" checked value="volunteer">
                                <span class="checkmark"></span>
                            </label>
                            <label class="radio-container ffe-font-heading" style="color: #3c354e;">Users
                                <input type="radio" name="volOrUser" value="user">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pright-0" style="text-align: right">
                    <button class="btn button-bg-green" style="padding: 0px;width: 130px;height: 40px" type="submit"
                        id="volOrUserSave">Save</button>
                </div>
            </div>
            <div class="col-lg-12">
                <table class="table table-bordered" style="" id="availableFoodsTable">
                    <thead class="">
                        <tr>
                            <th>Actions</th>
                            <th>Available Foods</th>
                            <th>Causes</th>
                            <th>Volunteers</th>
                            <th>Events</th>
                            <th>Contacts Messages</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="javascript:void(0)" class="a-none actionBtn" data-toggle="tooltip"
                                    data-placement="top" title="Check/Uncheck all items.">Create</a>
                            </td>
                            <td>
                                <label class="checkbox-container">
                                    <input type="checkbox" class="createCheckbox" name="createAvailFoods" id="" value="1">
                                    <span class="checkmark-cust"></span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-container">
                                    <input type="checkbox" class="createCheckbox" name="createCauses" id="" value="1">
                                    <span class="checkmark-cust"></span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-container">
                                    <input type="checkbox" class="createCheckbox" name="createVolunteers" id="" value="1">
                                    <span class="checkmark-cust"></span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-container">
                                    <input type="checkbox" class="createCheckbox" name="createEvents" id="" value="1">
                                    <span class="checkmark-cust"></span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-container">
                                    <input type="checkbox" class="createCheckbox" name="createContactMsgs" id="" value="1">
                                    <span class="checkmark-cust"></span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="javascript:void(0)" class="actionBtn a-none" data-toggle="tooltip"
                                    data-placement="top" title="Check/Uncheck all items.">Update</a>
                            </td>
                            <td>
                                <label class="checkbox-container">
                                    <input type="checkbox" class="updateCheckbox" name="updateAvailFoods" id="" value="1">
                                    <span class="checkmark-cust"></span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-container">
                                    <input type="checkbox" class="updateCheckbox" name="updateCauses" id="" value="1">
                                    <span class="checkmark-cust"></span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-container">
                                    <input type="checkbox" class="updateCheckbox" name="updateVolunteers" id="" value="1">
                                    <span class="checkmark-cust"></span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-container">
                                    <input type="checkbox" class="updateCheckbox" name="updateEvents" id="" value="1">
                                    <span class="checkmark-cust"></span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-container">
                                    <input type="checkbox" class="updateCheckbox" name="updateContactMsgs" id="" value="1">
                                    <span class="checkmark-cust"></span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="javascript:void(0)" class="actionBtn a-none" data-toggle="tooltip"
                                    data-placement="top" title="Check/Uncheck all items.">Delete</a>
                            </td>
                            <td>
                                <label class="checkbox-container">
                                    <input type="checkbox" class="deleteCheckbox" name="deleteAvailFoods" id="" value="1">
                                    <span class="checkmark-cust"></span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-container">
                                    <input type="checkbox" class="deleteCheckbox" name="deleteCauses" id="" value="1">
                                    <span class="checkmark-cust"></span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-container">
                                    <input type="checkbox" class="deleteCheckbox" name="deleteVolunteers" id="" value="1">
                                    <span class="checkmark-cust"></span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-container">
                                    <input type="checkbox" class="deleteCheckbox" name="deleteEvents" id="" value="1">
                                    <span class="checkmark-cust"></span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-container">
                                    <input type="checkbox" class="deleteCheckbox" name="deleteContactMsgs" id="" value="1">
                                    <span class="checkmark-cust"></span>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script>
    // Check or Uncheck all pages permissions.
    $('.actionBtn').click(function () {
        let action = $(this).text().toLowerCase();
        let checkbox = "." + action + "Checkbox";

        if ($(checkbox).is(':checked')) {
            $(checkbox).prop('checked', false);
        } else {
            $(checkbox).prop('checked', true);
        }
    });

</script>
@stop
