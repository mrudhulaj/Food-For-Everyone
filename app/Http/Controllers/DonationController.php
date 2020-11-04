<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Donations;
use Illuminate\Support\Str;
use DB;
use Illuminate\Support\Facades\Redirect;

class DonationController extends Controller
{
    public function FormDonation(){
        return view('donation');
    }

    public function InsertDonation(Request $request){
        $donations = new Donations();
        $donations-> firstname = $request->input('firstname');
        $donations-> lastname = $request->input('lastname');
        $donations-> typeofdonation = $request->input('typeofdonation');
        $donations-> restaurent_name = $request->input('restaurent_name');
        $donations-> phone = $request->input('phone');
        $donations-> location = $request->input('location');

        $donations->save();
        return view('donation');
    }

    public function EditData($id){
        $donations = Donations::find($id);
        return view('/updateform')->with('donations',$donations);
    }   

    public function DeleteData($id){
        $donations = Donations::find($id);
        $donations->delete();
        return Redirect()->back();
    }

    public function UpdateData(Request $request){
        $id =$request->input('id');

        $donations=Donations::find($id);
        $donations-> firstname = $request->input('firstname');
        $donations-> lastname = $request->input('lastname');
        $donations-> typeofdonation = $request->input('typeofdonation');
        $donations-> restaurent_name = $request->input('restaurent_name');
        $donations-> phone = $request->input('phone');
        $donations-> location = $request->input('location');

        $donations->save();
        return redirect('availablefoods')->with('donations',$donations);
       
    }

}
