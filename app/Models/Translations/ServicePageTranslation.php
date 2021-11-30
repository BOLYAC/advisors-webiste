<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class ServicePageTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['first_title', 'first_details', 'second_title', 'second_details', 'third_title', 'third_details',
        'fourth_title', 'fourth_details', 'fifth_title', 'fifth_details', 'sixth_title', 'sixth_details', 'seventh_title', 'seventh_details'];
}
