<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name', 'is_private', 'is_hidden', 'created_by_identifier_id', 'watchlist_identifier_id'
    ];

    protected $table = 'watchlists';

    public function videos() {
        return $this->belongsToMany(Video::class)
        ->withPivot('created_by_identifier_id');
    }

    public function createdByIdentifier() {
        return $this->belongsTo(Identifier::class, 'created_by_identifier_id');
    }
}
