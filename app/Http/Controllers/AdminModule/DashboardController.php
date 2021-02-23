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

class DashboardController extends Controller
{
    public function adminDashboardView(){
      Session::put('activeTab', 'DASHBOARD');

      $dashboardCount = array();

      // Last 24 hours Data
      $dashboardCount['donations']     = Donations::where('CreatedDate', '>', Carbon::now()->subDays(1))
                                                    ->count();
      $dashboardCount['availableFoods']= AvailableFoods::where('CreatedDate', '>', Carbon::now()->subDays(1))->count();

      // Total Pending Approvals
      $dashboardCount['causes']                  = Causes::where('IsApproved', '0')->count();
      $dashboardCount['volunteers']              = Volunteers::where('IsApproved', '0')->count();
      $dashboardCount['events']                  = Events::where('IsApproved', '0')->count();
      $dashboardCount['contactRaisedTickets']    = ContactUs::where('RaisedTicket', '1')->count();
      $dashboardCount['contactNonRaisedTickets'] = ContactUs::where('RaisedTicket', '0')
                                                    ->where('CreatedDate', '>', Carbon::now()->subDays(1))
                                                    ->count();

      return view('admin/dashboard/adminDashboard',compact('dashboardCount'));
    }
}
