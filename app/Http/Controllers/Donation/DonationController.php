<?php

namespace App\Http\Controllers\Donation;

use App\Http\Controllers\Controller;
use Request;
use App\Models\Donations;
use App\Models\Causes;
use Auth;
use Response;

class DonationController extends Controller
{
    public function addDonation(){

      $donations                   = new Donations();
      $donations->Firstname        = Request::get('firstName');
      $donations->Lastname         = Request::get('lastName');
      $donations->Amount           = Request::get('amount');
      $donations->CauseID          = Request::get('causeIdDonation');
      $donations->Email            = Request::get('email');
      $donations->Phone            = Request::get('phone');

      if(Auth::check()){
        $donations->CreatedUser      = Auth::user()->FirstName." ".Auth::user()->LastName;
        $donations->CreatedUserID    = Auth::user()->id;      
      }else{
        $donations->CreatedUser      = "Guest";
      }

      $donations->CreatedDate      = date('Y-m-d H:i:s');
      $donations->save();

      if(Request::get('causeIdDonation') != ""){
        $causes                         = Causes::where('ID',Request::get('causeIdDonation'))->first();
        $causes->RaisedAmount           = $causes->RaisedAmount + Request::get('amount');
        $causes->save();
      }

      return Response::json();
    }

}
