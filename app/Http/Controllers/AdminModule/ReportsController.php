<?php

namespace App\Http\Controllers\AdminModule;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Events;
use App\Models\Causes;
use App\Models\Volunteers;
use App\Models\Donations;
use App\Models\AvailableFoods;
use App\Models\ContactUs;
use App\Models\RejectedActivities;
use App\User;
use DB;
use Request;
use Response;

class ReportsController extends Controller
{
    public function adminReportsView(){
      Session::put('activeTab', 'REPORTS');
      
      // Donations
      $donations = DB::table('donations')
                    ->join('causes','causes.ID','=','donations.CauseID')
                    ->select('causes.CauseName as ActivityName',
                    'causes.ExpectedAmount as Goal',
                    'causes.RaisedAmount as Raised',
                    'causes.ID as CauseID',
                    )
                    ->groupBy('donations.CauseID')
                    ->take(10)
                    ->get();
      foreach($donations as $donationsData){
        $latestDonationDate                   = Donations::where('CauseID',$donationsData->CauseID)->first();
        $latestDonationDate                   = date('d-M-Y', strtotime($latestDonationDate->CreatedDate));
        $donationsData->Date                  = $latestDonationDate;
      }

      // Foods Added
      $foodsAdded = AvailableFoods::orderBy('EditedDate','desc')->take(10)->get();

      // Causes
      $causes = Causes::orderBy('EditedDate','desc')->take(10)->get();

      // Volunteers
      $volunteers = Volunteers::orderBy('EditedDate','desc')->take(10)->get();

      // Events
      $events = Events::orderBy('EditedDate','desc')->take(10)->get();

      // Contact Messages
      $contactMessages = ContactUs::orderBy('EditedDate','desc')->take(10)->get();

      foreach($contactMessages as $contactMessagesData){ // Type Of Account
        if($contactMessagesData->CreatedUserID == null || $contactMessagesData->CreatedUserID == ""  ){
          $contactMessagesData->UserType = "Guest";
        }
        else{
          $userType             = User::where('id',$contactMessagesData->CreatedUserID)->first();
          $contactMessagesData->UserType   = $userType->TypeOfAccount;
        }
      }
      return view('admin/reports/reports',compact('donations','foodsAdded','causes','volunteers','events','contactMessages'));
    }

    public function reportsDonationView(){
      $donations = DB::table('donations')
                  ->join('causes','causes.ID','=','donations.CauseID')
                  ->select('causes.CauseName as ActivityName',
                  'causes.ExpectedAmount as Goal',
                  'causes.RaisedAmount as Raised',
                  'causes.ID as CauseID',
                  'donations.FirstName as donationFirstName',
                  'donations.LastName as donationLastName',
                  'donations.Amount as donationAmount',
                  'donations.CreatedUserID as donationCreatedUserID',
                  )->paginate(10);

      foreach($donations as $donationsData){
        $latestDonationDate             = Donations::where('CauseID',$donationsData->CauseID)->first();
        $latestDonationDate             = date('d-M-Y', strtotime($latestDonationDate->CreatedDate));
        $donationsData->Date            = $latestDonationDate;

        if($donationsData->donationCreatedUserID != ""){
          $usertype                     = User::where('id',$donationsData->donationCreatedUserID)->first();
          $donationsData->AccountType   = $usertype->TypeOfAccount;
        }
        else{
          $donationsData->AccountType   = "Guest";
        }
      }

      return view('admin/reports/donationsReport',compact('donations'));
    }

    public function reportsFoodsAddedView(){
      $foodsAdded = AvailableFoods::orderBy('EditedDate','desc')->paginate(10);
      foreach($foodsAdded as $foodsAddedData){
        if($foodsAddedData->CreatedUserID != ""){
          $usertype                     = User::where('id',$foodsAddedData->CreatedUserID)->first();
          $foodsAddedData->AccountType  = $usertype->TypeOfAccount;
        }
          $foodsAddedData->AddedDate  = date('h:i A', strtotime($foodsAddedData->EditedDate));
          $foodsAddedData->ExpiryTime = date('h:i A', strtotime($foodsAddedData->ExpiryTime));

          if($foodsAddedData->RestaurantName == ""){
            $foodsAddedData->RestaurantName = "Nil";
          }
      }
      return view('admin/reports/foodsAddedReport',compact('foodsAdded'));
    }

    public function reportsCausesView(){
      $causes = Causes::orderBy('EditedDate','desc')->paginate(10);
      foreach($causes as $causesData){
          $causesData->Date  = date('d-M-Y', strtotime($causesData->EditedDate));
      }
      return view('admin/reports/causesReport',compact('causes'));
    }

    public function reportsCausesDetailsView(){
      $causeData = Causes::where('ID',Request::get('CauseID'))->first();
      if($causeData->ExpectedAmount != 0){
        $causeData->raisedAmountPercentage = round((($causeData->RaisedAmount/$causeData->ExpectedAmount)*100),2);
      }

      if($causeData->IsApproved == "2"){
        $rejectedReason = RejectedActivities::where('Activity','Causes')->where('ActivityID',Request::get('CauseID'))->first();
        $causeData->RejectedReason = $rejectedReason->Reason;
      }

      return view('admin/reports/causesReportDetails',compact('causeData'));
    }

    public function reportsVolunteersView(){
      $volunteers = Volunteers::orderBy('EditedDate','desc')->paginate(10);
      foreach($volunteers as $volunteersData){
          $volunteersData->Date  = date('d-M-Y', strtotime($volunteersData->CreatedDate));
      }
      return view('admin/reports/volunteersReport',compact('volunteers'));
    }

    public function reportsVolunteersDetailsView(){
      $volunteerData = Volunteers::where('ID',Request::get('VolunteerID'))->first();

      if($volunteerData->IsApproved == "2"){
        $rejectedReason = RejectedActivities::where('Activity','Volunteers')->where('ActivityID',Request::get('VolunteerID'))->first();
        $volunteerData->RejectedReason = $rejectedReason->Reason;
      }

      return view('admin/reports/volunteerReportDetails',compact('volunteerData'));
    }

    public function reportsEventsView(){
      $events                       = Events::orderBy('EditedDate','desc')->paginate(10);
      foreach($events as $eventsData){
          $eventsData->Date         = date('d-M-Y', strtotime($eventsData->CreatedDate));
          $eventsData->BeginTime    = date('h:i A , d-M-Y', strtotime($eventsData->BeginTime));
          $eventsData->EndTime      = date('h:i A , d-M-Y', strtotime($eventsData->EndTime));
      }
      return view('admin/reports/eventsReport',compact('events'));
    }

    public function reportsEventsDetailsView(){
      $eventData = Events::where('ID',Request::get('EventsID'))->first();

      if($eventData->IsApproved == "2"){
        $rejectedReason = RejectedActivities::where('Activity','Events')->where('ActivityID',Request::get('EventsID'))->first();
        $eventData->RejectedReason = $rejectedReason->Reason;
      }

      $eventData->BeginTime   = date('h:i A', strtotime($eventData->BeginTime));
      $eventData->EndTime     = date('h:i A', strtotime($eventData->EndTime));

      return view('admin/reports/eventReportDetails',compact('eventData'));
    }


    public function reportsContactMessagesView(){
      $contactMessages = ContactUs::orderBy('EditedDate','desc')->paginate(10);

      foreach($contactMessages as $contactMessagesData){
          $contactMessagesData->Date         = date('d-M-Y', strtotime($contactMessagesData->CreatedDate));
      }

      return view('admin/reports/contactMessagesReport',compact('contactMessages'));
    }

    public function reportsContactMessagesDetailsView(){
      $contactUsID        = Request::get('ContactUsID');
      $ticketStatus       = Request::get('ticketStatus');

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

      return view('admin/reports/contactMessagesDetailReport',compact('contactUsdata','ticketStatus','categoryData','contactUsID'));
    }

    public function deleteCategoryItem(){
      $category   = Request::get('category');
      $categoryID = Request::get("categoryItemID");

      if($category != "volunteers" && $category != "contactUs"){ 
        $delete = DB::table($category)
                      ->where('ID','=',$categoryID)
                      ->delete();
      }
      elseif($category == "volunteers"){
        $volunteers             = DB::table('volunteers')->where('ID','=',$categoryID)->first();
        $users                  = DB::table('users')->where('ID',$volunteers->UserID)->first();
        $users->TypeOfAccount   = "User";
        $delete                 = DB::table('volunteers')->where('ID','=',$categoryID)->delete();
      }
      elseif($category == "contactUs"){
        $contactUs              = DB::table('contactUs')->where('ID','=',$categoryID)->first();

        if($contactUs->RaisedTicket == "1"){
          $raisedTicket         = DB::table('raisedTickets')->where('ContactUsID','=',$contactUs->ID)->delete();
        }
        
        $delete                 = DB::table('contactUs')->where('ID','=',$categoryID)->delete();
      }

      return Response::json($delete);
    }

}
