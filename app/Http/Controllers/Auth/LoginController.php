<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    public function redirectTo(){

      // User type
      $type = Auth::user()->TypeOfAccount; 

      if($type == "Admin"){ 
        return '/admin-home';
      }
      else{
        return '/home';
      }
 
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request) {
      Auth::logout();
      Session::put('authenticated', 'false');
      return redirect()->route('home'); 
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
    */
    public function username()
    {
        return 'Email';
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
    */

    protected function validateLogin(Request $request)
    {
      $request->validate([
        $this->username() => 'required|string',
        'Password' => 'required|string',
      ]);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
    */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'Password');
    }

}
