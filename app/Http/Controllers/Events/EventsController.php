<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use Session;
use App\Models\Events;
use App\Models\LocationsState;
use App\Models\LocationsDistrict;
use App\Models\LocationsCountry;
use App\Models\LocationsMain;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Request;
use Illuminate\Support\Facades\Crypt;
use CommonFunctions;
use Auth;
use Response;

class EventsController extends Controller
{
    public function eventsView(){
      Session::put('activeTab', 'EVENTS');

      $events   = Events::where('IsApproved',1)->orderBy('CreatedDate','desc')->get();
      $saved    = Request::has('saved') ? Request::get('saved') : 0;
      foreach($events as $eventsData){
        $eventsData->BeginTime = date('h:i A', strtotime($eventsData->BeginTime));
        $eventsData->EndTime = date('h:i A', strtotime($eventsData->EndTime));
        $eventsData->countryName = CommonFunctions::countryName($eventsData->CreatedUserID);
      }

      if(Auth::check()){
        $role   = Role::select('id')->where('name',Auth::user()->TypeOfAccount)->first();
      }else{
        $role = "";
      }
      return view('events/events',compact('events','saved','role'));
    }

    public function eventDetailsView(){
      $eventID                = Crypt::decrypt(Request::get('eventID'));
      $eventData              = Events::where('ID',$eventID)->first();
      $eventData->BeginTime   = date('h:i A', strtotime($eventData->BeginTime));
      $eventData->EndTime     = date('h:i A', strtotime($eventData->EndTime));
      $eventData->countryName = CommonFunctions::countryName($eventData->CreatedUserID);

      return view('events/eventDetails',compact('eventData'));
    }

    public function addEventView(){
      $locationsCountry = LocationsMain::select('Country','CountryID')->distinct()->get();
      return view('events/addEventView',compact('locationsCountry'));
    } 

    public function addEventSave(){
      $events                           = new Events();
      $events->EventName                = Request::get('eventName');
      $events->EventShortDescription    = Request::get('shortDescription');
      $events->EventLongDescription     = Request::get('longDescription');
    
      //To replace the last ":" in time string
      $beginTime                = CommonFunctions::lastOccurReplace(":"," ",Request::get('beginTime'));
      $beginTime                = date("H:i", strtotime( $beginTime ));
      $endTime                  = CommonFunctions::lastOccurReplace(":"," ",Request::get('endTime'));
      $endTime                  = date("H:i", strtotime( $endTime ));

      $events->BeginTime        = $beginTime;
      $events->EndTime          = $endTime;
      $events->Email            = Request::get('email');
      $events->Phone            = Request::get('phone');
      $events->Landmark         = Request::get('landmark');
      $events->CountryID        = Request::get('country');
      $events->StateID          = Request::get('state');
      $events->DistrictID       = Request::get('district');
      $events->Country          = LocationsCountry::where('ID',Request::get('country'))->value('Country');
      $events->State            = LocationsState::where('ID',Request::get('state'))->value('State');
      $events->District         = LocationsDistrict::where('ID',Request::get('district'))->value('District');
      $events->City             = Request::get('city');
      $events->IsApproved       = 0;
      $events->CreatedUser      = Auth::user()->FirstName." ".Auth::user()->LastName;
      $events->CreatedUserID    = Auth::user()->id;
      $events->CreatedDate      = date('Y-m-d H:i:s');
      $events->EditedUser       = Auth::user()->FirstName." ".Auth::user()->LastName;
      $events->EditedUserID     = Auth::user()->id;
      $events->EditedDate       = date('Y-m-d H:i:s');

      if (Request::hasFile('eventImage')) {
        $file             = Request::file('eventImage');
        $extension        = $file->getClientOriginalExtension();
        $savedFileName    = date('d-m-Y H-i-s') . '.' . $extension;
        $destinationPath  = public_path().'/SavedImages/Events/' ;
        $file->move($destinationPath,$savedFileName);

        $events->EventImage    = 'SavedImages/Events/'.$savedFileName ;
      }

      $events->save();

      return redirect()->route('eventsView',["saved" => "1"]);
    }

    // Edit

    public function editEventView(){
      $events        = Events::where('CreatedUserID',Auth::user()->id)
                              ->where('IsApproved',0)
                              ->orderBy('CreatedDate','desc')
                              ->get();
      foreach($events as $eventsData){
        $eventsData->BeginTime   = date('h:i A', strtotime($eventsData->BeginTime));
        $eventsData->EndTime     = date('h:i A', strtotime($eventsData->EndTime));  
      }

      if(Auth::check()){
        $role   = Role::select('id')->where('name',Auth::user()->TypeOfAccount)->first();
      }else{
        $role = "";
      }

      return view('events/editEventView',compact('events','role'));
    }
  
    public function editEventData(){
      $editEvent        = Events::where('ID',Crypt::decrypt(Request::get('eventID')))->first();
      $countryID        = LocationsCountry::where('Country',$editEvent->Country)->value('ID');
      $locationsState   = LocationsState::where('CountryID',$countryID)->get();
      $locationsCountry = LocationsMain::select('Country','CountryID')->distinct()->get();
      $locationsDistrict= LocationsDistrict::where('StateID',$editEvent->StateID)->get();
      return view('events/editEventData',compact('editEvent','locationsState','locationsCountry','locationsDistrict'));
    }
  
    public function editEventDataSave(){
  
      $events                           = Events::where('ID',Request::get('eventID'))->first();
      $events->EventName                = Request::get('eventName');
      $events->EventShortDescription    = Request::get('shortDescription');
      $events->EventLongDescription     = Request::get('longDescription');
    
      //To replace the last ":" in time string
      $beginTime                = CommonFunctions::lastOccurReplace(":"," ",Request::get('beginTime'));
      $beginTime                = date("H:i", strtotime( $beginTime ));
      $endTime                  = CommonFunctions::lastOccurReplace(":"," ",Request::get('endTime'));
      $endTime                  = date("H:i", strtotime( $endTime ));

      $events->BeginTime        = $beginTime;
      $events->EndTime          = $endTime;
      $events->Email            = Request::get('email');
      $events->Phone            = Request::get('phone');
      $events->Landmark         = Request::get('landmark');
      $events->CountryID        = Request::get('country');
      $events->StateID          = Request::get('state');
      $events->DistrictID       = Request::get('district');
      $events->Country          = LocationsCountry::where('ID',Request::get('country'))->value('Country');
      $events->State            = LocationsState::where('ID',Request::get('state'))->value('State');
      $events->District         = LocationsDistrict::where('ID',Request::get('district'))->value('District');
      $events->City             = Request::get('city');
      $events->IsApproved       = 0;
      $events->CreatedUser      = Auth::user()->FirstName." ".Auth::user()->LastName;
      $events->CreatedUserID    = Auth::user()->id;
      $events->CreatedDate      = date('Y-m-d H:i:s');
      $events->EditedUser       = Auth::user()->FirstName." ".Auth::user()->LastName;
      $events->EditedUserID     = Auth::user()->id;
      $events->EditedDate       = date('Y-m-d H:i:s');

      if (Request::hasFile('eventImage')) {
        $file             = Request::file('eventImage');
        $extension        = $file->getClientOriginalExtension();
        $savedFileName    = date('d-m-Y H-i-s') . '.' . $extension;
        $destinationPath  = public_path().'/SavedImages/Events/' ;
        $file->move($destinationPath,$savedFileName);

        $events->EventImage    = 'SavedImages/Events/'.$savedFileName ;
      }

      $events->save();
  
      return redirect()->route('editEventView')->with('status', 'Updated Successfully!');
    }
  
    public function deleteEventData(){
      Events::where('ID',Request::get('eventID'))->delete();
      Session::flash('status', 'Deleted Successfully!'); 
      return Response::json();
    }
  
    public function deleteEventImage(){
      Events::where('ID',Request::get('eventID'))->update(["EventImage" => ""]);
      Session::flash('status', 'Image Deleted Successfully!'); 
      return Response::json();
    }


}
