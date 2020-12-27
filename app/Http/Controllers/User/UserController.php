<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Session;
use App\Models\Volunteers;
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
      $profile                 = Volunteers::where('CreatedUserID',Auth::user()->id)->first();
      $profile->isVolunteer    = true;
    }
  
    return view('user/editProfileView',compact('profile'));
  }

  public function editProfileSave(){

    $user                   = User::where('id',Auth::user()->id)->first();
    $user->FirstName        = Request::get('firstName');
    $user->LastName         = Request::get('lastName');
    $user->Email            = Request::get('email');
    $user->Phone            = Request::get('phone');
    $user->Occupation       = Request::get('occupation');
    $user->District         = Request::get('district');
    $user->State            = Request::get('state');

    if($user->TypeOfAccount == 'Volunteer'){
      $user->FacebookLink     = Request::get('facebook');
      $user->TwitterLink      = Request::get('twitter');
    }

    if (Request::hasFile('profileImage')) {
      $file                       = Request::file('profileImage');
      $extension                  = $file->getClientOriginalExtension();
      $savedFileName              = date('d-m-Y H-i-s') . '.' . $extension;
      $destinationPath            = public_path().'/SavedImages/User/' ;
      $file->move($destinationPath,$savedFileName);

      $user->ProfileImage   = 'SavedImages/User/'.$savedFileName ;
    }

    $user->save();

    return redirect()->route('editProfileView')->with('status', "Updated Successfully!");
  }

  public function delProfileImg(){
    User::where('id',Auth::user()->id)->update(["ProfileImage" => ""]);
    Session::flash('status', 'Image Deleted Successfully!'); 
    return Response::json();
  }

}
