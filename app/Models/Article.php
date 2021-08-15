<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['title', 'details', 'seo_title', 'seo_description', 'seo_keywords', 'seo_url_slug'];

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
        'created_by'];

    protected $casts = [
        'date' => 'date',
        'expire_date' => 'date',
        'status' => 'boolean',
    ];

    /**
     * The posts that belong to the category.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function delete()
    {
        $this->translations()->delete();
        return parent::delete();
    }
}
