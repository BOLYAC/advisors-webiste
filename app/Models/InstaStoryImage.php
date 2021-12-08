<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class InstaStoryImage extends Model
{
    public $timestamps = false;
    /**
     * @var string
     */
    protected $table = 'insta_story_images';

    /**
     * @var array
     */
    protected $fillable = ['insta_story_id', 'photo_file', 'row_no'];

    /**
     * @var array
     */
    protected $casts = [
        'insta_story_id' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function instaStory()
    {
        return $this->belongsTo(InstaStory::class);
    }
    protected static function boot() {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('row_no', 'ASC');
        });
    }
}
