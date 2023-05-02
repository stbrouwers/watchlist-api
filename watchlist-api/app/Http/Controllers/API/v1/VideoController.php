<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Identifier;
use App\Models\Watchlist;
use Illuminate\Http\Request;
use App\Traits\VideoTrait;

class VideoController extends Controller
{
    use VideoTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->identifier === null) {return $this->getErrorResponse('Identifier', 'NULL');}
        if($request->watchlist === null) {return $this->getErrorResponse('Watchlist', 'NULL');}

        $identifier = Identifier::find($request->identifier);
        if($identifier === null) {return $this->getErrorResponse('Identifier', 'INVALID');}

        $url = $request->url;

        if(strlen($request->watchlist) == 36) {
            $watchlist = Watchlist::where('watchlist_identifier_id', $request->watchlist)->get();
        }
        else {
            $watchlist = Watchlist::find($request->watchlist);
            if($watchlist->is_private && $identifier->id != $watchlist->created_by_identifier_id) {return $this->getErrorResponse('Watchlist', 'PRIVATE_WARNING');}
        }
        if($watchlist === null) {return $this->getErrorResponse('Watchlist', 'INVALID');}


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
