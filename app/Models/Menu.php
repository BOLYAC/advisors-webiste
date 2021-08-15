<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Menu extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['title'];
    protected $fillable = [
        'row_no',
        'parent_id',
        'status',
        'type',
        'link',
        'created_by',
        'updated_by',
        'cat_id',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    //

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subMenus()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderby('row_no', 'asc');
    }

    public function delete()
    {
        $this->translations()->delete();
        return parent::delete();
    }
}
