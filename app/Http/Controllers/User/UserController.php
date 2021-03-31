<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Session;
use App\Models\Volunteers;
use App\Models\LocationsState;
use App\Models\LocationsCountry;
use App\Models\LocationsDistrict;
use App\Models\LocationsMain;
use Request;
use Illuminate\Support\Facades\Crypt;
use Auth;
use App\User;
use Response;

class UserController extends Controller
{

  public function editProfileView(){
    Session::put('activeTab', '');
    $profile                 = User::where('id',Auth::user()->id)->first();
    $profile->isVolunteer    = false;

    if($profile->TypeOfAccount == 'Volunteer'){
      $profile                 = Volunteers::where('UserID',Auth::user()->id)->first();
      $profile->isVolunteer    = true;
    }
    $countryID        = LocationsCountry::where('Country',$profile->Country)->value('ID');
    $locationsState   = LocationsState::where('CountryID',$countryID)->get();
    $locationsCountry = LocationsMain::select('Country','CountryID')->distinct()->get();
    $locationsDistrict= LocationsDistrict::where('StateID',$profile->StateID)->get();
    return view('user/editProfileView',compact('profile','locationsState','locationsCountry','locationsDistrict'));
  }

  public function editProfileSave(){

    $user                   = User::where('id',Auth::user()->id)->first();
    $user->FirstName        = Request::get('firstName');
    $user->LastName         = Request::get('lastName');
    $user->Email            = Request::get('email');
    $user->Phone            = Request::get('phone');
    $user->Occupation       = Request::get('occupation');
    $user->CountryID        = Request::get('country');
    $user->StateID          = Request::get('state');
    $user->DistrictID       = Request::get('district');
    $user->Country          = LocationsCountry::where('ID',Request::get('country'))->value('Country');
    $user->State            = LocationsState::where('ID',Request::get('state'))->value('State');
    $user->District         = LocationsDistrict::where('ID',Request::get('district'))->value('District');
    $user->FacebookLink     = Request::get('facebook');
    $user->TwitterLink      = Request::get('twitter');

    if (Request::hasFile('profileImage')) {
      $file                       = Request::file('profileImage');
      $extension                  = $file->getClientOriginalExtension();
      $savedFileName              = date('d-m-Y H-i-s') . '.' . $extension;
      $destinationPath            = public_path().'/SavedImages/User/' ;
      $file->move($destinationPath,$savedFileName);

      $user->ProfileImage   = 'SavedImages/User/'.$savedFileName ;
    }

    $user->save();

    // Save these changes to Volunteer table as well.
    $volunteers               = Volunteers::where('UserID',Auth::user()->id)->first();
    if(!empty($volunteers)){
      $volunteers->FirstName    = $user->FirstName;
      $volunteers->LastName     = $user->LastName;
      $volunteers->Email        = $user->Email;
      $volunteers->Phone        = $user->Phone;
      $volunteers->Occupation   = $user->Occupation;
      $volunteers->Phone        = $user->Phone;
      $volunteers->District     = $user->District;
      $volunteers->State        = $user->State;
      $volunteers->FacebookLink = $user->FacebookLink;
      $volunteers->TwitterLink  = $user->TwitterLink;
      $volunteers->save();
    }


    return redirect()->route('editProfileView')->with('status', "Updated Successfully!");
  }

  public function delProfileImg(){
    User::where('id',Auth::user()->id)->update(["ProfileImage" => ""]);
    Session::flash('status', 'Image Deleted Successfully!'); 
    return Response::json();
  }

}
