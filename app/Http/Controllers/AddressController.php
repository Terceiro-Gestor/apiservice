<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $addresses = Address::paginate();

        return view('address.index', compact('addresses'))
            ->with('i', ($request->input('page', 1) - 1) * $addresses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $address = new Address();

        return view('address.create', compact('address'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddressRequest $request): RedirectResponse
    {
        Address::create($request->validated());

        return Redirect::route('addresses.index')
            ->with('success', 'Address created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $address = Address::find($id);

        return view('address.show', compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $address = Address::find($id);

        return view('address.edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddressRequest $request, Address $address): RedirectResponse
    {
        $address->update($request->validated());

        return Redirect::route('addresses.index')
            ->with('success', 'Address updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Address::find($id)->delete();

        return Redirect::route('addresses.index')
            ->with('success', 'Address deleted successfully');
    }
}
