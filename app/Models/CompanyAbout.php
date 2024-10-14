<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyAbout extends Model
{
    use HasFactory, SoftDeletes;

    // Kolom yang bisa diisi (mass-assignable)
    protected $fillable = [
        'name',
        'thumbnail',
        'type',
    ];
    public function keypoint() {
        return $this->hasMany(CompanyKeypoint::class);
    }
}
