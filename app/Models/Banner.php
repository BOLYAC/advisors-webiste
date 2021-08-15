<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Banner extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['title', 'details', 'file'];
    protected $fillable = ['code', 'video_type', 'youtube_link', 'link_url', 'status', 'visits', 'row_no', 'icon'];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function delete()
    {
        $this->translations()->delete();
        return parent::delete();
    }

}
