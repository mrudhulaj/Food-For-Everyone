<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Session;

class HomeController extends Controller
{
    public function HomeView(){
        Session::put('activeTab', 'HOME');
        return view('homePage/home');
    }
}
