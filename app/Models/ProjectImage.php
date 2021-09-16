<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ProjectImage extends Model
{

    /**
     * @var string
     */
    protected $table = 'project_images';

    /**
     * @var array
     */
    protected $fillable = ['project_id', 'full', 'row_no_image'];

    /**
     * @var array
     */
    protected $casts = [
        'project_id'    =>  'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    protected static function boot() {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('row_no_image', 'ASC');
        });
    }
}
