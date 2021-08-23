<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    public $fillable = ['name', 'title', 'details', 'photo_file', 'status', 'row_no'];

    protected $casts = [
      'status' => 'boolean'
    ];
}
