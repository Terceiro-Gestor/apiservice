<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use App\Models\Person;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Address;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\PersonRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $people = Person::all();
        return view('person.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $person = new Person();
        //$address = null;
        //$contact = null;
        return view('person.create', compact('person'))
            ->with('i', 0);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonRequest $request): RedirectResponse
    {

        // Valida os dados da requisição
        $validated = $request->validated();

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('people_photos', 'public');
        }

        $data = $validated;
        if ($photoPath) {
            $data['photo'] = $photoPath;
        }

        $person = DB::transaction(function () use ($data) {
            return Person::create($data);
        });

        return Redirect::route('people.edit', $person->id)
            ->with('success', 'Person created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person): View
    {
        $person->load(['address', 'contacts']); // eager load
        $contacts = $person->contacts; // ou com eager loading
        return view('person.show', compact('person', 'contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        // Carrega a pessoa com todos os relacionamentos
        $person = Person::with([
            'address',
            'contacts'
        ])->findOrFail($id);

        $contacts = $person->contacts; // ou com eager loading
        //dump($person, $address, $contacts);
        return view('person.edit', compact('person', 'contacts'))
            ->with('i', 0);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonRequest $request, Person $person): RedirectResponse
    {

        $validated = $request->validated();

        // Se uma nova foto foi enviada
        if ($request->hasFile('photo')) {
            // Exclui a foto antiga, se existir
            if ($person->photo && \Storage::disk('public')->exists($person->photo)) {
                \Storage::disk('public')->delete($person->photo);
            }
            // Salva a nova foto
            $photoPath = $request->file('photo')->store('people_photos', 'public');
            $validated['photo'] = $photoPath;
        }

        // Atualiza os dados da pessoa
        $person->update($validated);

        return Redirect::route('people.edit', $person->id)
            ->with('success', 'Person updated successfully');
    }

    public function destroy($id): Response
    {
        Person::find($id)->delete();

        return response()->noContent();
    }

    public function setAddress(Request $request, Person $person)
    {
        $validated = $request->validate([
            'address_id' => 'required|exists:addresses,id',
        ]);

        $person->address_id = $validated['address_id'];
        $person->save();

        // Pode retornar o endereço completo se quiser
        return response()->json($person->address);
    }
}
