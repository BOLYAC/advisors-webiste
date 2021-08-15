<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class SectionTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title'];
}
