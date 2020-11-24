<?php 

namespace App\CommonFunctions;

class CommonFunctions
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
}