<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donations extends Model
{
    protected $table        = 'donations';
    protected $primaryKey   = 'ID';
    public $timestamps      = false;
}
