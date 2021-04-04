<?php

namespace App\Http\Controllers\ContactUs;

use App\Http\Controllers\Controller;
use Session;
use App\Models\ContactUs;
use App\Models\AvailableFoods;
use App\Models\Events;
use App\Models\Causes;
use App\Models\Volunteers;
use App\Models\RaisedTickets;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Request;
use Response;
use Auth;

class ContactUsController extends Controller
{
    public function contactUsView(){
        Session::put('activeTab', 'CONTACT');

        $adminExist = User::where('id',1)->where('FirstName','Admin')->first();
        if(Auth::check()){
          $role   = Role::select('id')->where('name',Auth::user()->TypeOfAccount)->first();
        }else{
          // Normal user rule defined for guest users also for creating contact messages.
          if($adminExist){
            $role = Role::select('id')->where('name',"User")->first(); 
          }
          else{
            $role = "";
          }
        }

        return view('contactUs/contactUs',compact('role','adminExist'));
    }

    public function saveContactUs(){

      $contactUs                  = new ContactUs();
      $contactUs->FirstName       = Request::get('firstName');
      $contactUs->LastName        = Request::get('lastName');
      $contactUs->Email           = Request::get('email');
      $contactUs->Phone           = Request::get('phone');
      $contactUs->Message         = Request::get('message');
      $contactUs->Subject         = Request::get('subject');
      $contactUs->CreatedDate     = date('Y-m-d H:i:s');
      $contactUs->EditedDate      = date('Y-m-d H:i:s');

      if(Auth::check()){
        if( Request::get('raiseTicket') ){
          $contactUs->RaisedTicket        = Request::get('raiseTicket');
          $contactUs->TicketStatus        = 0;
        }
        $contactUs->CreatedUser     = Auth::user()->FirstName." ".Auth::user()->LastName;
        $contactUs->CreatedUserID   = Auth::user()->id;
        $contactUs->EditedUser      = Auth::user()->FirstName." ".Auth::user()->LastName;
        $contactUs->EditedUserID    = Auth::user()->id;
      }
      $contactUs->save();

      if(Auth::check()){
        if( Request::get('raiseTicket') ){
          if( Request::get('ticketCategory') != "" ){
            $raisedTickets                = new RaisedTickets();
            $raisedTickets->Category      = Request::get('ticketCategory');
            if( $raisedTickets->Category == "Volunteers" ){
              $raisedTickets->CategoryID    = Auth::user()->id;
            }
            else{
              $raisedTickets->CategoryID    = Request::get('ticketCategoryID');
            }
            $raisedTickets->ContactUsID   = $contactUs->ID;
            $raisedTickets->Severity      = Request::get('ticketSeverity');
            $raisedTickets->Message       = Request::get('message');
            $raisedTickets->Subject       = Request::get('subject');
            $raisedTickets->save();
          }
        }      
      }
      return Response::json();
  }

    public function contactUsTicketData(){

      switch (Request::get('ticketCategory')) {
        case "Available Foods":
          $ticketData                 = AvailableFoods::where('CreatedUserID',Auth::user()->id)
                                                        ->orderBy('CreatedDate','desc')
                                                        ->get();
          break;
        case "Causes":
          $ticketData                 = Causes::where('CreatedUserID',Auth::user()->id)
                                                ->where('IsApproved',0)
                                                ->orderBy('CreatedDate','desc')
                                                ->get();
          break;
        case "Volunteers":
          $ticketData                 = Volunteers::where('CreatedUserID',Auth::user()->id)
                                                ->where('IsApproved',0)
                                                ->orderBy('CreatedDate','desc')
                                                ->get();
          break;
        case "Events":
          $ticketData                 = Events::where('CreatedUserID',Auth::user()->id)
                                                ->where('IsApproved',0)
                                                ->orderBy('CreatedDate','desc')
                                                ->get();
          break;
      }
      return Response::json($ticketData);
    }
}
