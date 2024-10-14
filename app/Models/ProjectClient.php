<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectClient extends Model
{
    use HasFactory, SoftDeletes;

    // Kolom yang bisa diisi (mass-assignable)
    protected $fillable = [
        'name',
        'occupation',
        'avatar',
        'logo',
    ];
    public function client() {
        return $this->belongsTo(ProjectClient::class,'project_client_id');
    }
}
