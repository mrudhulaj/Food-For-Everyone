<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Events;
use App\Models\Causes;
use App\Models\Volunteers;
use App\Models\Donations;
use App\Models\AvailableFoods;

class HomeController extends Controller
{
    public function HomeView(){
      Session::put('activeTab', 'HOME');

      // Events
      $events                     = Events::where('IsApproved',1)->orderBy('CreatedDate','desc')->get();
      foreach($events as $eventsData){
        $eventsData->BeginTime    = date('h:i A', strtotime($eventsData->BeginTime));
        $eventsData->EndTime      = date('h:i A', strtotime($eventsData->EndTime));
      }
      $latestEvent                = Events::where('IsApproved',1)->orderBy('CreatedDate','desc')->first();

      // Causes
      $causes                     = Causes::where('IsApproved',1)->orderBy('CreatedDate','desc')->get();
      $latestCause                = Causes::where('IsApproved',1)->orderBy('CreatedDate','desc')->first();

      // Volunteers
      $volunteers                 = Volunteers::where('IsApproved',1)->orderBy('CreatedDate','desc')->get();

      // Count of Items
      $countItems                = [];
      $countItems['donations']   = Donations::count();
      $countItems['volunteers']  = count($volunteers);
      $countItems['events']      = count($events);
      $countItems['causes']      = count($causes);
      $countItems['food']        = AvailableFoods::sum('FoodCount');

      return view('homePage/home',compact('events','causes','volunteers','countItems','latestEvent','latestCause'));
    }

    public function adminDashboard(){
      Session::put('activeTab', 'DASHBOARD');
      return view('admin/dashboard/adminDashboard');
    }
}
