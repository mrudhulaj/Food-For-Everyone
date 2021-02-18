<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RaisedTickets extends Model
{
    protected $table        = 'raisedTickets';
    protected $primaryKey   = 'ID';
    public $timestamps      = false;
}
