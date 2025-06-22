<?php

namespace App\Http\Controllers;

use App\Models\PeopleRelationship;
use App\Models\Person;
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
    public function store(PeopleRelationshipRequest $request, Person $person)
    {
        $validated = $request->validated();

        // Cria a nova pessoa (familiar)
        $relatedPerson = Person::create([
            'full_name'     => $validated['full_name'],
            'social_name'   => $validated['social_name'] ?? null,
            'birth_date'    => $validated['birth_date'],
            'gender'        => $validated['gender'] ?? null,
            'ethnicity'     => $validated['ethnicity'] ?? null,
            'marital_status' => $validated['marital_status'] ?? null,
            'nis'           => $validated['nis'] ?? null,
            'cpf'           => $validated['cpf'] ?? null,
            'rg'            => $validated['rg'] ?? null,
            'country'       => $validated['country'] ?? null,
            'state'         => $validated['state'] ?? null,
            'city'          => $validated['city'] ?? null,
            // Se precisar salvar foto:
            // 'photo_path' => $request->file('photo')->store('photos', 'public'),
        ]);

        // Cria relacionamento direto
        PeopleRelationship::create([
            'person_id'           => $person->id,
            'related_person_id'   => $relatedPerson->id,
            'relationship'        => $validated['relationship'],
        ]);

        // Cria relacionamento inverso automático
        $reverse = $this->getReverseRelationship($validated['relationship']);

        PeopleRelationship::create([
            'person_id'           => $relatedPerson->id,
            'related_person_id'   => $person->id,
            'relationship'        => $reverse,
        ]);

        return response()->json([
            'message'         => 'Familiar cadastrado com sucesso.',
            'related_person'  => $relatedPerson,
            'relationship'    => $validated['relationship'],
            'reverse'         => $reverse,
        ]);
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

    private function getReverseRelationship(string $rel): string
    {
        return match (mb_strtolower($rel)) {
            'mãe' => 'filho',
            'pai' => 'filho',
            'filho' => 'pai',
            'filha' => 'mãe',
            'irmão' => 'irmão',
            'irmã' => 'irmã',
            'avô' => 'neto',
            'avó' => 'neta',
            default => 'familiar',
        };
    }
}
