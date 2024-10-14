<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HeroSection extends Model
{
    use HasFactory, SoftDeletes;

    // Kolom yang bisa diisi (mass-assignable)
    protected $fillable = [
        'achievement',
        'subheading',
        'heading',
        'path_video',
        'banner',
    ];
}
