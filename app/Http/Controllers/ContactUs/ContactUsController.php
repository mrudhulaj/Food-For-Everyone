<?php

namespace App\Http\Controllers\ContactUs;

use App\Http\Controllers\Controller;
use Session;
use App\Models\ContactUs;
use Request;
use Response;

class ContactUsController extends Controller
{
    public function contactUsView(){
        Session::put('activeTab', 'CONTACT');

        return view('contactUs/contactUs');
    }

    public function saveContactUs(){

      $contactUs               = new ContactUs();
      $contactUs->FirstName    = Request::get('firstName');
      $contactUs->LastName     = Request::get('lastName');
      $contactUs->Email        = Request::get('email');
      $contactUs->Phone        = Request::get('phone');
      $contactUs->Message      = Request::get('message');
      $contactUs->CreatedUser  = 'TestUser';
      $contactUs->CreatedDate  = date('Y-m-d H:i:s');
      $contactUs->save();

      return Response::json();
    }
}
