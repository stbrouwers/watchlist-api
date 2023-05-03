<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'base_url', 'supported_length', 'supported_format'
    ];

    public function videos() {
        $this->hasMany(Video::class);
    }

}
