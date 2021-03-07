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
use App\User;
use DB;

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
}
