<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqQuestion extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['title', 'details'];
    public $fillable = ['status', 'row_no'];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function delete()
    {
        $this->translations()->delete();
        return parent::delete();
    }

}
