<?php

namespace App\Http\Controllers\Causes;

use App\Http\Controllers\Controller;
use Session;
use App\Models\Causes;
use App\Models\LocationsState;
use App\Models\LocationsCountry;
use App\Models\LocationsMain;
use App\Models\LocationsDistrict;
use Request;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use CommonFunctions;
use Response;

class CausesController extends Controller
{
    public function causesView(){
      Session::put('activeTab', 'CAUSES');
      if(Auth::check()){
        $role   = Role::select('id')->where('name',Auth::user()->TypeOfAccount)->first();
      }else{
        $role = "";
      }

      $causes   = Causes::where('IsApproved',1)->orderBy('CreatedDate','desc')->get();
      foreach($causes as $causeData){
        if($causeData->ExpectedAmount != 0){
          $causeData->raisedAmountPercentage = round((($causeData->RaisedAmount/$causeData->ExpectedAmount)*100),2);
        }
      }

      $saved    = Request::has('saved') ? Request::get('saved') : 0;
    
      return view('causes/causes',compact('causes','role','saved'));
    }

    public function causesDetailsView(){
      Session::put('activeTab', 'CAUSES');
      $causeID    = Crypt::decrypt(Request::get('causeID'));
      $causeData  = Causes::where('ID',$causeID)->first();
      if($causeData->ExpectedAmount != 0){
        $causeData->raisedAmountPercentage = round((($causeData->RaisedAmount/$causeData->ExpectedAmount)*100),2);
      }
      $countryName = CommonFunctions::countryName($causeData->CreatedUserID);
      return view('causes/causesDetails',compact('causeData','countryName'));
    }

    public function addCauseView(){
      $locationsCountry = LocationsMain::select('Country','CountryID')->distinct()->get();
      return view('causes/addCauseView',compact('locationsCountry'));
    }

    public function addCauseSave(){
      $causes                         = new Causes();
      $causes->CauseName              = Request::get('causeName');
      $causes->CauseLongDescription   = Request::get('causeLongDescription');
      $causes->CauseShortDescription  = Request::get('causeShortDescription');
      $causes->ExpectedAmount         = Request::get('expectedAmount');
      $causes->Email                  = Request::get('email');
      $causes->Phone                  = Request::get('phone');
      $causes->Landmark               = Request::get('landmark');
      $causes->CountryID              = Request::get('country');
      $causes->StateID                = Request::get('state');
      $causes->DistrictID             = Request::get('district');
      $causes->Country                = LocationsCountry::where('ID',Request::get('country'))->value('Country');
      $causes->State                  = LocationsState::where('ID',Request::get('state'))->value('State');
      $causes->District               = LocationsDistrict::where('ID',Request::get('district'))->value('District');
      $causes->City                   = Request::get('city');
      $causes->IsApproved             = 0;
      $causes->CreatedUser            = Auth::user()->FirstName." ".Auth::user()->LastName;
      $causes->CreatedUserID          = Auth::user()->id;
      $causes->CreatedDate            = date('Y-m-d H:i:s');
      $causes->EditedUser             = Auth::user()->FirstName." ".Auth::user()->LastName;
      $causes->EditedUserID           = Auth::user()->id;
      $causes->EditedDate             = date('Y-m-d H:i:s');
  
      if (Request::hasFile('causeImage')) {
        $file             = Request::file('causeImage');
        $extension        = $file->getClientOriginalExtension();
        $savedFileName    = date('d-m-Y H-i-s') . '.' . $extension;
        $destinationPath  = public_path().'/SavedImages/Causes/' ;
        $file->move($destinationPath,$savedFileName);

        $causes->image    = 'SavedImages/Causes/'.$savedFileName ;
      }

      $causes->save();
      return redirect()->route('causesView',['saved' => '1']);
    }

  public function editCauseView(){
    $causes        = Causes::where('CreatedUserID',Auth::user()->id)
                            ->where('IsApproved',0)
                            ->orderBy('CreatedDate','desc')
                            ->get();

    if(Auth::check()){
      $role   = Role::select('id')->where('name',Auth::user()->TypeOfAccount)->first();
    }else{
      $role = "";
    }

    return view('causes/editCauseView',compact('causes','role'));
  }

  public function editCauseData(){
    $editCause        = Causes::where('ID',Crypt::decrypt(Request::get('foodID')))->first();
    $countryID        = LocationsCountry::where('Country',$editCause->Country)->value('ID');
    $locationsState   = LocationsState::where('CountryID',$countryID)->get();
    $locationsCountry = LocationsMain::select('Country','CountryID')->distinct()->get();
    $locationsDistrict= LocationsDistrict::where('StateID',$editCause->StateID)->get();
    return view('causes/editCauseData',compact('editCause','locationsState','locationsCountry','locationsDistrict'));
  }

  public function editCauseDataSave(){

    $causes                         = Causes::where('ID',Request::get('causeID'))->first();
    $causes->CauseName              = Request::get('causeName');
    $causes->CauseLongDescription   = Request::get('causeLongDescription');
    $causes->CauseShortDescription  = Request::get('causeShortDescription');
    $causes->ExpectedAmount         = Request::get('expectedAmount');
    $causes->Email                  = Request::get('email');
    $causes->Phone                  = Request::get('phone');
    $causes->Landmark               = Request::get('landmark');
    $causes->CountryID              = Request::get('country');
    $causes->StateID                = Request::get('state');
    $causes->DistrictID             = Request::get('district');
    $causes->Country                = LocationsCountry::where('ID',Request::get('country'))->value('Country');
    $causes->State                  = LocationsState::where('ID',Request::get('state'))->value('State');
    $causes->District               = LocationsDistrict::where('ID',Request::get('district'))->value('District');
    $causes->City                   = Request::get('city');
    $causes->IsApproved             = 0;
    $causes->CreatedUser            = Auth::user()->FirstName." ".Auth::user()->LastName;
    $causes->CreatedUserID          = Auth::user()->id;
    $causes->CreatedDate            = date('Y-m-d H:i:s');
    $causes->EditedUser             = Auth::user()->FirstName." ".Auth::user()->LastName;
    $causes->EditedUserID           = Auth::user()->id;
    $causes->EditedDate             = date('Y-m-d H:i:s');

    if (Request::hasFile('causeImage')) {
      $file             = Request::file('causeImage');
      $extension        = $file->getClientOriginalExtension();
      $savedFileName    = date('d-m-Y H-i-s') . '.' . $extension;
      $destinationPath  = public_path().'/SavedImages/Causes/' ;
      $file->move($destinationPath,$savedFileName);

      $causes->image    = 'SavedImages/Causes/'.$savedFileName ;
    }

    $causes->save();

    return redirect()->route('editCauseView')->with('status', 'Updated Successfully!');
  }

  public function deleteCauseData(){
    Causes::where('ID',Request::get('causeID'))->delete();
    Session::flash('status', 'Deleted Successfully!'); 
    return Response::json();
  }

  public function deleteCauseImage(){
    Causes::where('ID',Request::get('causeID'))->update(["Image" => ""]);
    Session::flash('status', 'Image Deleted Successfully!'); 
    return Response::json();
  }

}
