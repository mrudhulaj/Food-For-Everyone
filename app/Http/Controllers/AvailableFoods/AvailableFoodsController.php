<?php

namespace App\Http\Controllers\AvailableFoods;

use App\Http\Controllers\Controller;
use Session;
use App\Models\AvailableFoods;
use Request;
class AvailableFoodsController extends Controller
{

    public function availableFoodsView(){
        Session::put('activeTab', 'AVAILABLE FOODS');

        $availableFoods = AvailableFoods::all();

        return view('availableFoods/availableFoods',compact('availableFoods'));
    }

    public function addAvailableFoodsView(){
      return view('availableFoods/addAvailableFoods');
    }

    public function addAvailableFoodsSave(){

      $availableFoods                   = new AvailableFoods();
      $availableFoods->FirstName        = Request::get('firstName');
      $availableFoods->LastName         = Request::get('lastName');
      $availableFoods->TypeOfDonation   = Request::get('typeofdonation');
      $availableFoods->RestaurantName   = Request::get('restaurantName');
      $availableFoods->Email            = Request::get('email');
      $availableFoods->Phone            = Request::get('phone');
      $availableFoods->District         = Request::get('district');
      $availableFoods->State            = Request::get('state');
      $availableFoods->City             = Request::get('city');
      $availableFoods->CreatedUser      = 'TestUser';
      $availableFoods->CreatedDate      = date('Y-m-d H:i:s');
      $availableFoods->save();

      return redirect()->route('availableFoodsView')->with('status', 'Added Successfully!');
    }

}
