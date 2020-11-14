<?php

namespace App\Http\Controllers\Volunteers;

use App\Http\Controllers\Controller;
use Session;

class VolunteersController extends Controller
{
    public function volunteersView(){
        Session::put('activeTab', 'VOLUNTEERS');
        return view('volunteers/volunteers');
    }
}
