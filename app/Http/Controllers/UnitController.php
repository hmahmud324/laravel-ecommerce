<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.unit.manage', ['units' => Unit::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.unit.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Unit::newUnit($request);
        return back()->with('message', 'Unit info created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        return view('admin.unit.edit', ['unit' => $unit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        Unit::updateUnit($request, $unit->id);
        return redirect('/unit')->with('message', 'Unit info updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        Unit::deleteUnit($unit->id);
        return back()->with('message', 'Unit Info deleted successfully.');

    }
}
