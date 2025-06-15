<?php

namespace App\Http\Controllers\Api;


use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Requests\PersonRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\PersonResource;
use Yajra\DataTables\Facades\DataTables;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $people = Person::paginate();

        return PersonResource::collection($people);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonRequest $request): JsonResponse
    {
        $person = Person::create($request->validated());

        return response()->json(new PersonResource($person));
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person): JsonResponse
    {
        $person->load(['occurrences', 'address']);
        return response()->json(new PersonResource($person));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonRequest $request, Person $person): JsonResponse
    {
        $person->update($request->validated());

        return response()->json(new PersonResource($person));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(Person $person): Response
    {
        $person->delete();

        return response()->noContent();
    }

    public function datatable(Request $request)
    {
        return DataTables::of(Person::query())->make(true);
    }
}
