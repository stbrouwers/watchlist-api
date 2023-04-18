<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'is_private', 'is_hidden', 'created_by_identifier_id', 'watchlist_identifier_id'
    ];

    public function watchlist() {

    }

    public function videos() {
        return $this->hasManyThrough(Video::class, 'video_watchlist');
    }
}
