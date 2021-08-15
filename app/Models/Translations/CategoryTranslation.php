<?php

namespace App\Models\Translations;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    use Sluggable;

    public $timestamps = false;
    protected $fillable = ['title', 'seo_title', 'seo_description', 'seo_keywords', 'seo_url_slug'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'seo_url_slug' => [
                'source' => 'seo_title'
            ]
        ];
    }
}
