<?php

namespace App\Http\Controllers\ContactUs;

use App\Http\Controllers\Controller;
use Session;

class ContactUsController extends Controller
{
    public function contactUsView(){
        Session::put('activeTab', 'CONTACT');
        return view('contactUs/contactUs');
    }
}
