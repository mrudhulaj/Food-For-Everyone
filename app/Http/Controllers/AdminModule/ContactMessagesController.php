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
      if( $filterValues['filterTicketStatus'] == "1"){
        $data = DB::table('contactUs')
                    ->join('raisedTickets','raisedTickets.ContactUsID','=','contactUs.ID')
                    ->where(function($query)use($filterValues){ 
    
                        if (isset($filterValues['filterTicketStatus']) && $filterValues['filterTicketStatus'] != null && $filterValues['filterTicketStatus'] != "") {  
                          $query->where('contactUs.RaisedTicket',$filterValues['filterTicketStatus']);
                        }
                        
                        if(isset($filterValues['filterTicketSeverity']) && $filterValues['filterTicketSeverity'] != null && $filterValues['filterTicketSeverity'] != "") {
                          $query->where('raisedTickets.Severity', $filterValues['filterTicketSeverity']);
                        }
    
                      })
                      ->where('contactUs.TicketStatus','=','1')
                      ->orderby('raisedTickets.Severity','desc')
                      ->select('contactUs.FirstName',
                        'contactUs.LastName',
                        'contactUs.ID as contactUsID',
                        'contactUs.CreatedUserID',
                        'contactUs.Email',
                        'contactUs.Phone',
                        'contactUs.Subject',
                        'raisedTickets.ID as raisedTicketsID',
                        'raisedTickets.Severity',
                        'raisedTickets.Category',
                        'raisedTickets.CategoryID',
                        'contactUs.EditedDate'
                        )
                      ->get();

        foreach($data as $dataEach){

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
      elseif($filterValues['filterTicketStatus'] == "0"){

        $data = DB::table('contactUs')
                    ->where(function($query)use($filterValues){ 
    
                        if (isset($filterValues['filterTicketStatus']) && $filterValues['filterTicketStatus'] != null && $filterValues['filterTicketStatus'] != "") {  
                          $query->where('RaisedTicket',$filterValues['filterTicketStatus']);
                        }
    
                      })
                      ->orderby('EditedDate','desc')
                      ->select('FirstName',
                        'LastName',
                        'CreatedUserID',
                        'Email',
                        'Phone',
                        'Subject',
                        'ID as contactUsID',
                        'EditedDate'
                        )
                      ->get();

        foreach($data as $dataEach){

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
}
