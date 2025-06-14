<?php

namespace App\Http\Controllers\Api;

use App\Models\Occurrence;
use Illuminate\Http\Request;
use App\Http\Requests\OccurrenceRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\OccurrenceResource;

class OccurrenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $occurrences = Occurrence::paginate();

        return OccurrenceResource::collection($occurrences);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OccurrenceRequest $request): JsonResponse
    {
        $occurrence = Occurrence::create($request->validated());

        return response()->json(new OccurrenceResource($occurrence));
    }

    /**
     * Display the specified resource.
     */
    public function show(Occurrence $occurrence): JsonResponse
    {
        return response()->json(new OccurrenceResource($occurrence));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OccurrenceRequest $request, Occurrence $occurrence): JsonResponse
    {
        $occurrence->update($request->validated());

        return response()->json(new OccurrenceResource($occurrence));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(Occurrence $occurrence): Response
    {
        $occurrence->delete();

        return response()->noContent();
    }
}
