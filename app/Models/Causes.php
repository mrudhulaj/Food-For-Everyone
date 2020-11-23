<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Causes extends Model
{
    protected $table        = 'causes';
    protected $primaryKey   = 'ID';
    public $timestamps      = false;
}
