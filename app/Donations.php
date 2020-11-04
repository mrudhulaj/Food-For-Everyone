<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donations extends Model
{
    protected $table = 'Donations';
    protected $fillable = [
        'Firstname','Lastname','TypeOfDonation','RestaurentName','Phone','Location',
    ];
}
