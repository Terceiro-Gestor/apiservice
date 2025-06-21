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
        $address = null;
        $contact = null;
        return view('person.create', compact('person', 'address', 'contact'))
            ->with('i', 0);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonRequest $request): RedirectResponse
    {
        // Valida os dados da requisição

        $validated = $request->validated();

        DB::transaction(function () use ($validated, $request) {

            // 1. Busca ou cria o endereço compartilhado
            $address = Address::findOrCreateFromData($validated);

            // 2. Salva a foto, se enviada
            $photoPath = null;
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('people_photos', 'public');
                // Isso salva em: storage/app/public/people_photos/xxxx.jpg
            }

            // 2. Cria a pessoa vinculada ao endereço
            $person = Person::create([
                'photo'          => $photoPath, // salva caminho no banco
                'full_name'      => $validated['full_name'],
                'social_name'    => $validated['social_name'],
                'birth_date'     => $validated['birth_date'],
                'ethnicity'      => $validated['ethnicity'],
                'marital_status' => $validated['marital_status'],
                'country'        => $validated['country'],
                'state'          => $validated['state'],
                'city'           => $validated['city'],
                'nis'            => $validated['nis'],
                'cpf'            => $validated['cpf'],
                'rg'             => $validated['rg'],
                'address_id'     => $address->id,
            ]);
            
            // 4. Salvar contatos, se houver
            foreach ($validated['contacts'] ?? [] as $contact) {
                // Evita salvar contatos vazios
                if (!empty($contact['type']) && !empty($contact['value'])) {
                    $person->contacts()->create([
                        'type'  => $contact['type'],
                        'value' => $contact['value'],
                    ]);
                }
            }
        });

        return Redirect::route('people.index')
            ->with('success', 'Person created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $person = Person::find($id);
        return view('person.show', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        // Carrega a pessoa com todos os relacionamentos
        $person = Person::with([
            'address', 'contacts'
        ])->findOrFail($id);

        $address = $person->address; // Obtém o endereço associado à pessoa
        $contacts = $person->contacts; // Obtém o contato associado à pessoa, se existir
        return view('person.edit', compact('person', 'address', 'contacts'))
            ->with('i', 0);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonRequest $request, Person $person): RedirectResponse
    {
        $validated = $request->validated();

        // Obtém ou cria o endereço compartilhado
        $address = Address::findOrCreateFromData($validated);

        // Atualiza os dados da pessoa
        $person->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'birth_date' => $validated['birth_date'],
            'address_id' => $address->id
        ]);

        return Redirect::route('people.index')
            ->with('success', 'Person updated successfully');
    }

    public function destroy($id): Response
    {
        Person::find($id)->delete();

        return response()->noContent();
    }

    public function address($validated)
    {
        // Busca ou cria o endereço compartilhado
        $address = Address::firstOrCreate([
            'street' => $validated['street'],
            'number' => $validated['number'],
            'complement' => $validated['complement'] ?? null,
            'district' => $validated['district'],
            'city' => $validated['city'],
            'state' => $validated['state'],
            'country' => $validated['country'],
            'postal_code' => $validated['postal_code'],
        ]);

        return $address;
    }
}
