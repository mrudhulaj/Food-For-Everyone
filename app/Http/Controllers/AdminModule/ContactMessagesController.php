<?php

namespace App\Http\Controllers\AdminModule;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\ContactUs;
use App\Models\Causes;
use App\Models\Events;
use App\Models\Volunteers;
use App\Models\AvailableFoods;
use App\Models\RaisedTickets;
use App\User;
use Request;
use DB;
use Response;
use DataTables;
use Illuminate\Support\Facades\Crypt;
use DateTime;

class ContactMessagesController extends Controller
{
    public function adminContactMessagesView(){
      Session::put('activeTab', 'CONTACTMESSAGES');

      return view('admin/contactMessages/adminContactMessages');
    }

    public function adminContactMessagesFilter() {
      $filterValues =  Request::get('filterValues');
      if( $filterValues['filterTicketStatus'] == "1"){ // Raised Tickets
        $data = DB::table('contactUs')
                    ->join('raisedTickets','raisedTickets.ContactUsID','=','contactUs.ID')
                    ->where(function($query)use($filterValues){ 
    
                        if (isset($filterValues['filterTicketStatus']) && $filterValues['filterTicketStatus'] != null && $filterValues['filterTicketStatus'] != "") {  
                          $query->where('contactUs.RaisedTicket',$filterValues['filterTicketStatus']);
                        }
                        
                        if(isset($filterValues['filterTicketSeverity']) && $filterValues['filterTicketSeverity'] != null && $filterValues['filterTicketSeverity'] != "") {
                          $query->where('raisedTickets.Severity', $filterValues['filterTicketSeverity']);
                        }

                        if(isset($filterValues['filterPendingOrReview']) && $filterValues['filterPendingOrReview'] != null && $filterValues['filterPendingOrReview'] != "") {
                          $query->where('contactUs.TicketStatus', $filterValues['filterPendingOrReview']);
                        }
    
                      })
                      ->where('contactUs.TicketStatus','!=',2)
                      ->orderby('raisedTickets.Severity','desc')
                      ->select('contactUs.FirstName',
                        'contactUs.LastName',
                        'contactUs.ID as ContactUsID',
                        'contactUs.CreatedUserID',
                        'contactUs.Email',
                        'contactUs.Phone',
                        'contactUs.Subject',
                        'contactUs.TicketStatus',
                        'raisedTickets.ID as RaisedTicketsID',
                        'raisedTickets.Severity',
                        'raisedTickets.Category',
                        'raisedTickets.CategoryID',
                        'contactUs.EditedDate'
                        )
                      ->get();
        foreach($data as $dataEach){

          // Name
          $dataEach->Name = $dataEach->FirstName." ".$dataEach->LastName;

          // Ticket Status
          $dataEach->Status = $dataEach->TicketStatus;

          // Type Of Account
          if($dataEach->CreatedUserID == null || $dataEach->CreatedUserID == ""  ){
            $dataEach->UserType = "Guest";
          }
          else{
            $userType             = User::where('id',$dataEach->CreatedUserID)->first();
            $dataEach->UserType   = $userType->TypeOfAccount;
          }

          // Severity
          if($dataEach->Severity == "0"){
            $dataEach->Severity = "Low";
          }
          elseif($dataEach->Severity == "1"){
            $dataEach->Severity = "Medium";
          }
          else{
            $dataEach->Severity = "High";
          }

          // Category Details
          if($dataEach->Category == "Causes"){
            $categoryData = Causes::where('ID',$dataEach->CategoryID)->first();
            $dataEach->CategoryDetails = $categoryData->CauseName;
          }
          elseif($dataEach->Category == "Events"){
            $categoryData = Events::where('ID',$dataEach->CategoryID)->first();
            $dataEach->CategoryDetails = $categoryData->EventName;
          }
          elseif($dataEach->Category == "Volunteers"){
            $categoryData = User::where('id',$dataEach->CategoryID)->first();
            $dataEach->CategoryDetails = $categoryData->FirstName." ".$categoryData->LastName;
          }
          elseif($dataEach->Category == "Available Foods"){
            $categoryData = AvailableFoods::where('ID',$dataEach->CategoryID)->first();
            $dataEach->CategoryDetails = date('j-n-Y h:i A', strtotime($categoryData->EditedDate));
          }

          // Date
          $dataEach->Date = date('j-n-Y h:i A', strtotime($categoryData->EditedDate));

          // Ticket Status
          $dataEach->TicketStatus = "Raised";
    
        }
      }
      elseif($filterValues['filterTicketStatus'] == "0"){ // Non-Raised Tickets

        $data = DB::table('contactUs')
                    ->where(function($query)use($filterValues){ 
    
                        if (isset($filterValues['filterTicketStatus']) && $filterValues['filterTicketStatus'] != null && $filterValues['filterTicketStatus'] != "") {  
                          $query->where('RaisedTicket',$filterValues['filterTicketStatus']);
                        }
    
                      })
                      ->where('TicketStatus',0)
                      ->orderby('EditedDate','desc')
                      ->select('FirstName',
                        'LastName',
                        'CreatedUserID',
                        'Email',
                        'TicketStatus',
                        'Phone',
                        'Subject',
                        'ID as ContactUsID',
                        'EditedDate'
                        )
                      ->get();

        foreach($data as $dataEach){

          // Name
          $dataEach->Name = $dataEach->FirstName." ".$dataEach->LastName;

          // Ticket Status
          $dataEach->Status = $dataEach->TicketStatus;

          // Type Of Account
          if($dataEach->CreatedUserID == null || $dataEach->CreatedUserID == ""  ){
            $dataEach->UserType = "Guest";
          }
          else{
            $userType             = User::where('id',$dataEach->CreatedUserID)->first();
            $dataEach->UserType   = $userType->TypeOfAccount;
          }

          // Date
          $dataEach->Date = date('j-n-Y h:i A', strtotime($dataEach->EditedDate));

          // Ticket Status
          $dataEach->TicketStatus = "Non-Raised";
    
        }

      }
  
      return DataTables::of($data)->make(true);
  
    }

    public function adminContactMessagesDetails(){

      $ticketStatus       = Request::get('ticketStatus');
      $contactUsID        = Request::get('ContactUsID');
      $raisedTicketsID    = Request::get('RaisedTicketsID');

      if($ticketStatus == "Raised"){
        $contactUsdata = DB::table('contactUs')
                ->join('raisedTickets','raisedTickets.ContactUsID','=','contactUs.ID')
                ->where('contactUs.ID','=',$contactUsID)
                ->first();

        $modelName    ='App\Models' . '\\' . str_replace(" ","",$contactUsdata->Category);
        if($contactUsdata->Category != "Volunteers"){
          $categoryData = $modelName::where('ID',$contactUsdata->CategoryID)->first();

          if($contactUsdata->Category == "Available Foods"){
            $categoryData = date('j-n-Y h:i A', strtotime($categoryData->EditedDate));
          }
          else if($contactUsdata->Category == "Causes"){
            $categoryData = $categoryData->CauseName;

          }
          else if($contactUsdata->Category == "Events"){
            $categoryData = $categoryData->EventName;
          }

        }
        else{
          $categoryData = $modelName::where('UserID',$contactUsdata->CategoryID)->first();
          $categoryData = $categoryData->FirstName." ".$categoryData->LastName;
        }

      }
      else{
        $contactUsdata = DB::table('contactUs')
                ->where('ID','=',$contactUsID)
                ->first();

        $categoryData = null;
      }

      return view('admin/contactMessages/adminContactMessagesDetails',compact('contactUsdata','ticketStatus','categoryData','raisedTicketsID','contactUsID'));
    }

    public function adminContactMessagesDetailsSave(){

      if(Request::get('raiseTicket') == 1){
        $contactUsData                      = ContactUs::where('ID',Request::get('contactUsID'))->first();
        $contactUsData->TicketStatus        = Request::get('status');
        $contactUsData->save();

        $raisedTicketsData                  = RaisedTickets::where('ID',Request::get('raisedTicketsID'))->first();
        $raisedTicketsData->TicketStatus    = Request::get('status');
        $raisedTicketsData->save();
      }
      else{
        $contactUsData                      = ContactUs::where('ID',Request::get('contactUsID'))->first();
        $contactUsData->TicketStatus        = Request::get('status');
        $contactUsData->save();
      }


      if(Request::get('status') == 1){
        $message = "Added to Review";
      }
      else{
        $message = "Added to Resolved";
      }

      return redirect()->route('adminContactMessagesView')->with('status', $message);

    }
}
