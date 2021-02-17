<?php

namespace App\Http\Controllers\ContactUs;

use App\Http\Controllers\Controller;
use Session;
use App\Models\ContactUs;
use Request;
use Response;
use Auth;

class ContactUsController extends Controller
{
    public function contactUsView(){
        Session::put('activeTab', 'CONTACT');

        return view('contactUs/contactUs');
    }

    public function saveContactUs(){

      $contactUs                  = new ContactUs();
      $contactUs->FirstName       = Request::get('firstName');
      $contactUs->LastName        = Request::get('lastName');
      $contactUs->Email           = Request::get('email');
      $contactUs->Phone           = Request::get('phone');
      $contactUs->Message         = Request::get('message');
      $contactUs->CreatedDate     = date('Y-m-d H:i:s');
      $contactUs->EditedDate      = date('Y-m-d H:i:s');

      if(Auth::check()){
        $contactUs->RaisedTicket    = Request::get('raiseTicket');
        $contactUs->CreatedUser     = Auth::user()->FirstName." ".Auth::user()->LastName;
        $contactUs->CreatedUserID   = Auth::user()->id;
        $contactUs->EditedUser      = Auth::user()->FirstName." ".Auth::user()->LastName;
        $contactUs->EditedUserID    = Auth::user()->id;
      }
      
      $contactUs->save();

      return Response::json();
    }
}
