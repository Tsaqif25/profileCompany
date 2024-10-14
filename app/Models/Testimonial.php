<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model
{
    use HasFactory, SoftDeletes;

    // Kolom yang bisa diisi (mass-assignable)
    protected $fillable = [
        'thumbnail',
        'message',
        'project_client_id',
    ];

    
  
}
