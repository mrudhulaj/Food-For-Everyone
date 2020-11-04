<?php

namespace App\Http\Controllers;

use App\Donations;
use Illuminate\Http\Request;

class AvailableFoodsController extends Controller
{
    public function ViewData(){
        $donations = Donations::all();
        return view('availablefoods.availablefoods')->with('donations',$donations);
    }
}
