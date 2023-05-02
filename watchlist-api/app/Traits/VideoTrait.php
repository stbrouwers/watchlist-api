<?php

namespace App\Traits;

use App\Models\Platform;
use App\Models\Video;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Watchlist;

trait VideoTrait {

    /**
     * @param Request $request
     * @return $this|false|string
     */

    public function newVideo($url) {
        $platforms = Platform::all();

        foreach($platforms as $platform) {
            if(str_contains($url, $platform->base_url)) {
                //get name through platform api
                $video = Video::create([

                ]);
            }
        }
    }
}
