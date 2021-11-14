<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class AboutUsPage extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['about_us_title', 'about_us_details', 'a_message_from_the_owners_tile', 'a_message_from_the_owners_details',
        'our_mission_title', 'our_mission_details', 'our_vision_title', 'our_vision_details', 'team_title', 'team_details'];

    protected $fillable = [
        'status',
        'visits',
        'about_us_image',
        'a_message_from_the_owners_image',
        'our_mission_image',
        'our_vision_image',
        'team_image'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function delete()
    {
        $this->translations()->delete();
        return parent::delete();
    }
}
