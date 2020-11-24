<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use Session;
use App\Models\Events;
use Request;
use Illuminate\Support\Facades\Crypt;
use CommonFunctions;

class EventsController extends Controller
{
    public function eventsView(){
      Session::put('activeTab', 'EVENTS');

      $events = Events::orderBy('CreatedDate','desc')->get();
      foreach($events as $eventsData){
        $eventsData->BeginTime = date('h:i A', strtotime($eventsData->BeginTime));
        $eventsData->EndTime = date('h:i A', strtotime($eventsData->EndTime));
      }

      return view('events/events',compact('events'));
    }

    public function eventDetailsView(){
      $eventID                = Crypt::decrypt(Request::get('eventID'));
      $eventData              = Events::where('ID',$eventID)->first();
      $eventData->BeginTime   = date('h:i A', strtotime($eventData->BeginTime));
      $eventData->EndTime     = date('h:i A', strtotime($eventData->EndTime));

      return view('events/eventDetails',compact('eventData'));
    }

    public function addEventView(){
      return view('events/addEventView');
    } 

    public function addEventSave(){
      $events                     = new Events();
      $events->EventName          = Request::get('eventName');
      $events->EventShortDescription   = Request::get('shortDescription');
      $events->EventLongDescription   = Request::get('longDescription');
    
      //To replace the last ":" in time string
      $beginTime                  = CommonFunctions::lastOccurReplace(":"," ",Request::get('beginTime'));
      $beginTime                  = date("H:i", strtotime( $beginTime ));
      $endTime                    = CommonFunctions::lastOccurReplace(":"," ",Request::get('endTime'));
      $endTime                    = date("H:i", strtotime( $endTime ));

      $events->BeginTime          = $beginTime;
      $events->EndTime            = $endTime;
      $events->Email              = Request::get('email');
      $events->Phone              = Request::get('phone');
      $events->District           = Request::get('district');
      $events->State              = Request::get('state');
      $events->City               = Request::get('city');
      $events->CreatedUser        = 'TestUser';
      $events->CreatedDate        = date('Y-m-d H:i:s');

      if (Request::hasFile('eventImage')) {
        $file             = Request::file('eventImage');
        $extension        = $file->getClientOriginalExtension();
        $savedFileName    = date('d-m-Y H-i-s') . '.' . $extension;
        $destinationPath  = public_path().'/SavedImages/Events/' ;
        $file->move($destinationPath,$savedFileName);

        $events->EventImage    = 'SavedImages/Events/'.$savedFileName ;
      }

      $events->save();

      return redirect()->route('eventsView')->with('status', 'Added Successfully!');
    }


}
