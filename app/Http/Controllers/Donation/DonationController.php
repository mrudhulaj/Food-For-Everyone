<?php

namespace App\Http\Controllers\Donation;

use App\Http\Controllers\Controller;
use Request;
use App\Models\Donations;
use Auth;
use Response;

class DonationController extends Controller
{
    public function addDonation(){

      $donations                   = new Donations();
      $donations->FirstName        = Request::get('firstName');
      $donations->LastName         = Request::get('lastName');
      $donations->Amount           = Request::get('amount');
      $donations->Email            = Request::get('email');
      $donations->Phone            = Request::get('phone');
      $donations->CreatedUser      = Auth::user()->FirstName." ".Auth::user()->LastName;
      $donations->CreatedUserID    = Auth::user()->id;
      $donations->CreatedDate      = date('Y-m-d H:i:s');
      $donations->save();

      return Response::json();
    }

}
