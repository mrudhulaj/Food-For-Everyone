<?php

namespace App\Http\Controllers\Causes;

use App\Http\Controllers\Controller;
use Session;

class CausesDetailsController extends Controller
{
    public function causesDetailsView(){
        Session::put('activeTab', 'CAUSES');
        return view('causes/causesDetails');
    }
}
