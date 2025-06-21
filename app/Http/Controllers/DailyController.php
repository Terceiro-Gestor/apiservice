<?php

namespace App\Http\Controllers;

use App\Models\Daily;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DailyRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DailyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $dailies = Daily::paginate();

        return view('daily.index', compact('dailies'))
            ->with('i', ($request->input('page', 1) - 1) * $dailies->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $daily = new Daily();

        return view('daily.create', compact('daily'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DailyRequest $request): RedirectResponse
    {
        Daily::create($request->validated());

        return Redirect::route('dailies.index')
            ->with('success', 'Daily created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $daily = Daily::find($id);

        return view('daily.show', compact('daily'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $daily = Daily::find($id);

        return view('daily.edit', compact('daily'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DailyRequest $request, Daily $daily): RedirectResponse
    {
        $daily->update($request->validated());

        return Redirect::route('dailies.index')
            ->with('success', 'Daily updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Daily::find($id)->delete();

        return Redirect::route('dailies.index')
            ->with('success', 'Daily deleted successfully');
    }
}
