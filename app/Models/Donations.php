<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donations extends Model
{
    protected $table = 'donations';
    protected $fillable = [
        'Firstname','Lastname','TypeOfDonation','RestaurentName','Phone','Location',
    ];
}
