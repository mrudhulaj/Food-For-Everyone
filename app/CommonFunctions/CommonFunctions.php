<?php 

namespace App\CommonFunctions;
use App\Http\Controllers\Controller;
use DB;

class CommonFunctions extends Controller
{
    public static function lastOccurReplace($search, $replace, $subject)
    {
    $pos = strrpos($subject, $search);
    
    if($pos !== false)
    {
        $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }
    
    return $subject;
    }

    public static function countryName($createdUserID)
    {
      $users = DB::table('users')->where('id',$createdUserID)->first();
      return $users->Country;
    }

}