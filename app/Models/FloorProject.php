<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FloorProject extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'project_floors';

    /**
     * @var array
     */
    protected $fillable = ['project_id', 'floor_full', 'floor_title', 'floor_price', 'floor_currency', 'floor_size', 'floor_bedrooms', 'floor_bathrooms'];

    /**
     * @var array
     */
    protected $casts = [
        'project_id' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
