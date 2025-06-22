<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $contacts = Contact::paginate();

        return view('contact.index', compact('contacts'))
            ->with('i', ($request->input('page', 1) - 1) * $contacts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $contact = new Contact();

        return view('contact.create', compact('contact'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        $validated = $request->validated();
        
        $contact = Contact::create($validated);

        return response()->json($contact);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $contact = Contact::find($id);

        return view('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $contact = Contact::find($id);

        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, Contact $contact): RedirectResponse
    {
        $contact->update($request->validated());
        $personId = $contact->person->id;

        return Redirect::route('people.edit', ['person' => $personId])
            ->with('success', 'Contact updated successfully');
    }

    public function destroy($id)
    {
        $contact = Contact::find($id)->delete();

        return response()->json($contact);
    }
}
