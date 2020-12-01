<?php

namespace App\Http\Controllers\AdminModule;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function adminDashboardView(){
      Session::put('activeTab', 'DASHBOARD');
      return view('admin/dashboard/adminDashboard');
    }
}
