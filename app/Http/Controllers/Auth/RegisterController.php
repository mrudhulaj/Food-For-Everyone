<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Roles;
use App\Models\Permissions;
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
        Roles::firstOrCreate(['name' => $rolesData]);
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
         Permissions::firstOrCreate(['name' => $permissionsData]);
       }

      //  To give all permissions to Admin for the first time only
      $adminExist = User::where('id',1)->where('FirstName','Admin')->first();
      if(!$adminExist){
        $permission['Action']   = ["create","update","delete"];
        $permission['Category'] = ["AvailableFoods","Causes","Volunteers","Events","ContactMessages"];
        $role                   = Roles::select('id')->where('name',"Admin")->first();
        foreach($permission['Category'] as $permissionCategory){
          foreach($permission['Action'] as $permissionAction){
              $permissionItem = Permissions::where('name',$permissionAction." ".$permissionCategory)->first();
              $role->givePermissionTo($permissionItem);
          }
        }
      }


      return Redirect::back()->with('status','User added successfully, please login to continue.');
    }

    public function checkEmailExist(){
      $emailExist = User::where('Email',Request::get('newEmail'))->get();
      $emailExists = count($emailExist)>0 ? true : false;

      return Response::json($emailExists);
    }
}
