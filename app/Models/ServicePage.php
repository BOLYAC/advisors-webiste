<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ServicePage extends Model
{
    use Translatable;

    public $translatedAttributes = ['first_title', 'first_details', 'second_title', 'second_details', 'third_title', 'third_details',
        'fourth_title', 'fourth_details', 'fifth_title', 'fifth_details', 'sixth_title', 'sixth_details', 'seventh_title', 'seventh_details'];

    protected $fillable = [
        'status',
        'visits',
        'services_image',
        'first_image',
        'second_image',
        'third_image',
        'fourth_image',
        'fifth_image',
        'sixth_image',
        'seventh_image'
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
