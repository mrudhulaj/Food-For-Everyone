<?php

namespace App\Http\Controllers\Causes;

use App\Http\Controllers\Controller;
use Session;
use App\Models\Causes;
use Request;
use Illuminate\Support\Facades\Crypt;

class CausesController extends Controller
{
    public function causesView(){
      Session::put('activeTab', 'CAUSES');
      $causes = Causes::orderBy('CreatedDate','desc')->get();
    
      return view('causes/causes',compact('causes'));
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
      $causes->CreatedUser            = 'TestUser';
      $causes->CreatedDate            = date('Y-m-d H:i:s');

      if (Request::hasFile('causeImage')) {
        $file             = Request::file('causeImage');
        $extension        = $file->getClientOriginalExtension();
        $savedFileName    = date('d-m-Y H-i-s') . '.' . $extension;
        $destinationPath  = public_path().'/SavedImages/Causes/' ;
        $file->move($destinationPath,$savedFileName);

        $causes->image    = 'SavedImages/Causes/'.$savedFileName ;
      }

      $causes->save();

      return redirect()->route('causesView')->with('status', 'Added Successfully!');
    }
}
