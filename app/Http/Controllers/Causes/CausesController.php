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

    public function causesDetailsView(){
      return view('causes/causesDetails');
    }

    public function addCauseView(){
      return view('causes/addCauseView');
    }
}
