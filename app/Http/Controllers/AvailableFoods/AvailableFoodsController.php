<?php

namespace App\Http\Controllers\AvailableFoods;

use App\Http\Controllers\Controller;
use Session;

class AvailableFoodsController extends Controller
{

    public function availableFoodsView(){
        Session::put('activeTab', 'AVAILABLE FOODS');
        return view('availableFoods/availableFoods');
    }

    public function ViewData(){
        $donations = Donations::all();
        return view('availablefoods.availablefoods')->with('donations',$donations);
    }
}
