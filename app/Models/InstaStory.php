<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstaStory extends Model
{
    use HasFactory;

    protected $fillable = ['photo_file', 'status', 'row_no', 'link_story'];

    protected $casts = [
        'status' => 'boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(InstaStoryImage::class);
    }


}
