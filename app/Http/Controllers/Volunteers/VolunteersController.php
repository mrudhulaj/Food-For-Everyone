<?php

namespace App\Http\Controllers\Volunteers;

use App\Http\Controllers\Controller;
use Session;
use App\Models\Volunteers;
use App\Models\LocationsMain;
use App\Models\LocationsCountry;
use App\Models\LocationsState;
use App\Models\LocationsDistrict;
use Request;
use Illuminate\Support\Facades\Crypt;
use Auth;
use App\User;
use Spatie\Permission\Models\Role;

class VolunteersController extends Controller
{
    public function volunteersView(){
      Session::put('activeTab', 'VOLUNTEERS');
      $volunteers   = Volunteers::where('IsApproved',1)->orderBy('CreatedDate','desc')->get();
      $saved        = Request::has('saved') ? Request::get('saved') : 0;
      if(Auth::check()){
        $isUserVolunteerExist   = Volunteers::where('UserID',Auth::user()->id)->where('IsApproved',0)->exists();
        $role                   = Role::select('id')->where('name',Auth::user()->TypeOfAccount)->first();
      }
      else{
        $isUserVolunteerExist = false;
        $role                 = false;
      }

      return view('volunteers/volunteers',compact('volunteers','saved','isUserVolunteerExist','role'));
    }

  public function addVolunteerView(){
    $profile                 = User::where('id',Auth::user()->id)->first();
    $profile->isVolunteer    = false;
    Session::put('DefImgDel',0);

    if($profile->TypeOfAccount == 'Volunteer'){
      $profile                 = Volunteers::where('UserID',Auth::user()->id)->first();
      $profile->isVolunteer    = true;
    }
    else{
      $volunteerValidation     = Volunteers::where('UserID',Auth::user()->id)->first();
      if(!empty($volunteerValidation)){
        $profile->isVolunteer    = true;
      }
    }
      $locationsCountry = LocationsMain::select('Country','CountryID')->distinct()->get();
      return view('volunteers/addVolunteerView',compact('profile','locationsCountry'));
  }

  public function addVolunteerSave(){
    $volunteers                   = new Volunteers();
    $volunteers->UserID           = Auth::user()->id;
    $volunteers->FirstName        = Request::get('firstName');
    $volunteers->LastName         = Request::get('lastName');
    $volunteers->Occupation       = Request::get('occupation');
    $volunteers->Email            = Request::get('email');
    $volunteers->Phone            = Request::get('phone');
    $volunteers->CountryID        = Request::get('country');
    $volunteers->StateID          = Request::get('state');
    $volunteers->DistrictID       = Request::get('district');
    $volunteers->Country          = LocationsCountry::where('ID',Request::get('country'))->value('Country');
    $volunteers->State            = LocationsState::where('ID',Request::get('state'))->value('State');
    $volunteers->District         = LocationsDistrict::where('ID',Request::get('district'))->value('District');
    $volunteers->FacebookLink     = Request::get('facebook');
    $volunteers->TwitterLink      = Request::get('twitter');
    $volunteers->IsApproved       = 0;
    $volunteers->CreatedUser      = Auth::user()->FirstName." ".Auth::user()->LastName;
    $volunteers->CreatedUserID    = Auth::user()->id;
    $volunteers->CreatedDate      = date('Y-m-d H:i:s');
    $volunteers->EditedUser       = Auth::user()->FirstName." ".Auth::user()->LastName;
    $volunteers->EditedUserID     = Auth::user()->id;
    $volunteers->EditedDate       = date('Y-m-d H:i:s');

    if (Request::hasFile('profileImage')) {
      $file                       = Request::file('profileImage');
      $extension                  = $file->getClientOriginalExtension();
      $savedFileName              = date('d-m-Y H-i-s') . '.' . $extension;
      $destinationPath            = public_path().'/SavedImages/Volunteers/' ;
      $file->move($destinationPath,$savedFileName);

      $volunteers->ProfileImage   = 'SavedImages/Volunteers/'.$savedFileName ;
    }
    else{
      if(Session::get('DefImgDel') != 1){
        $user                       = User::where('id',Auth::user()->id)->first();
        $volunteers->ProfileImage   = $user->ProfileImage ;
      }
    }
    
    $volunteers->save();

    // Save these changes to User table as well.
    $user               = User::where('ID',Auth::user()->id)->first();
    $user->Occupation   = $volunteers->Occupation;
    $user->Phone        = $volunteers->Phone;
    $user->District     = $volunteers->District;
    $user->State        = $volunteers->State;
    $user->FacebookLink = $volunteers->FacebookLink;
    $user->TwitterLink  = $volunteers->TwitterLink;
    $user->save();



    return redirect()->route('volunteersView',["saved" => "1"]);
  }

  public function editVolunteerView(){
    $volunteer        = Volunteers::where('CreatedUserID',Auth::user()->id)->orderBy('CreatedDate','desc')->get();
    return view('volunteers/editVolunteerView',compact('volunteer'));
  }

  public function editVolunteerSave(){

    $volunteers                   = Volunteers::where('CreatedUserID',Auth::user()->id)->first();
    $volunteers->FirstName        = Request::get('firstName');
    $volunteers->LastName         = Request::get('lastName');
    $volunteers->Occupation       = Request::get('occupation');
    $volunteers->Email            = Request::get('email');
    $volunteers->Phone            = Request::get('phone');
    $volunteers->District         = Request::get('district');
    $volunteers->State            = Request::get('state');
    $volunteers->FacebookLink     = Request::get('facebook');
    $volunteers->TwitterLink      = Request::get('twitter');
    $volunteers->CreatedUser      = Auth::user()->FirstName." ".Auth::user()->LastName;
    $volunteers->CreatedUserID    = Auth::user()->id;
    $volunteers->CreatedDate      = date('Y-m-d H:i:s');
    $volunteers->EditedUser       = Auth::user()->FirstName." ".Auth::user()->LastName;
    $volunteers->EditedUserID     = Auth::user()->id;
    $volunteers->EditedDate       = date('Y-m-d H:i:s');

    if (Request::hasFile('profileImage')) {
      $file                       = Request::file('profileImage');
      $extension                  = $file->getClientOriginalExtension();
      $savedFileName              = date('d-m-Y H-i-s') . '.' . $extension;
      $destinationPath            = public_path().'/SavedImages/Volunteers/' ;
      $file->move($destinationPath,$savedFileName);

      $volunteers->ProfileImage   = 'SavedImages/Volunteers/'.$savedFileName ;
    }

    $volunteers->save();

    return redirect()->route('editVolunteerView',["saved" => "1"]);
  }

  public function delVolunteerImg(){
    $volunteers = Volunteers::where('UserID',Auth::user()->id)->exists();
    if($volunteers){
      Volunteers::where('ID',Auth::user()->id)->update(["ProfileImage" => ""]);
    }
    else{
      Session::put('DefImgDel',1);
    }
    $volunteers = $volunteers ? 'True' : "False" ;
    return $volunteers;
  }

}
