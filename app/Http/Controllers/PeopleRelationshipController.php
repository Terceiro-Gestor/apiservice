<?php

namespace App\Http\Controllers;

use App\Models\PeopleRelationship;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PeopleRelationshipRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PeopleRelationshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $peopleRelationships = PeopleRelationship::paginate();

        return view('people-relationship.index', compact('peopleRelationships'))
            ->with('i', ($request->input('page', 1) - 1) * $peopleRelationships->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $peopleRelationship = new PeopleRelationship();

        return view('people-relationship.create', compact('peopleRelationship'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PeopleRelationshipRequest $request): RedirectResponse
    {
        PeopleRelationship::create($request->validated());

        return Redirect::route('people-relationships.index')
            ->with('success', 'PeopleRelationship created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $peopleRelationship = PeopleRelationship::find($id);

        return view('people-relationship.show', compact('peopleRelationship'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $peopleRelationship = PeopleRelationship::find($id);

        return view('people-relationship.edit', compact('peopleRelationship'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PeopleRelationshipRequest $request, PeopleRelationship $peopleRelationship): RedirectResponse
    {
        $peopleRelationship->update($request->validated());

        return Redirect::route('people-relationships.index')
            ->with('success', 'PeopleRelationship updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        PeopleRelationship::find($id)->delete();

        return Redirect::route('people-relationships.index')
            ->with('success', 'PeopleRelationship deleted successfully');
    }
}
