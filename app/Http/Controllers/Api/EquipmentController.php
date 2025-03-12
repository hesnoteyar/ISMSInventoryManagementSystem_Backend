<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Equipment\EquipmentStoreRequest;
use App\Http\Requests\Equipment\EquipmentUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Http\Resources\EquipmentResource;
use App\Models\Brand;
use App\Models\EquipmentType;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 10);
        $brand = $request->input('brand');
        $equipmenttype = $request->input('equipmenttype');
        $minQty = $request->input('min_qty');
        $maxQty = $request->input('max_qty');

        $query = Equipment::with('brands', 'equipmenttypes', 'parts');

        if ($search) {
            $query
                ->where('equipment_model_number', 'LIKE', "%$search%")
                ->orWhere('equipment_description', 'LIKE', "%$search%");
                
        }

        if ($brand) {
            $query->whereHas('brands', fn($q) => $q->where('brand_name', $brand));
        }
        
        if($equipmenttype) {
            $query->whereHas('equipmenttypes', fn($q) => $q->where('equipment_type_name', $equipmenttype));
        }

        if ($minQty) {
            $query->where('equipment_qty', '>=', $minQty);
        }

        if ($maxQty) {
            $query->where('equipment_qty', '<=', $maxQty);
        }


        

        return EquipmentResource::collection($query->paginate($perPage));
        

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EquipmentStoreRequest $request)
    {
        $data = $request->validated();
        $equipment = Equipment::create([
            'brand_id' => $data['Brand'],
            'equipment_type_id' => $data['EquipmentType'],
            'equipment_model_number' => $data['ModelNumber'],
            'equipment_description' => $data['Description'],
            'equipment_qty' => $data['Quantity'],
        ]);  


        return new EquipmentResource($equipment);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new EquipmentResource(Equipment::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EquipmentUpdateRequest $request, Equipment $equipment)
    {
        $data = $request->validated();
        $equipment->update([
            'brand_id' => $data['Brand'],
            'equipment_type_id' => $data['EquipmentType'],
            'equipment_model_number' => $data['ModelNumber'],
            'equipment_description' => $data['Description'],
            'equipment_qty' => $data['Quantity'],
        ]);

        return new EquipmentResource($equipment);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipment $equipment)
    {
        $equipment->delete();
        return response()->json([
            'message' => 'Equipment deleted successfully'
        ]);
    }
}
