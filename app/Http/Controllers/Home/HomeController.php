<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function HomeView(){
        // return $user = Auth::user();
        Session::put('activeTab', 'HOME');
        return view('homePage/home');
    }
}
