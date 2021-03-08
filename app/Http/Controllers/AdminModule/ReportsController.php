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

}
