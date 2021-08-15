<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['title', 'seo_title', 'seo_description', 'seo_keywords', 'seo_url_slug'];

    protected $fillable = [
        'photo',
        'icon',
        'status',
        'visits',
        'row_no',
        'created_by',
        'created_by'
    ];

    protected $casts = [
        'parent_id' =>  'integer',
        'status'  =>  'boolean',
    ];

    /**
     * @return mixed

    public function Posts()
    {
        return $this->hasMany(Post::class)
            ->published()
            ->orderBy('created_at', 'DESC');
    }*/

    public function parentId()
    {
        return $this->belongsTo(self::class);
    }

    /**
     * The categories that belong to the post.
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function delete()
    {
        $this->translations()->delete();
        return parent::delete();
    }
}
