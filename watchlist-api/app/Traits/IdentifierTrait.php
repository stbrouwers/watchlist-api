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

    public function newIdentifier($ref, $watchlist) {
        if(!$watchlist) {
            if($ref == 'watchlist') {
                return 'REFERENCE_VIOLATION';
            }

            if(Identifier::where('reference', $ref)) {
                return 'REFERENCE_EXISTS';
            }
        }


        $uuid = Str::uuid();
        $data = ['id' => $uuid,'reference' => $ref, 'is_watchlist' => $watchlist];

        Identifier::create($data);
        return $uuid;
    }
}
