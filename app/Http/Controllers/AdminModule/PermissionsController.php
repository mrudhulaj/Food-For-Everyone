<?php

namespace App\Http\Controllers\AdminModule;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Auth;
use Request;
use Response;

class PermissionsController extends Controller
{
    public function adminPermissionsView(){
      Session::put('activeTab', 'PERMISSIONS');
      return view('admin/permissions/permissions');
    }

    public function adminPermissionsSave(){
      // $volOrUser    = Request::get('volOrUser');

      // return $AvailFoods   = (Request::get('createAvailFoods')) == 1 ? 1 : 0;
      // $Causes       = Request::get('createCauses');
      // $Volunteers   = Request::get('createVolunteers');
      // $Events       = Request::get('createEvents');
      // $ContactMsgs  = Request::get('createContactMsgs');
      
      $permissionsArray = [];

      for($i=1; $i<=3; $i++){

        if($i == 1){
          $action = "create";
        }
        elseif($i == 2){
          $action = "update";
        }
        else{
          $action = "delete";
        }

        $permissionsArray[$action."AvailFoods"]   = (Request::get($action."AvailFoods")) == 1 ? "Checked" : "Unchecked";
        $permissionsArray[$action."Causes"]       = (Request::get($action."Causes")) == 1 ? "Checked" : "Unchecked";
        $permissionsArray[$action."Volunteers"]   = (Request::get($action."Volunteers")) == 1 ? "Checked" : "Unchecked";
        $permissionsArray[$action."Events"]       = (Request::get($action."Events")) == 1 ? "Checked" : "Unchecked";
        $permissionsArray[$action."ContactMsgs"]  = (Request::get($action."ContactMsgs")) == 1 ? "Checked" : "Unchecked";
      }
      
      echo("<pre>".print_r($permissionsArray,true)."</pre>");

    }

}
