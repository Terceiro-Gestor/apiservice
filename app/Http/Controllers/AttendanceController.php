<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AttendanceRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $attendances = Attendance::paginate();

        return view('attendance.index', compact('attendances'))
            ->with('i', ($request->input('page', 1) - 1) * $attendances->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $attendance = new Attendance();

        return view('attendance.create', compact('attendance'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AttendanceRequest $request): RedirectResponse
    {
        Attendance::create($request->validated());

        return Redirect::route('attendances.index')
            ->with('success', 'Attendance created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $attendance = Attendance::find($id);

        return view('attendance.show', compact('attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $attendance = Attendance::find($id);

        return view('attendance.edit', compact('attendance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AttendanceRequest $request, Attendance $attendance): RedirectResponse
    {
        $attendance->update($request->validated());

        return Redirect::route('attendances.index')
            ->with('success', 'Attendance updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Attendance::find($id)->delete();

        return Redirect::route('attendances.index')
            ->with('success', 'Attendance deleted successfully');
    }
}
