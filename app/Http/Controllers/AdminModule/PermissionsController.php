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
      $role   = "Volunteer";
      $role   = Role::select('id')->where('name',$role)->first();

      Session::put('activeTab', 'PERMISSIONS');
      return view('admin/permissions/permissions',compact('role'));
    }

    public function adminPermissionsSave(){
      $role                   = Role::select('id')->where('name',Request::get('volOrUser'))->first();

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

      return redirect()->route('adminPermissionsView')->with('status', 'Permissions Updated Successfully!');
    }

    // public function adminPermissionValues(){
    //   $role         = Role::select('id')->where('name',Request::get('volOrUser'))->first();

    //   // Created an array for all possible combinations
    //   $permission['Action']   = ["create","update","delete"];
    //   $permission['Category'] = ["AvailableFoods","Causes","Volunteers","Events","ContactMessages"];

    //     // Iterate through each above created combination for each checkbox in blade
    //     foreach($permission['Category'] as $permissionCategory){
    //       foreach($permission['Action'] as $permissionAction){
  
    //       }
    //     }

    //   '<input type="checkbox" class="createCheckbox" name="createAvailableFoods" id="" value="1" @if($volunteer->hasPermissionTo("create AvailableFoods")) checked @endif>';

    //   return $role;
    // }

}
