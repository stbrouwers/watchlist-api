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


        if($request->identifier) {
            $identifier = Identifier::where('id', $request->identifier)->first();

            if($identifier === null) {
                return $this->getErrorResponse('Identifier', 'INVALID');
            }
        }

        $watchlists = Watchlist::all()->where('is_hidden', false);

        return $watchlists;
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
