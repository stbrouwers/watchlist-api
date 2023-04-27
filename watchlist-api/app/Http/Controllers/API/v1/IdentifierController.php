<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Identifier;
use Illuminate\Http\Request;
use App\Traits\IdentifierTrait;

class IdentifierController extends Controller
{
    use IdentifierTrait;

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
        if($request->reference === null) {
            return $this->getErrorResponse('Identifier', 'REFERENCE_NULL');
        }

        $identifier = $this->newIdentifier($request->reference, false);

        if(strlen($identifier) != 36) {
            return $this->getErrorResponse('Identifier', $identifier);
        }

        $identifier = Identifier::find($identifier);
        return response()->json($identifier);
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
