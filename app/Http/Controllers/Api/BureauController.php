<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bureau\BureauStoreRequest;
use Illuminate\Http\Request;
use App\Models\Bureau;

class BureauController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->input('per_page', 10);
        $search = $request->input('search');

        $query = Bureau::query();

        if ($search) {
            $query->where('bureau_code', 'LIKE', "%$search%")
                ->orWhere('bureau_name', 'LIKE', "%$search%");
        }

        return $query->paginate($per_page);
    }

    public function store(BureauStoreRequest $request)
    {
        $bureau = Bureau::create($request->validated());

        return response()->json([
            'message' => 'Bureau created successfully',
            'bureau' => $bureau
        ], 201);
    }
    
    public function show($id)
    {
        return Bureau::findorFail($$id);
    }

    public function update(BureauStoreRequest $request, Bureau $id)
    {
        $bureau = Bureau::findorFail($id);
        $bureau->update($request->validated());

        return response()->json([
            'message' => 'Bureau updated successfully',
            'bureau' => $bureau
        ]);
    }

    public function destroy($id)
    {
        $bureau = Bureau::findorFail($id);
        $bureau->delete();

        return response()->json([
            'message' => 'Bureau deleted successfully'
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->input('q');
        return Bureau::where('bureau_code', 'LIKE', "%$search%")
            ->orWhere('bureau_name', 'LIKE', "%$search%")
            ->get();    
    }
}
