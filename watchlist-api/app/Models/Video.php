<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'url', 'platform_id'
    ];

    public function watchlists() {
        $this->belongsToMany(Watchlist::class)
            ->withPivot('created_by_identifier_id');
    }

    public function platform() {
        $this->hasOne(Platform::class);
    }
}
