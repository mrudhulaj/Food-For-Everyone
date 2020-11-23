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

        $availableFoods = AvailableFoods::orderBy('CreatedDate','desc')->get();

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

    public function availableFoodListFilter() {
      $length         = 10;
      $customsearch   = Request::get('customsearch');
      return $length;
      if($customsearch['mode'] == 'Air'){ 
        $PickupChargesLocation = DB::table('rs-settings-airpickup-cost')
                                ->where(function($query)use($customsearch){ 
                                    if (isset($customsearch['cityName']) && $customsearch['cityName'] != null && $customsearch['cityName'] != "") {  
                                      $query->where('CityName',$customsearch['cityName']);
                                    }
                                    if(isset($customsearch['zipCode']) && $customsearch['zipCode'] != null && $customsearch['zipCode'] != "") {
                                      $query->where('ZipCode', $customsearch['zipCode']);
                                    } 
                                  })
                                  ->orderby('CityName','Asc')
                                  ->select([ 'AirPickupCostPID',
                                            'PickUpLocation',
                                            'ZipCode',
                                            'Commodity',
                                            'CityName'
                                            ])
                                  ->paginate($length)
                                  ->toArray();

        foreach($PickupChargesLocation['data'] as $key => $airPickupCharge) { 
          $PickupChargesLocation['data'][$key]->Action =(string)view('settings.pickUp.pickupLocationAction',['id' => $PickupChargesLocationID]);
        }

        $PickupChargesLocation['recordsTotal']    = $PickupChargesLocation['total'];
        $PickupChargesLocation['recordsFiltered'] = $PickupChargesLocation['total'];
        return $PickupChargesLocation;
      }

    }
}