<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['title'];
    protected $fillable = [
        'icon'
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class)->withPivot(['distance']);
    }

    public function delete()
    {
        $this->translations()->delete();
        return parent::delete();
    }
}
