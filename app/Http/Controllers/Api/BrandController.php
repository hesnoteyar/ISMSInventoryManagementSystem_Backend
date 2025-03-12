<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\BrandStoreRequest;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function store(BrandStoreRequest $request)
    {
        $brand = Brand::create($request->validated());
        return response()->json([

            'message' => 'Brand created successfully',
            'data' => $brand
        ], 201);
    }
}
