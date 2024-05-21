<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Identifier;
use Illuminate\Http\Request;
use App\Models\Watchlist;
use App\Traits\WatchlistTrait;
use App\Http\Requests\Watchlist\listWatchlistRequest;

class WatchlistController extends Controller
{
    use WatchlistTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = empty($request->limit) ? 10 : $request->limit;
        $offset = empty($request->offset) ? 0 : $request->offset;

        if(!is_numeric($limit)) {return $this->getErrorResponse('Watchlist', 'LIMIT_INVALID');}
        if($limit > 10 || $limit < 1) {return $this->getErrorResponse('Watchlist', 'LIMIT_VALUE');}

        if(!is_numeric($offset)) {return $this->getErrorResponse('Watchlist', 'OFFSET_INVALID');}
        if($offset < 0) {return $this->getErrorResponse('Watchlist', 'OFFSET_VALUE');}

        //get ready for some nesting
        //if UUID is provided -> validate -> determine type
        if($request->identifier) {
            $identifier = Identifier::find($request->identifier);

            if($identifier === null) {
                $watchlist = Watchlist::find($request->identifier);

                if(!is_numeric($request->identifier) || $watchlist === null) {return $this->getErrorResponse('Identifier', 'INVALID');}
                if($watchlist->is_private && $request->identifier != $watchlist->created_by_identifier_id) {return $this->getErrorResponse('Watchlist', 'PRIVATE_WARNING');}

                $watchlist->makeHidden(['created_by_identifier_id', 'watchlist_identifier_id']);
                $videos = $watchlist->videos()->get();

                foreach($videos as $video) {
                    $video->reference = $video->pivot->reference;
                }
                $videos->makeHidden(['pivot', 'id']);

                return response()->json(array_merge($watchlist->toArray(), ['videos' => $videos]));
            }
            $type = $identifier->is_watchlist ? 'watchlist' : 'created_by';
            $watchlists = Watchlist::where($type.'_identifier_id', $request->identifier)->get();

            //yep fml
            if($type === 'watchlist') {
                $watchlist = Watchlist::find($watchlists[0]->id);
                $videos = $watchlist->videos()->get();
                foreach($videos as $video) {
                    $video->reference = $video->pivot->reference;
                }
                $watchlist->makeHidden(['created_by_identifier_id']);
                $videos->makeHidden(['pivot', 'id']);
                return response()->json(array_merge($watchlist->toArray(), ['videos' => $videos]));
            }

            $watchlists->makeHidden(['created_by_identifier_id']);

            return response()->json($watchlists);
        }
        $watchlists = Watchlist::where('is_hidden', false)->skip($offset)->take($limit)->get();
        $watchlists->makeHidden(['is_private', 'is_hidden', 'created_by_identifier_id', 'watchlist_identifier_id']);

        return response()->json($watchlists);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $private = empty($request->private) ? false : $this->autism($request->private);
        $hidden = empty($request->hidden) ? false : $this->autism($request->hidden);

        if(empty($name)) {return $this->getErrorResponse('Watchlist', 'NAME_NULL');}
        if(empty($request->identifier_)) {return $this->getErrorResponse('Identifier', 'NULL');}

        if($private === 'kys') {return $this->getErrorResponse('Watchlist', 'PRIVATE_INVALID');}
        if($hidden === 'kys') {return $this->getErrorResponse('Watchlist', 'HIDDEN_INVALID');}

        $identifier = Identifier::find($request->identifier_);
        if($identifier === null) {
            return $this->getErrorResponse('Identifier', 'INVALID');
        }

        $watchlist = $this->newWatchlist($name, $private, $hidden, $identifier->id);
        $watchlist->makeHidden(['created_by_identifier_id']);

        return response()->json($watchlist);
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

    /**
     * Autism.
     */
    public function autism($b) {
        if($b == 'true'|| $b == 1) {
            return true;
        }
        if($b == 'false'|| $b == 0) {
            return false;
        }
        return 'kys';
    }
}
