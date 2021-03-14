<?php

namespace App\Http\Controllers\AdminModule;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Auth;
use Request;
use Response;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function adminPermissionsView(){
      Session::put('activeTab', 'PERMISSIONS');
      $user   = Request::has("role") ? Request::get('role') : "Volunteer";
      $role   = Role::select('id')->where('name',$user)->first();

      return view('admin/permissions/permissions',compact('role','user'));
    }

    public function adminPermissionsSave(){
      $user   = Request::get('volOrUser');
      $role   = Role::select('id')->where('name',$user)->first();

      // Created an array for all possible combinations
      $permission['Action']   = ["create","update","delete"];
      $permission['Category'] = ["AvailableFoods","Causes","Volunteers","Events","ContactMessages"];

      // Iterate through each above created combination for each checkbox in blade
      foreach($permission['Category'] as $permissionCategory){
        foreach($permission['Action'] as $permissionAction){
          $permissionItem = Permission::where('name',$permissionAction." ".$permissionCategory)->first();

          // If checkbox checked, give permission only if it's not already existing.
          if(Request::get($permissionAction.$permissionCategory)){
            if( !($role->hasPermissionTo($permissionAction." ".$permissionCategory)) ){
              $role->givePermissionTo($permissionItem);
            }
          }
          // If checkbox unchecked, revoke permission only if permission exist.
          else{
            if( $role->hasPermissionTo($permissionAction." ".$permissionCategory) ){
              $role->revokePermissionTo($permissionItem);
            }
          }

        }
      }
      
      return redirect()->route('adminPermissionsView', ['user' => $user])->with('status', 'Permissions Updated Successfully!');
    }

}
