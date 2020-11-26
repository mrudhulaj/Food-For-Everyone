<?php

namespace App\Http\Controllers\AvailableFoods;

use App\Http\Controllers\Controller;
use Session;
use App\Models\AvailableFoods;
use Request;
use DB;
use Response;
use DataTables;

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
    $availableFoods->foodCount        = Request::get('foodCount');
    $availableFoods->expiryTime       = date("Y-m-d H:i:s", strtotime('+'.Request::get('expiryTime').' hours'));
    $availableFoods->TypeOfDonation   = Request::get('typeofdonation');
    $availableFoods->VegNonVeg        = Request::get('vegFlag');
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

    if( !empty( Request::get('filterDistrict') ) )
    {
      $data = DB::table('availableFoods')
              ->select('FirstName', 'LastName', 'TypeOfDonation', 'RestaurantName', 'Phone', 'District','State','City','EditedDate')
              ->where('District', Request::get('filterDistrict'))
              ->get();

                  // $PickupChargesLocation = DB::table('rs-settings-airpickup-cost')
                  //               ->where(function($query)use($customsearch){ 
                  //                   if (isset($customsearch['cityName']) && $customsearch['cityName'] != null && $customsearch['cityName'] != "") {  
                  //                     $query->where('CityName',$customsearch['cityName']);
                  //                   }
                  //                   if(isset($customsearch['zipCode']) && $customsearch['zipCode'] != null && $customsearch['zipCode'] != "") {
                  //                     $query->where('ZipCode', $customsearch['zipCode']);
                  //                   } 
                  //                 })
                  //                 ->orderby('CityName','Asc')
                  //                 ->select([ 'AirPickupCostPID',
                  //                           'PickUpLocation',
                  //                           'ZipCode',
                  //                           'Commodity',
                  //                           'CityName'
                  //                           ])
                  //                 ->paginate($length)
                  //                 ->toArray();
    }
    else
    {
      $data = DB::table('availableFoods')
            ->select('FirstName',
                    'LastName',
                    'TypeOfDonation',
                    'VegNonVeg',
                    'RestaurantName',
                    'Phone',
                    'District',
                    'State',
                    'City',
                    'ExpiryTime',
                    'FoodCount',
                    'EditedDate'
                    )
            ->get();

      foreach($data as $dataEach){

        $dataEach->Location   = $dataEach->City.", ".$dataEach->District.", ".$dataEach->State;
        $dataEach->AddedDate  = date('d-M-Y', strtotime($dataEach->EditedDate));
        $dataEach->ExpiryTime = date('h:i A', strtotime($dataEach->ExpiryTime));

        if($dataEach->RestaurantName == ""){
          $dataEach->RestaurantName = "Nil";
        }

      }
    }

    return DataTables::of($data)->make(true);

  }
    
}
