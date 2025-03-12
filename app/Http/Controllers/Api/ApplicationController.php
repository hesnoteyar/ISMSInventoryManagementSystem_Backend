<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\ApplicationStoreRequest;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
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
    public function store(ApplicationStoreRequest $request)
    {
        $data = $request->validated();
        $req = Application::create([
            'request_type' => $data['RequestType'],
            'criteria' => $data['Criteria'],
            'requester_name' => $data['RequesterName'],
            'request_detail' => $data['RequestDetail'],
            'qty' => $data['Quantity'],
            'equipment_id' => $data['EquipmentId'],
            'status' => $data['Status'],
            'received_by' => $data['ReceivedBy'],
            'date_needed' => $data['DateNeeded'],
            'return_date' => $data['ReturnDate'],
            'remarks' => $data['Remarks'],
            'proof' => $data['Proof'] ?? null,
            'bureau_id' => $data['BureauId'],
        ]);

        return new ApplicationResource($req);
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
