<?php

namespace App\Http\Controllers\Volunteers;

use App\Http\Controllers\Controller;
use Session;
use App\Models\Volunteers;
use Request;
use Illuminate\Support\Facades\Crypt;

class VolunteersController extends Controller
{
    public function volunteersView(){
      Session::put('activeTab', 'VOLUNTEERS');
      $volunteers = Volunteers::orderBy('CreatedDate','desc')->get();

      return view('volunteers/volunteers',compact('volunteers'));
    }

  public function addVolunteerView(){
      return view('volunteers/addVolunteerView');
  }

  public function addCauseView(){
    return view('causes/addCauseView');
  }

  public function addVolunteerSave(){
    $volunteers               = new Volunteers();
    $volunteers->FirstName    = Request::get('firstName');
    $volunteers->LastName     = Request::get('lastName');
    $volunteers->Occupation   = Request::get('occupation');
    $volunteers->Email        = Request::get('email');
    $volunteers->Phone        = Request::get('phone');
    $volunteers->District     = Request::get('district');
    $volunteers->State        = Request::get('state');
    $volunteers->FacebookLink = Request::get('facebook');
    $volunteers->TwitterLink  = Request::get('twitter');
    $volunteers->CreatedUser  = 'TestUser';
    $volunteers->CreatedDate  = date('Y-m-d H:i:s');

    if (Request::hasFile('profleImage')) {
      $file                       = Request::file('profleImage');
      $extension                  = $file->getClientOriginalExtension();
      $savedFileName              = date('d-m-Y H-i-s') . '.' . $extension;
      $destinationPath            = public_path().'/SavedImages/Volunteers/' ;
      $file->move($destinationPath,$savedFileName);

      $volunteers->ProfileImage   = 'SavedImages/Volunteers/'.$savedFileName ;
    }

    $volunteers->save();

    return redirect()->route('volunteersView')->with('status', 'Added Successfully!');
  }

}
