<?php

namespace App\Models\Translations;
use Illuminate\Database\Eloquent\Model;

class MenuTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title'];
}
