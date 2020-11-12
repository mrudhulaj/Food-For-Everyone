<?php

namespace App\Http\Controllers\Causes;

use App\Http\Controllers\Controller;
use Session;

class CausesController extends Controller
{
    public function causesView(){
        Session::put('activeTab', 'CAUSES');
        return view('causes/causes');
    }
}
