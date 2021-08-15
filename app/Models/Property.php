<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Property extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['title', 'details', 'location', 'seo_title', 'seo_description', 'seo_keywords', 'seo_url_slug'];
    protected $fillable = [
        'date',
        'expire_date',
        'video_type',
        'photo_file',
        'attach_file',
        'video_file',
        'audio_file',
        'icon',
        'status',
        'visits',
        'row_no',
        'featured',
        'category_id',
        'city',
        'number_bedrooms',
        'number_bathrooms',
        'number_floors',
        'square',
        'price',
        'period',
        'lowest_price',
        'highest_price',
        'currency',
        'finish_date',
        'open_sell_date',
        'project_id',
        'created_by'
    ];

    protected $casts = [
        'date' => 'date',
        'expire_date' => 'date',
        'finish_date' => 'date',
        'open_sell_date' => 'date',
        'featured' => 'boolean',
    ];


    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class)->withPivot(['distance']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function category()
    {
        return $this->belongsTo(Section::class);
    }


    public function delete()
    {
        $this->translations()->delete();
        return parent::delete();
    }
}
