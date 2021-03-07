<?php

namespace App\Http\Controllers\AdminModule\Reports;

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

class DonationReportsController extends Controller
{
    public function reportsDonationView(){
      // Donations
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

      return view('admin/reports/donationsReports',compact('donations'));
    }
}
