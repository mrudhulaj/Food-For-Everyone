@extends('templates.main')
<title>Permissions</title>
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
        width: 150px !important;
        left: 44% !important;
    }

    tr:nth-child(even) {
        background-color: transparent !important;
    }

    .checkbox-container {
        display: initial !important;
    }

</style>
@section('content')
<div class="container plr-0">
@include('templates.alertSuccessMessage')
<section class="events_section_area">
  <h2 id="cust-h2">
    <span class="custom-underline">
      Permissions
    </span>
  </h2>
</section>
    <div class="col-lg-12 plr-0">
        <form action="{{ route('adminPermissionsSave') }}" id="permissions">
          @csrf
            <div class="col-lg-12 plr-0">
                <div class="col-lg-6">
                    <div class="input-group">
                        <div class="p-t-10">
                          <label class="radio-container mr-30 ffe-font-heading" id="volunteerLabel" style="color: #3c354e;">Volunteer
                            <input type="hidden" name="USER" value="{{$user}}">
                              <a href="{{route('adminPermissionsView',["role" => "Volunteer"])}}">
                                <input type="radio" name="volOrUser" @if($user == "Volunteer") checked @endif value="Volunteer">
                                <span class="checkmark"></span>
                              </a> 
                            </label>
                            <label class="radio-container ffe-font-heading" id="userLabel" style="color: #3c354e;">User
                              <a href="{{route('adminPermissionsView',["role" => "User"])}}">
                                <input type="radio" name="volOrUser" value="User" @if($user == "User") checked @endif>
                                <span class="checkmark"></span>
                              </a>
                              </label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pright-0" style="text-align: right">
                    <button class="btn button-bg-green" style="padding: 0px;width: 130px;height: 40px" type="submit"
                        id="volOrUserSave">Save</button>
                </div>
            </div>
            <div class="col-lg-12 plr-0">
                <table class="table table-bordered" style="" id="availableFoodsTable">
                    <thead class="">
                        <tr>
                            <th>Actions</th>
                            <th>Available Foods</th>
                            <th>Causes</th>
                            <th>Events</th>
                            @if($user != 'User') 
                              <th>Volunteers</th>
                            @endif
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
                                    <input type="checkbox" class="createCheckbox" name="createAvailableFoods" id="" value="1"  @if($role->hasPermissionTo('create AvailableFoods')) checked @endif>
                                    <span class="checkmark-cust"></span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-container">
                                    <input type="checkbox" @if($role->hasPermissionTo('create Causes')) checked @endif class="createCheckbox" name="createCauses" id="" value="1">
                                    <span class="checkmark-cust"></span>
                                </label>
                            </td>
                            <td>
                              <label class="checkbox-container">
                                <input type="checkbox" @if($role->hasPermissionTo('create Events')) checked @endif class="createCheckbox" name="createEvents" id="" value="1">
                                <span class="checkmark-cust"></span>
                              </label>
                            </td>
                            @if($user != 'User') 
                              <td>
                                  <label class="checkbox-container">
                                      <input type="checkbox" @if($role->hasPermissionTo('create Volunteers')) checked @endif class="createCheckbox" name="createVolunteers" id="" value="1" @if($user == 'User') disabled @endif>
                                      <span class="checkmark-cust" @if($user == 'User') style="background-color: #b3b0b0 !important;" @endif></span>
                                  </label>
                              </td>
                            @endif
                            <td>
                                <label class="checkbox-container">
                                    <input type="checkbox" class="createCheckbox" name="createContactMessages" id="" value="1" @if($role->hasPermissionTo('create ContactMessages')) checked @endif>
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
                                    <input type="checkbox" @if($role->hasPermissionTo('update AvailableFoods')) checked @endif class="updateCheckbox" name="updateAvailableFoods" id="" value="1">
                                    <span class="checkmark-cust"></span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-container">
                                    <input type="checkbox" @if($role->hasPermissionTo('update Causes')) checked @endif class="updateCheckbox" name="updateCauses" id="" value="1">
                                    <span class="checkmark-cust"></span>
                                </label>
                            </td>
                            <td>
                              <label class="checkbox-container">
                                <input type="checkbox" @if($role->hasPermissionTo('update Events')) checked @endif class="updateCheckbox" name="updateEvents" id="" value="1">
                                <span class="checkmark-cust"></span>
                              </label>
                            </td>
                            @if($user != 'User') 
                              <td>
                                  <label class="checkbox-container">
                                      <input type="checkbox" @if($role->hasPermissionTo('update Volunteers')) checked @endif class="updateCheckbox" name="updateVolunteers" id="" value="1" disabled>
                                      <span class="checkmark-cust"  style="background-color: #b3b0b0 !important;"></span>
                                  </label>
                              </td>
                            @endif
                            <td>
                                <label class="checkbox-container">
                                    <input type="checkbox" class="updateCheckbox" name="updateContactMessages" id="" value="1" @if($role->hasPermissionTo('update ContactMessages')) checked @endif disabled>
                                    <span class="checkmark-cust"   style="background-color: #b3b0b0 !important;"></span>
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
                                    <input type="checkbox" @if($role->hasPermissionTo('delete AvailableFoods')) checked @endif class="deleteCheckbox" name="deleteAvailableFoods" id="" value="1">
                                    <span class="checkmark-cust"></span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-container">
                                    <input type="checkbox" @if($role->hasPermissionTo('delete Causes')) checked @endif class="deleteCheckbox" name="deleteCauses" id="" value="1">
                                    <span class="checkmark-cust"></span>
                                </label>
                            </td>
                            <td>
                              <label class="checkbox-container">
                                <input type="checkbox" @if($role->hasPermissionTo('delete Events')) checked @endif class="deleteCheckbox" name="deleteEvents" id="" value="1">
                                <span class="checkmark-cust"></span>
                              </label>
                            </td>
                            @if($user != 'User') 
                              <td>
                                  <label class="checkbox-container">
                                      <input type="checkbox" @if($role->hasPermissionTo('delete Volunteers')) checked @endif class="deleteCheckbox" name="deleteVolunteers" id="" value="1" disabled>
                                      <span class="checkmark-cust" style="background-color: #b3b0b0 !important;"></span>
                                  </label>
                              </td>
                            @endif
                            <td>
                                <label class="checkbox-container">
                                    <input type="checkbox" @if($role->hasPermissionTo('delete ContactMessages')) checked @endif class="deleteCheckbox" name="deleteContactMessages" id="" value="1" disabled>
                                    <span class="checkmark-cust" style="background-color: #b3b0b0 !important;"></span>
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
    // Check or Uncheck all categories permissions.
    $('.actionBtn').click(function () {
        let action = $(this).text().toLowerCase();
        let checkbox = "." + action + "Checkbox";

        if ($(checkbox).is(':checked')) {
            $(checkbox).prop('checked', false);
        } else {
            $(checkbox).prop('checked', true);
        }
    });

    $('#volunteerLabel').click(function () {
        window.location.href = "{{route('adminPermissionsView',['role' => 'Volunteer'])}}";
    });

    $('#userLabel').click(function () {
        window.location.href = "{{route('adminPermissionsView',['role' => 'User'])}}";
    });

</script>
@stop
