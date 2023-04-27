<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identifier extends Model
{
    use HasFactory;
    protected $keyType = 'string';

    protected $table = 'identifiers';

    protected $fillable = [
        'id', 'reference', 'is_watchlist'
    ];

    public function watchlists() {
            return $this->hasMany(Watchlist::class, 'created_by_identifier_id');
    }
}
