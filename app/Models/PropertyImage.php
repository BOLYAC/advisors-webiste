<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    public $timestamps = false;
    /**
     * @var string
     */
    protected $table = 'property_images';

    /**
     * @var array
     */
    protected $fillable = ['property_id', 'full', 'row_no'];

    /**
     * @var array
     */
    protected $casts = [
        'property_id' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
