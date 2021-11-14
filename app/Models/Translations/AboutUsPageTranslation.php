<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class AboutUsPageTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['about_us_title', 'about_us_details', 'a_message_from_the_owners_tile', 'a_message_from_the_owners_details',
        'our_mission_title', 'our_mission_details', 'our_vision_title', 'our_vision_details', 'team_title', 'team_details'
    ];
}
