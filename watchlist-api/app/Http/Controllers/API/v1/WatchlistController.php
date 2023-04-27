<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Identifier;
use Illuminate\Http\Request;
use App\Models\Watchlist;

class WatchlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = empty($request->limit) ? 10 : $request->limit;
        $offset = empty($request->offset) ? 0 : $request->offset;

        if(!is_numeric($limit)) {
            return $this->getErrorResponse('Watchlist', 'LIMIT_INVALID');
        }
        if($limit > 10 || $limit < 1) {
            return $this->getErrorResponse('Watchlist', 'LIMIT_VALUE');
        }
        if(!is_numeric($offset)) {
            return $this->getErrorResponse('Watchlist', 'OFFSET_INVALID');
        }
        if($offset < 0) {
            return $this->getErrorResponse('Watchlist', 'OFFSET_VALUE');
        }

        //if UUID is provided -> validate -> determine type
        if($request->identifier) {
            $identifier = Identifier::find($request->identifier);

            if($identifier === null) {
                return $this->getErrorResponse('Identifier', 'INVALID');
            }
            $type = $identifier->is_watchlist ? 'watchlist' : 'created_by';

            $watchlists = Watchlist::where($type.'_identifier_id', $request->identifier)->get();
            $watchlists->makeHidden(['id', 'created_by_identifier_id']);

            return response()->json($watchlists);
        }
        $watchlists = Watchlist::where('is_hidden', false)->skip($offset)->take($limit)->get();
        $watchlists->makeHidden(['id', 'is_private', 'is_hidden', 'created_by_identifier_id', 'watchlist_identifier_id']);

        return response()->json($watchlists);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
