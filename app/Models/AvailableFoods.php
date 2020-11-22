<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvailableFoods extends Model
{
    protected $table        = 'availableFoods';
    protected $primaryKey   = 'ID';
    public $timestamps      = false;
}
