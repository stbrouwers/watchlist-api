<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Identifier;


trait ErrorTrait {
    //chinese trait
    public function getErrorResponse($model_name, $type) {
        $error = config('errorResponse')[$model_name][$type];
        return response()->json($error, $error['code']);
    }

}
