<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volunteers extends Model
{
    protected $table        = 'volunteers';
    protected $primaryKey   = 'ID';
    public $timestamps      = false;
}
