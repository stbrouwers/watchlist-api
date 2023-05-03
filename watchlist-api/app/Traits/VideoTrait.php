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

    public function newVideo($url, $name) {
        $platforms = Platform::all();

        if($url === null){return 'URL_NULL';}
        if($name === null){return 'NAME_NULL';}

        foreach($platforms as $platform) {
            if(str_contains($url, $platform->base_url)) {
                $video = Video::create([
                    'name' => $name,
                    'url' => $url,
                    'platform_id' => $platform->id,
                ]);
                return $video;
            }
        }
        return 'URL_SUPPORT';
    }

    public function attachVideo($watchlist, $video, $creator) {
        $watchlist->videos()->attach([$video->id => ['created_by_identifier_id' => $creator->id]]);
    }
}
