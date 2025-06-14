<?php

namespace App\Http\Controllers\Api;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $addresses = Address::paginate();

        return AddressResource::collection($addresses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddressRequest $request): JsonResponse
    {
        $address = Address::create($request->validated());

        return response()->json(new AddressResource($address));
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address): JsonResponse
    {
        return response()->json(new AddressResource($address));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddressRequest $request, Address $address): JsonResponse
    {
        $address->update($request->validated());

        return response()->json(new AddressResource($address));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(Address $address): Response
    {
        $address->delete();

        return response()->noContent();
    }
}
