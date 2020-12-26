<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Session;
use App\Models\Volunteers;
use Request;
use Illuminate\Support\Facades\Crypt;
use Auth;
use App\User;

class UserController extends Controller
{

  public function editProfileView(){
    $profile                 = User::where('id',Auth::user()->id)->first();
    $profile->isVolunteer    = false;

    if($profile->TypeOfAccount == 'Volunteer'){
      $profile                 = Volunteers::where('CreatedUserID',Auth::user()->id)->first();
      $profile->isVolunteer    = true;
    }

  
    return view('user/editProfileView',compact('profile'));
  }

  public function editProfileSave(){

    // If user is also a volunteer
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
    $volunteers->IsApproved       = 0;
    $volunteers->CreatedUser      = Auth::user()->FirstName." ".Auth::user()->LastName;
    $volunteers->CreatedUserID    = Auth::user()->id;
    $volunteers->CreatedDate      = date('Y-m-d H:i:s');
    $volunteers->EditedUser       = Auth::user()->FirstName." ".Auth::user()->LastName;
    $volunteers->EditedUserID     = Auth::user()->id;
    $volunteers->EditedDate       = date('Y-m-d H:i:s');

    if (Request::hasFile('profleImage')) {
      $file                       = Request::file('profleImage');
      $extension                  = $file->getClientOriginalExtension();
      $savedFileName              = date('d-m-Y H-i-s') . '.' . $extension;
      $destinationPath            = public_path().'/SavedImages/Volunteers/' ;
      $file->move($destinationPath,$savedFileName);

      $volunteers->ProfileImage   = 'SavedImages/Volunteers/'.$savedFileName ;
    }

    $volunteers->save();

    return redirect()->route('editVolunteerView',["saved" => "1"]);
  }

}
