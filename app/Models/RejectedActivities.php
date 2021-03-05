<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RejectedActivities extends Model
{
    protected $table        = 'rejectedActivities';
    protected $primaryKey   = 'ID';
    public $timestamps      = false;
}
