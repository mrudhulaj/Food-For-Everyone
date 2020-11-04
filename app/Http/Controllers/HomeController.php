<?php

namespace App\Http\Controllers;

use App\Donations;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function HomeView(){
        return view('homePage/home');
    }
}
