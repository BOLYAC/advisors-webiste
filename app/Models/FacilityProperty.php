<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacilityProperty extends Model
{
    public $timestamps = false;
    protected $table = 'facility_property';
    protected $fillable = ['facility_id', 'property_id', 'distance'];
}
