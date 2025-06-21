<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ReferralRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ReferralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $referrals = Referral::paginate();

        return view('referral.index', compact('referrals'))
            ->with('i', ($request->input('page', 1) - 1) * $referrals->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $referral = new Referral();

        return view('referral.create', compact('referral'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReferralRequest $request): RedirectResponse
    {
        Referral::create($request->validated());

        return Redirect::route('referrals.index')
            ->with('success', 'Referral created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $referral = Referral::find($id);

        return view('referral.show', compact('referral'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $referral = Referral::find($id);

        return view('referral.edit', compact('referral'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReferralRequest $request, Referral $referral): RedirectResponse
    {
        $referral->update($request->validated());

        return Redirect::route('referrals.index')
            ->with('success', 'Referral updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Referral::find($id)->delete();

        return Redirect::route('referrals.index')
            ->with('success', 'Referral deleted successfully');
    }
}
