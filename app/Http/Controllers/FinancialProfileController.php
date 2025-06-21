<?php

namespace App\Http\Controllers;

use App\Models\FinancialProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\FinancialProfileRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FinancialProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $financialProfiles = FinancialProfile::paginate();

        return view('financial-profile.index', compact('financialProfiles'))
            ->with('i', ($request->input('page', 1) - 1) * $financialProfiles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $financialProfile = new FinancialProfile();

        return view('financial-profile.create', compact('financialProfile'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FinancialProfileRequest $request): RedirectResponse
    {
        FinancialProfile::create($request->validated());

        return Redirect::route('financial-profiles.index')
            ->with('success', 'FinancialProfile created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $financialProfile = FinancialProfile::find($id);

        return view('financial-profile.show', compact('financialProfile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $financialProfile = FinancialProfile::find($id);

        return view('financial-profile.edit', compact('financialProfile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FinancialProfileRequest $request, FinancialProfile $financialProfile): RedirectResponse
    {
        $financialProfile->update($request->validated());

        return Redirect::route('financial-profiles.index')
            ->with('success', 'FinancialProfile updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        FinancialProfile::find($id)->delete();

        return Redirect::route('financial-profiles.index')
            ->with('success', 'FinancialProfile deleted successfully');
    }
}
