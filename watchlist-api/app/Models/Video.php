<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'url', 'string_id'
    ];

    public function watchlists() {
        $this->hasManyThrough(Watchlist::class, 'video_watchlist');
    }
}
