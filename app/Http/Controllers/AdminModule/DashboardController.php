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
use DB;
use Request;
use Response;

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
      $dashboardCount['contactRaisedTickets']    = ContactUs::where('RaisedTicket', '1')
                                                  ->where('CreatedDate', '>', Carbon::now()->subDays(1))
                                                  ->count();

      return view('admin/dashboard/adminDashboard',compact('dashboardCount'));
    }

    public function adminMenuToggle(){
      $currentMenu = Request::get('currentMenu');
      Session::put('activeMenu', $currentMenu);

      return Response::json($currentMenu);
    }

    public function adminAccessError(){
      return view('templates/adminAccessErrorPage');
    }

    public function adminDashboardFilter(){
      $category   = Request::get('category');   // Table name of category
      $item       = Request::get('item');       // List item selected for filtering
      $filterType = Request::get('filterType'); // Type of filtering required

      switch ($filterType) {
        case "time":
          $data = DB::table($category)->where(function($query) use ($item) {
                                          if ($item == "Last 24h") {
                                            $query->where('CreatedDate', '>', Carbon::now()->subDays(1));
                                          }
                                          elseif ($item == "Last Month") {
                                            $query->whereMonth('CreatedDate', Carbon::now()->format('m'));
                                          }
                                          elseif ($item == "Last Year") {
                                            $query->whereYear('CreatedDate', Carbon::now()->format('Y'));
                                          }
                                        })->count();


        break;

        case "approval":
          $data = DB::table($category)->where(function($query) use ($item) {
                                        if ($item == "Total Pending") {
                                          $query->where('IsApproved', '0');
                                        }
                                        elseif ($item == "Total Approved") {
                                          $query->where('IsApproved', '1');
                                        }
                                        elseif ($item == "Total Rejected") {
                                          $query->where('IsApproved', '2');
                                        }
                                      })->count();

        break;

        case "tickets":
          $data = DB::table($category)->where(function($query) use ($item) {
                                        if ($item == "Total Raised Tickets (24h)") {
                                          $query->where('RaisedTicket', '1')
                                                ->where('CreatedDate', '>', Carbon::now()->subDays(1));
                                        }
                                        elseif ($item == "Total Non Raised Tickets (24h)") {
                                          $query->where('RaisedTicket', '0')
                                                ->where('CreatedDate', '>', Carbon::now()->subDays(1));
                                        }
                                        elseif ($item == "Total Raised Tickets") {
                                          $query->where('RaisedTicket', '1');
                                        }
                                        elseif ($item == "Total Non Raised Tickets") {
                                          $query->where('RaisedTicket', '0');
                                        }
                                        elseif ($item == "Total Pending Tickets") {
                                          $query->where('RaisedTicket', '1')
                                                ->where('TicketStatus', '0');
                                        }
                                        elseif ($item == "Total Reviewed Tickets") {
                                          $query->where('RaisedTicket', '1')
                                                ->where('TicketStatus', '1');
                                        }
                                        elseif ($item == "Total Resolved Tickets") {
                                          $query->where('RaisedTicket', '1')
                                                ->where('TicketStatus', '2');
                                        }
                                      })->count();

        break;
      }

      return Response::json($data);
    }
}
