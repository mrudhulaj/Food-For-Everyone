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
use App\Models\LocationsMain;
use DB;
use DataTables;

class LocationsController extends Controller
{
    public function adminLocationsView(){
      Session::put('activeTab', 'LOCATIONS');
      $locations          = LocationsMain::all();

      // Filter Options
      $locationsCountry   = LocationsCountry::all();
      $locationsState     = LocationsState::all();

      return view('admin/locations/adminViewLocations',compact('locations','locationsCountry','locationsState'));
    }

    public function adminLocationsAddView(){
      $locationCountry    = LocationsCountry::all();
      $locationState      = LocationsState::all();
      $locationDistrict   = LocationsDistrict::all();

      return view('admin/locations/adminAddLocations',compact('locationCountry','locationState','locationDistrict'));
    }

    public function adminLocationsFilter() {
      $filterValues   = Request::get('filterValues');
      $data           = DB::table('locationsMain')
                        ->where(function($query)use($filterValues){ 
                            if (isset($filterValues['filterCountry']) && $filterValues['filterCountry'] != null && $filterValues['filterCountry'] != "") {  
                              $query->where('CountryID',$filterValues['filterCountry']);
                            }

                            if (isset($filterValues['filterState']) && $filterValues['filterState'] != null && $filterValues['filterState'] != "") {  
                              $query->where('StateID',$filterValues['filterState']);
                            }
        
                          })
                          ->orderby('EditedDate','desc')
                          ->select('District',
                            'State',
                            'Country',
                            'CreatedDate',
                            )
                          ->get();

      foreach($data as $dataEach){
        $dataEach->CreatedDate  = date('d-M-Y', strtotime($dataEach->CreatedDate));
      }
  
      return DataTables::of($data)->make(true);
  
    }

    public function adminLocationsSpecificSave(){
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
        $newLocation->CountryID   = $countryID;
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

    // Common function accessed from all parts of the application wherever country/state/district is to be loaded.
    public function adminLocationsSpecificData(){

      $selectedID = Request::get('selectedID');

      switch (Request::get('selected')) {
        case "Country":
          $locationData                 = LocationsState::where('CountryID',$selectedID)
                                                        ->orderBy('CreatedDate','name')
                                                        ->get();
          break;
        case "State":
          $locationData                 = LocationsDistrict::where('StateID',$selectedID)
                                                          ->orderBy('CreatedDate','name')
                                                          ->get();
          break;
      }
      return Response::json($locationData);
    }

    public function adminLocationsAddSave(){
      // Check if location already exist or not
      $locationsMain = LocationsMain::where([
                                            ['CountryID', '=', Request::get('country')],
                                            ['StateID', '=', Request::get('state')],
                                            ['DistrictID', '=', Request::get('district')]
                                          ])->first();
      if(!empty($locationsMain)){
        return redirect()->route('adminLocationsView')->with('error-status', 'Location Already Exist!');
      }
      else{      
        $locationsMain                = new LocationsMain();
        $locationsMain->DistrictID    = Request::get('district');
        $locationsMain->StateID       = Request::get('state');
        $locationsMain->CountryID     = Request::get('country');

        $locationsMain->District      = LocationsDistrict::where('ID',Request::get('district'))->value('District');
        $locationsMain->State         = LocationsState::where('ID',Request::get('state'))->value('State');
        $locationsMain->Country       = LocationsCountry::where('ID',Request::get('country'))->value('Country');

        $locationsMain->CreatedUser   = Auth::user()->FirstName." ".Auth::user()->LastName;
        $locationsMain->CreatedUserID = Auth::user()->id;
        $locationsMain->CreatedDate   = date('Y-m-d H:i:s');
        $locationsMain->EditedUser    = Auth::user()->FirstName." ".Auth::user()->LastName;
        $locationsMain->EditedUserID  = Auth::user()->id;
        $locationsMain->EditedDate    = date('Y-m-d H:i:s');
        $locationsMain->save();

        return redirect()->route('adminLocationsView')->with('status', 'Location Added Successfully!');
      }

    }
}
