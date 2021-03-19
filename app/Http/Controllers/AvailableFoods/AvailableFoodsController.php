<?php

namespace App\Http\Controllers\AvailableFoods;

use App\Http\Controllers\Controller;
use Session;
use App\Models\AvailableFoods;
use App\Models\LocationsCountry;
use Spatie\Permission\Models\Role;
use Request;
use DB;
use Response;
use DataTables;
use Auth;
use Illuminate\Support\Facades\Crypt;
use DateTime;

class AvailableFoodsController extends Controller
{

  public function availableFoodsView(){
    Session::put('activeTab', 'AVAILABLE FOODS');

    //Delete the foods where the expiry time specified by the user is over.
      // AvailableFoods::where('ExpiryTime', '<=', date('Y-m-d H:i:s'))->delete();

    $availableFoods        = AvailableFoods::orderBy('CreatedDate','desc')->get();

    // To get filter dropdown values from AvailableFoods table.
      $filterValues = [
        "City"     => AvailableFoods::select('City')->distinct()->get(),
        "Country"  => LocationsCountry::select('Country')->distinct()->get(),
        "State"    => AvailableFoods::select('State')->distinct()->get(),
        "District" => AvailableFoods::select('District')->distinct()->get(),
      ];

    // Check if user/volunteer can add food
      if(Auth::check()){
        $role                   = Role::select('id')->where('name',Auth::user()->TypeOfAccount)->first();
      }
      else{
        $role                 = false;
      }

    return view('availableFoods/availableFoods',compact('availableFoods','filterValues','role'));
  }

  public function addAvailableFoodsView(){
    $locationsCountry = LocationsCountry::all();
    return view('availableFoods/addAvailableFoods',compact('locationsCountry'));

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
    $availableFoods->Country          = Request::get('country');
    $availableFoods->City             = Request::get('city');
    $availableFoods->CreatedUser      = Auth::user()->FirstName." ".Auth::user()->LastName;
    $availableFoods->CreatedUserID    = Auth::user()->id;
    $availableFoods->CreatedDate      = date('Y-m-d H:i:s');
    $availableFoods->save();

    return redirect()->route('availableFoodsView')->with('status', 'Added Successfully!');
  }

  public function availableFoodListFilter() {
    $filterValues =  Request::get('filterValues');
    $data = DB::table('availableFoods')
                ->where(function($query)use($filterValues){ 

                    if (isset($filterValues['filterCountry']) && $filterValues['filterCountry'] != null && $filterValues['filterCountry'] != "") {  
                      $query->where('Country',$filterValues['filterCountry']);
                    }
                    
                    if(isset($filterValues['filterDistrict']) && $filterValues['filterDistrict'] != null && $filterValues['filterDistrict'] != "") {
                      $query->where('District', $filterValues['filterDistrict']);
                    }

                    if(isset($filterValues['filterState']) && $filterValues['filterState'] != null && $filterValues['filterState'] != "") {
                      $query->where('State', $filterValues['filterState']);
                    }

                    if(isset($filterValues['filterExpTime']) && $filterValues['filterExpTime'] != null && $filterValues['filterExpTime'] != "") {
                      $query->where('ExpiryTime','<=', date("Y-m-d H:i:s", strtotime('+'.$filterValues['filterExpTime'].' hours')));
                    }

                    if(isset($filterValues['filterType']) && $filterValues['filterType'] != null && $filterValues['filterType'] != "") {
                      $query->where('TypeOfDonation', $filterValues['filterType']);
                    }

                    if(isset($filterValues['filterFoodCount']) && $filterValues['filterFoodCount'] != null && $filterValues['filterFoodCount'] != "") {
                      $query->where('FoodCount','>=', $filterValues['filterFoodCount']);
                    }

                    if(isset($filterValues['filterVegFlag']) && $filterValues['filterVegFlag'] != null && $filterValues['filterVegFlag'] != "") {
                      $query->where('VegNonVeg', $filterValues['filterVegFlag']);
                    }

                  })
                  ->orderby('EditedDate','desc')
                  ->select('FirstName',
                    'LastName',
                    'TypeOfDonation',
                    'VegNonVeg',
                    'RestaurantName',
                    'Phone',
                    'District',
                    'State',
                    'City',
                    'Country',
                    'ExpiryTime',
                    'FoodCount',
                    'EditedDate'
                    )
                  ->get();

    foreach($data as $dataEach){

      $dataEach->Location   = $dataEach->City.", ".$dataEach->District.", ".$dataEach->State.", ".$dataEach->Country;
      $dataEach->AddedDate  = date('d-M-Y', strtotime($dataEach->EditedDate));
      $dataEach->ExpiryTime = date('h:i A', strtotime($dataEach->ExpiryTime));

      if($dataEach->RestaurantName == ""){
        $dataEach->RestaurantName = "Nil";
      }

    }

    return DataTables::of($data)->make(true);

  }

  public function editAvailableFoodsView(){

    $editAvailableFoods        = AvailableFoods::where('CreatedUserID',Auth::user()->id)->orderBy('CreatedDate','desc')->get();

    foreach($editAvailableFoods as $editAvailableFoodsData){

      $editAvailableFoodsData->Location   = $editAvailableFoodsData->City.", ".$editAvailableFoodsData->District.", ".$editAvailableFoodsData->State;
      $editAvailableFoodsData->AddedDate  = date('d-M-Y', strtotime($editAvailableFoodsData->EditedDate));
      $editAvailableFoodsData->ExpiryTime = date('h:i A', strtotime($editAvailableFoodsData->ExpiryTime));

      if($editAvailableFoodsData->RestaurantName == ""){
        $editAvailableFoodsData->RestaurantName = "Nil";
      }

    }

    // Check if user/volunteer can delete food
      if(Auth::check()){
        $role                   = Role::select('id')->where('name',Auth::user()->TypeOfAccount)->first();
      }
      else{
        $role                 = false;
      }

    return view('availableFoods/editAvailableFoodsView',compact('editAvailableFoods','role'));
  }

  public function editAvailableFoodsData(){
    $editAvailableFoods        = AvailableFoods::where('ID',Crypt::decrypt(Request::get('foodID')))->first();

    $createdDateTime    = strtotime($editAvailableFoods->EditedDate);
    $expiryDateTime     = strtotime($editAvailableFoods->ExpiryTime);
    $secs               = $expiryDateTime - $createdDateTime; // return sec in difference
    $expiryTime         = round($secs / 3600); // convert sec to hours



    return view('availableFoods/editAvailableFoodsData',compact('editAvailableFoods','expiryTime'));
  }

  public function editAvailableFoodsDataSave(){

    $editAvailableFoods                   = AvailableFoods::where('ID',Request::get('foodID'))->first();
    $editAvailableFoods->FirstName        = Request::get('firstName');
    $editAvailableFoods->LastName         = Request::get('lastName');
    $editAvailableFoods->foodCount        = Request::get('foodCount');
    $editAvailableFoods->expiryTime       = date("Y-m-d H:i:s", strtotime('+'.Request::get('expiryTime').' hours'));
    $editAvailableFoods->TypeOfDonation   = Request::get('typeofdonation');
    $editAvailableFoods->VegNonVeg        = Request::get('vegFlag');
    $editAvailableFoods->RestaurantName   = Request::get('restaurantName');
    $editAvailableFoods->Email            = Request::get('email');
    $editAvailableFoods->Phone            = Request::get('phone');
    $editAvailableFoods->District         = Request::get('district');
    $editAvailableFoods->State            = Request::get('state');
    $editAvailableFoods->City             = Request::get('city');
    $editAvailableFoods->CreatedUser      = Auth::user()->FirstName." ".Auth::user()->LastName;
    $editAvailableFoods->CreatedUserID    = Auth::user()->id;
    $editAvailableFoods->CreatedDate      = date('Y-m-d H:i:s');
    $editAvailableFoods->EditedUser      = Auth::user()->FirstName." ".Auth::user()->LastName;
    $editAvailableFoods->EditedUserID    = Auth::user()->id;
    $editAvailableFoods->EditedDate      = date('Y-m-d H:i:s');
    $editAvailableFoods->save();

    return redirect()->route('editAvailableFoodsView')->with('status', 'Updated Successfully!');
  }

  public function deleteAvailableFoodsData(){
    AvailableFoods::where('ID',Request::get('foodID'))->delete();
    Session::flash('status', 'Deleted Successfully!'); 
    return Response::json();
  }
  
    
}
