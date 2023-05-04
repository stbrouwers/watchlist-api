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
        $identifier = Identifier::find($creator);   //lazy
        if($watchlistIdentifier == 'REFERENCE_VIOLATION' || $watchlistIdentifier == 'REFERENCE_EXISTS') {return $watchlistIdentifier;}

        $watchlist = Watchlist::create([
            'name' => $name,
            'is_private' => $private,
            'is_hidden' => $hidden,
            'reference' => $identifier->reference,
            'created_by_identifier_id' => $creator,
            'watchlist_identifier_id' => $watchlistIdentifier,
            'videos_total' => 0,
        ]);

        return $watchlist;
    }

    public function updateWatchlist() {

    }
}
