<?php

namespace App\Http\Controllers;

use App\Models\FamilyPerson;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\FamilyPersonRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FamilyPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $familyPeople = FamilyPerson::paginate();

        return view('family-person.index', compact('familyPeople'))
            ->with('i', ($request->input('page', 1) - 1) * $familyPeople->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $familyPerson = new FamilyPerson();

        return view('family-person.create', compact('familyPerson'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FamilyPersonRequest $request): RedirectResponse
    {
        FamilyPerson::create($request->validated());

        return Redirect::route('family-people.index')
            ->with('success', 'FamilyPerson created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $familyPerson = FamilyPerson::find($id);

        return view('family-person.show', compact('familyPerson'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $familyPerson = FamilyPerson::find($id);

        return view('family-person.edit', compact('familyPerson'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FamilyPersonRequest $request, FamilyPerson $familyPerson): RedirectResponse
    {
        $familyPerson->update($request->validated());

        return Redirect::route('family-people.index')
            ->with('success', 'FamilyPerson updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        FamilyPerson::find($id)->delete();

        return Redirect::route('family-people.index')
            ->with('success', 'FamilyPerson deleted successfully');
    }
}
