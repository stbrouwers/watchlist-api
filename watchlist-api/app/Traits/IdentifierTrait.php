<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Identifier;


trait IdentifierTrait {

    /**
     * @param Request $request
     * @return $this|false|string
     */

    public function newIdentifier($reference, $watchlist) {
        if(!$watchlist) {
            if($reference == 'watchlist') {
                return 'REFERENCE_VIOLATION';
            }
            if(Identifier::where('reference', $reference)->exists()) {
                return 'REFERENCE_EXISTS';
            }
        }
        $uuid = Str::uuid();
        $data = ['id' => $uuid,'reference' => $reference, 'is_watchlist' => $watchlist];

        Identifier::create($data);
        return $uuid;
    }
}
