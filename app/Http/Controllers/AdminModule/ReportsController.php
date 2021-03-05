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

class ReportsController extends Controller
{
    public function adminReportsView(){
      Session::put('activeTab', 'REPORTS');
      
      // Donations
      // return $donations                        = Donations::orderby('CreatedDate','desc')->groupBy('CauseID')->take(10)->get();
      return $donations                        = Donations::groupBy('CauseID')->take(10)->get();
      // foreach($donations as $donationsData){
      //   $cause                          = Causes::where('ID',$donationsData->CauseID)->first();
      //   $donationsData->ActivityName    = $cause->CauseName;
      //   $donationsData->Goal            = $cause->ExpectedAmount;
      //   $donationsData->Raised          = $cause->RaisedAmount;
      //   $donationsData->Date            = date('d-M-Y', strtotime($donationsData->CreatedDate));
      // }

      return view('admin/reports/reports',compact('donations'));
    }
}
