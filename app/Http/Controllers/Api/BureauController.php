<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bureau\BureauStoreRequest;
use Illuminate\Http\Request;
use App\Models\Bureau;

class BureauController extends Controller
{
    public function index()
    {
        return Bureau::all();
    }

    public function store(BureauStoreRequest $request)
    {
        $bureau = Bureau::create($request->validated());

        return response()->json([
            'message' => 'Bureau created successfully',
            'bureau' => $bureau
        ], 201);
    }
    
    public function show(Bureau $bureau)
    {
        return $bureau;
    }

    public function update(BureauStoreRequest $request, Bureau $bureau)
    {
        $bureau->update($request->validated());

        return response()->json([
            'message' => 'Bureau updated successfully',
            'bureau' => $bureau
        ]);
    }

    public function destroy(Bureau $bureau)
    {
        $bureau->delete();

        return response()->json([
            'message' => 'Bureau deleted successfully'
        ]);
    }
}
