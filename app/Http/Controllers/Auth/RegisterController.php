<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Request;
use Redirect;
use Response;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register()
    {
      // Check if an admin exist for creating initial permissions later.
      $adminExist             = User::where('TypeOfAccount','Admin')->exists();

      $user                   = new User();
      $user->FirstName        = Request::get('firstName');
      $user->LastName         = Request::get('lastName');
      $user->Phone            = Request::get('phone');
      $user->TypeOfAccount    = Request::get('typeOfAccount');
      $user->Email            = Request::get('newEmail');
      $user->Password         = Hash::make(Request::get('newPassword'));
      $user->save();

      // To create new user roles for the first time only.
      $roles = ["Admin","Volunteer","User"];
      foreach($roles as $rolesData){
        Role::firstOrCreate(['name' => $rolesData]);
      }

       // To create new permissions for the first time only.

       $permissions = [
         "create AvailableFoods",
         "update AvailableFoods",
         "delete AvailableFoods",
         "create Causes",
         "update Causes",
         "delete Causes",
         "create Volunteers",
         "update Volunteers",
         "delete Volunteers",
         "create Events",
         "update Events",
         "delete Events",
         "create ContactMessages",
         "update ContactMessages",
         "delete ContactMessages",
      ];

       foreach($permissions as $permissionsData){
         Permission::firstOrCreate(['name' => $permissionsData]);
       }

      // Give initial permissions for diff types of account; first time only
      if(!$adminExist){
        //  To give all permissions to Admin for the first time only
        $permission['Action']   = ["create","update","delete"];
        $permission['Category'] = ["AvailableFoods","Causes","Events","Volunteers","ContactMessages"];
        $role                   = Role::select('id')->where('name',"Admin")->first();
        foreach($permission['Category'] as $permissionCategory){
          foreach($permission['Action'] as $permissionAction){
              $permissionItem = Permission::where('name',$permissionAction." ".$permissionCategory)->first();
              $role->givePermissionTo($permissionItem);
          }
        }

        //To give default permissions to User & Volunteer for the first time only
        $permission['Category'] = ["AvailableFoods","Causes","Events","ContactMessages"];
        
        for($i=1; $i<=2; $i++){ // Do it once each for Volunteer and User
          $name   = $i==1 ? "Volunteer" : "User";
          $role   = Role::select('id')->where('name',$name)->first();
          foreach($permission['Category'] as $permissionCategory){

            // Remove update and delete from $permission['Action'] for Contact Messages
            if($i==1 && $permissionCategory == "ContactMessages"){ // Volunteer->Contact Message only create
              $permission['Action']   = ["create"];
            }
            elseif($i==2 && $permissionCategory == "ContactMessages"){ // User->Contact Message only create
              $permission['Action']   = ["create"];
            }

            foreach($permission['Action'] as $permissionAction){
                $permissionItem = Permission::where('name',$permissionAction." ".$permissionCategory)->first();
                $role->givePermissionTo($permissionItem);
            }
          }
          //Reset $permission['Action'] to og after clearing update and delete for Volunteer->Contact Message
          $permission['Action']   = ["create","update","delete"]; 
        }
      }

      return Redirect::back()->with('status','User added successfully, please login to continue.');
    }

    public function checkEmailExist(){
      $emailExist = User::where('Email',Request::get('newEmail'))->get();
      $emailExists = count($emailExist)>0 ? true : false;

      return Response::json($emailExists);
    }

    public function checkAdminExist(){
      $adminExist  = User::where('TypeOfAccount','Admin')->get();
      $adminExists = count($adminExist)>0 ? true : false;

      return Response::json($adminExists);
    }
}
