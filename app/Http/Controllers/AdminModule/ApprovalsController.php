<?php

namespace App\Http\Controllers\AdminModule;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Causes;
use App\Models\Volunteers;
use App\Models\RejectedActivities;
use App\Models\Events;
use Request;
use Redirect;
use Crypt;

class ApprovalsController extends Controller
{
    public function approvalsCausesView(){
      Session::put('activeTab', 'APPROVALS');
      $badgesCount = $this->approvalsBadges();
      $selection   = "Causes";
      $causes   = Causes::where('IsApproved',0)->orderBy('CreatedDate','desc')->get();
      foreach($causes as $causeData){
        if($causeData->ExpectedAmount != 0){
          $causeData->raisedAmountPercentage = round((($causeData->RaisedAmount/$causeData->ExpectedAmount)*100),2);
        }
      }

      return view('admin/approvals/approvalsCauses',compact('badgesCount','selection','causes'));
    }

    public function approvalsVolunteersView(){
      $selection   = "Volunteers";
      $badgesCount = $this->approvalsBadges();

      $volunteers   = Volunteers::where('IsApproved',0)->orderBy('CreatedDate','desc')->get();

      return view('admin/approvals/approvalsVolunteers',compact('badgesCount','selection','volunteers'));
    }

    public function approvalsEventsView(){
      $selection   = "Events";
      $badgesCount = $this->approvalsBadges();

      $events   = Events::where('IsApproved',0)->orderBy('CreatedDate','desc')->get();
      foreach($events as $eventsData){
        $eventsData->BeginTime = date('h:i A', strtotime($eventsData->BeginTime));
        $eventsData->EndTime = date('h:i A', strtotime($eventsData->EndTime));
      }

      return view('admin/approvals/approvalsEvents',compact('badgesCount','selection','events'));
    }

    private function approvalsBadges(){
      $badgesCount['causes']       = Causes::where('IsApproved', '0')->count();
      $badgesCount['volunteers']   = Volunteers::where('IsApproved', '0')->count();
      $badgesCount['events']       = Events::where('IsApproved', '0')->count();
      return $badgesCount;
    }

    public function approvalsDecisions(){
      $selection   = Request::get('category');
      $badgesCount = $this->approvalsBadges();

      if($selection == "Causes"){
        $activity               = Causes::where('ID',Crypt::decrypt(Request::get('ID')))->first();
        $activity->IsApproved   = Request::get('Decision');
        $activity->save();

        if(Request::get('Decision') == 2){
          $rejectedActivities     = $this->rejectedActivitiesSave($activity);
        }

        return Redirect::route('approvalsCausesView');
      }
      elseif($selection == "Volunteers"){ 
        $activity               = Volunteers::where('ID',Crypt::decrypt(Request::get('ID')))->first();
        $activity->IsApproved   = Request::get('Decision');
        $activity->save();

        if(Request::get('Decision') == 2){
          $rejectedActivities     = $this->rejectedActivitiesSave($activity);
        }

        return Redirect::route('approvalsVolunteersView');
      }
      elseif($selection == "Events"){
        $activity               = Events::where('ID',Crypt::decrypt(Request::get('ID')))->first();
        $activity->IsApproved   = Request::get('Decision');
        $activity->save();

        if(Request::get('Decision') == 2){
          $rejectedActivities     = $this->rejectedActivitiesSave($activity);
        }

        return Redirect::route('approvalsEventsView');
      }

    }

    private function rejectedActivitiesSave($activity){
      $rejectedActivities                       = new RejectedActivities();
      $rejectedActivities->Activity             = Request::get('category');
      $rejectedActivities->ActivityID           = Crypt::decrypt(Request::get('ID'));
      $rejectedActivities->Reason               = Request::get('rejectionReason');
      $rejectedActivities->ActivityCreatedBy    = $activity->CreatedUser;
      $rejectedActivities->ActivityCreatedByID  = $activity->CreatedUserID;
      $rejectedActivities->save();      
      return $rejectedActivities;
    }

    public function approvalsVolunteerProfile(){
      $profile = Volunteers::where('ID',Crypt::decrypt(Request::get('ID')))->first();
      return view('admin/approvals/approvalsVolunteersProfile',compact('profile'));
    }
}
