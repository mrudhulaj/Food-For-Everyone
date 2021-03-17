<?php

namespace App\Http\Controllers\AdminModule;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Auth;
use Request;
use Response;
use App\Models\LocationsCountry;
use App\Models\LocationsDistrict;
use App\Models\LocationsState;
use DB;
use DataTables;

class LocationsController extends Controller
{
    public function adminLocationsView(){
      Session::put('activeTab', 'LOCATIONS');
      $locations   = Locations::all();

      return view('admin/locations/adminViewLocations',compact('locations'));
    }

    public function adminLocationsAddView(){
      $locationCountry    = LocationsCountry::all();
      $locationState      = LocationsState::all();
      $locationDistrict   = LocationsDistrict::all();

      return view('admin/locations/adminAddLocations',compact('locationCountry','locationState','locationDistrict'));
    }

    public function adminLocationsFilter() {
      $filterValues   = Request::get('filterValues');
      $data           = DB::table('locations')
                        ->where(function($query)use($filterValues){ 
                            if (isset($filterValues['filterState']) && $filterValues['filterState'] != null && $filterValues['filterState'] != "") {  
                              $query->where('State',$filterValues['filterState']);
                            }
        
                          })
                          ->orderby('EditedDate','desc')
                          ->select('District',
                            'State',
                            'Country',
                            'ID',
                            )
                          ->get();
  
      return DataTables::of($data)->make(true);
  
    }

    public function adminLocationsAddSave(){
      $selected   = Request::get('selected');
      $value      = Request::get('value');
      $countryID  = Request::get('countryID');
      $stateID    = Request::get('stateID');

      if($selected == "Country"){
        $newLocation              = new LocationsCountry();
        $newLocation->Country     = ucfirst(strtolower($value));
      } 
      elseif($selected == "State"){
        $newLocation              = new LocationsState();
        $newLocation->State       = ucfirst(strtolower($value));
        $newLocation->CountryID    = $countryID;
      } 
      elseif($selected == "District"){
        $newLocation              = new LocationsDistrict();
        $newLocation->District    = ucfirst(strtolower($value));
        $newLocation->StateID     = $stateID;
      } 

      $newLocation->CreatedUser      = Auth::user()->FirstName." ".Auth::user()->LastName;
      $newLocation->CreatedUserID    = Auth::user()->id;
      $newLocation->CreatedDate      = date('Y-m-d H:i:s');
      $newLocation->EditedUser       = Auth::user()->FirstName." ".Auth::user()->LastName;
      $newLocation->EditedUserID     = Auth::user()->id;
      $newLocation->EditedDate       = date('Y-m-d H:i:s');
      $newLocation->save();

      $data               = [];
      $data['selected']   = $selected;
      $data['value']      = ucfirst(strtolower($value));
      $data['valueID']    = $newLocation->ID;

      return Response::json($data);
    }
}
