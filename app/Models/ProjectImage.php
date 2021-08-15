<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{

    /**
     * @var string
     */
    protected $table = 'project_images';

    /**
     * @var array
     */
    protected $fillable = ['project_id', 'full'];

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
}
