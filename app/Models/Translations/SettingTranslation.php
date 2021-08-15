<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class SettingTranslation extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'site_name',
        'site_title',
        'site_desc',
        'site_address',
        'site_keywords',
        'footer_copyright_text',
        'seo_meta_title',
        'seo_meta_description'
    ];
}
