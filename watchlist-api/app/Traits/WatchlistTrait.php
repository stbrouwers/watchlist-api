<?php

namespace App\Traits;

use App\Models\Identifier;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Watchlist;
use App\Traits\IdentifierTrait;

trait WatchlistTrait {
    use IdentifierTrait;

    /**
     * @param Request $request
     * @return $this|false|string
     */

    public function newWatchlist($name, $private, $hidden, $creator) {
        $watchlistIdentifier = $this->newIdentifier('watchlist', true);

        if($watchlistIdentifier == 'REFERENCE_VIOLATION' || $watchlistIdentifier == 'REFERENCE_EXISTS') {return;}

        $watchlist = Watchlist::create([
            'name' => $name,
            'is_private' => $private,
            'is_hidden' => $hidden,
            'created_by_identifier_id' => $creator,
            'watchlist_identifier_id' => $watchlistIdentifier,
        ]);

        return $watchlist;
    }
}
