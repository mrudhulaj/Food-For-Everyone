<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
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

      return Redirect::back()->with('status','User added successfully, please login to continue.');
    }

    public function checkEmailExist(){
      $emailExist = User::where('Email',Request::get('newEmail'))->get();
      $emailExists = count($emailExist)>0 ? true : false;

      return Response::json($emailExists);
    }
}
