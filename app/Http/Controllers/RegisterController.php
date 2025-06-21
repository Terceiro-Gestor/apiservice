<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $registers = Register::paginate();

        return view('register.index', compact('registers'))
            ->with('i', ($request->input('page', 1) - 1) * $registers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $register = new Register();

        return view('register.create', compact('register'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        Register::create($request->validated());

        return Redirect::route('registers.index')
            ->with('success', 'Register created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $register = Register::find($id);

        return view('register.show', compact('register'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $register = Register::find($id);

        return view('register.edit', compact('register'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RegisterRequest $request, Register $register): RedirectResponse
    {
        $register->update($request->validated());

        return Redirect::route('registers.index')
            ->with('success', 'Register updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Register::find($id)->delete();

        return Redirect::route('registers.index')
            ->with('success', 'Register deleted successfully');
    }
}
