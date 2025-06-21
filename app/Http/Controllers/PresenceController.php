<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PresenceRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $presences = Presence::paginate();

        return view('presence.index', compact('presences'))
            ->with('i', ($request->input('page', 1) - 1) * $presences->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $presence = new Presence();

        return view('presence.create', compact('presence'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PresenceRequest $request): RedirectResponse
    {
        Presence::create($request->validated());

        return Redirect::route('presences.index')
            ->with('success', 'Presence created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $presence = Presence::find($id);

        return view('presence.show', compact('presence'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $presence = Presence::find($id);

        return view('presence.edit', compact('presence'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PresenceRequest $request, Presence $presence): RedirectResponse
    {
        $presence->update($request->validated());

        return Redirect::route('presences.index')
            ->with('success', 'Presence updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Presence::find($id)->delete();

        return Redirect::route('presences.index')
            ->with('success', 'Presence deleted successfully');
    }
}
