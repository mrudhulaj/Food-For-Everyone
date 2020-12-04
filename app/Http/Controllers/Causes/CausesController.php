<?php

namespace App\Http\Controllers\Causes;

use App\Http\Controllers\Controller;
use Session;
use App\Models\Causes;
use Request;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
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
      $saved    = Request::has('saved') ? Request::get('saved') : 0;
    
      return view('causes/causes',compact('causes','role','saved'));
    }

    public function causesDetailsView(){
      $causeID    = Crypt::decrypt(Request::get('causeID'));
      $causeData  = Causes::where('ID',$causeID)->first();

      return view('causes/causesDetails',compact('causeData'));
    }

    public function addCauseView(){
      return view('causes/addCauseView');
    }

    public function addCauseSave(){
      $causes                         = new Causes();
      $causes->CauseName              = Request::get('causeName');
      $causes->CauseLongDescription   = Request::get('causeLongDescription');
      $causes->CauseShortDescription  = Request::get('causeShortDescription');
      $causes->ExpectedAmount         = Request::get('expectedAmount');
      $causes->Email                  = Request::get('email');
      $causes->Phone                  = Request::get('phone');
      $causes->District               = Request::get('district');
      $causes->State                  = Request::get('state');
      $causes->City                   = Request::get('city');
      $causes->IsApproved             = 0;
      $causes->CreatedUser            = Auth::user()->FirstName . Auth::user()->LastName;
      $causes->CreatedUserID          = Auth::user()->id;
      $causes->CreatedDate            = date('Y-m-d H:i:s');
      $causes->EditedUser             = Auth::user()->FirstName . Auth::user()->LastName;
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
    $causes        = Causes::where('CreatedUserID',Auth::user()->id)->orderBy('CreatedDate','desc')->get();
    return view('causes/editCauseView',compact('causes'));
  }

  public function editCauseData(){
    $editCause        = Causes::where('ID',Crypt::decrypt(Request::get('foodID')))->first();
    return view('causes/editCauseData',compact('editCause'));
  }

  public function editCauseDataSave(){

    $causes                         = Causes::where('ID',Request::get('causeID'))->first();
    $causes->CauseName              = Request::get('causeName');
    $causes->CauseLongDescription   = Request::get('causeLongDescription');
    $causes->CauseShortDescription  = Request::get('causeShortDescription');
    $causes->ExpectedAmount         = Request::get('expectedAmount');
    $causes->Email                  = Request::get('email');
    $causes->Phone                  = Request::get('phone');
    $causes->District               = Request::get('district');
    $causes->State                  = Request::get('state');
    $causes->City                   = Request::get('city');
    $causes->IsApproved             = 0;
    $causes->CreatedUser            = Auth::user()->FirstName . Auth::user()->LastName;
    $causes->CreatedUserID          = Auth::user()->id;
    $causes->CreatedDate            = date('Y-m-d H:i:s');
    $causes->EditedUser             = Auth::user()->FirstName . Auth::user()->LastName;
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
