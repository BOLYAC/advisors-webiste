<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['title'];
    protected $fillable = [
        'icon'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class, 'category_id');
    }

    public function delete()
    {
        $this->translations()->delete();
        return parent::delete();
    }
}
