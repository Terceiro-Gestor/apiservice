<?php

namespace App\Http\Controllers;

use App\Models\Suspension;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SuspensionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SuspensionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $suspensions = Suspension::paginate();

        return view('suspension.index', compact('suspensions'))
            ->with('i', ($request->input('page', 1) - 1) * $suspensions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $suspension = new Suspension();

        return view('suspension.create', compact('suspension'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SuspensionRequest $request): RedirectResponse
    {
        Suspension::create($request->validated());

        return Redirect::route('suspensions.index')
            ->with('success', 'Suspension created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $suspension = Suspension::find($id);

        return view('suspension.show', compact('suspension'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $suspension = Suspension::find($id);

        return view('suspension.edit', compact('suspension'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuspensionRequest $request, Suspension $suspension): RedirectResponse
    {
        $suspension->update($request->validated());

        return Redirect::route('suspensions.index')
            ->with('success', 'Suspension updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Suspension::find($id)->delete();

        return Redirect::route('suspensions.index')
            ->with('success', 'Suspension deleted successfully');
    }
}
