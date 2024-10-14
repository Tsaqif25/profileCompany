<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    // Kolom yang bisa diisi (mass-assignable)
    protected $fillable = [
        'about',
        'thumbnail',
        'tagline',
        'name',
    ];
    public function appointements() {
        return $this->hasMany(Appointment::class);
    }
}
