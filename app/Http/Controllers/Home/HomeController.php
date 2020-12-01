<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function HomeView(){
      Auth::check() ? Session::put('user', Auth::user()->FirstName) : Session::put('user',"");
      Session::put('activeTab', 'HOME');
      return view('homePage/home');
    }

    public function adminHome(){
      Auth::check() ? Session::put('user', Auth::user()->FirstName) : Session::put('user',"");
      Session::put('activeTab', 'DASHBOARD');
      return view('admin/dashboard/adminDashboard');
    }
}
