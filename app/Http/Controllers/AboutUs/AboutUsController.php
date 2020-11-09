<?php

namespace App\Http\Controllers\AboutUs;

use App\Http\Controllers\Controller;
use Session;

class AboutUsController extends Controller
{
    public function aboutUsView(){
        Session::put('activeTab', 'ABOUT US');
        return view('aboutUs/aboutUs');
    }
}
