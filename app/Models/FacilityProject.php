<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacilityProject extends Model

{
    public $timestamps = false;
    protected $table = 'facility_project';
    protected $fillable = ['facility_id', 'project_id', 'distance'];
}
