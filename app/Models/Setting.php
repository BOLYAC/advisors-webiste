<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Setting extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = [
        'site_name',
        'site_title',
        'site_desc',
        'site_address',
        'site_keywords',
        'footer_copyright_text',
        'seo_meta_title',
        'seo_meta_description'
    ];

    protected $guarded = [];

}
