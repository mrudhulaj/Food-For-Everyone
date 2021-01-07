<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Events;
use App\Models\Causes;

class HomeController extends Controller
{
    public function HomeView(){
      Session::put('activeTab', 'HOME');

      // Events
      $events   = Events::where('IsApproved',1)->orderBy('CreatedDate','desc')->get();
      foreach($events as $eventsData){
        $eventsData->BeginTime = date('h:i A', strtotime($eventsData->BeginTime));
        $eventsData->EndTime = date('h:i A', strtotime($eventsData->EndTime));
      }

      // Causes
      $causes   = Causes::where('IsApproved',1)->orderBy('CreatedDate','desc')->get();

      return view('homePage/home',compact('events','causes'));
    }

    public function adminDashboard(){
      Session::put('activeTab', 'DASHBOARD');
      return view('admin/dashboard/adminDashboard');
    }
}
