<?php

namespace App\Http\Controllers;

use App\Models\Staf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StafController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staf = Staf::all();
        return view('staf.data', compact('staf'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staf.input');  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'idLibrary' => 'required|unique:staf',
            'password' => 'required',
            'email' => 'required|email|unique:staf',
            'no_telpon' => 'required',
            'level' => 'required|in:admin,pengunjung',
            'address' => 'required',
        ]);

        Staf::create([
            'name' => $request->name,
            'idLibrary' => $request->idLibrary,
            'password' =>$request->password,
            'email' => $request->email,
            'no_telpon' => $request->no_telpon,
            'level' => $request->level,
            'address' => $request->address,
        ]);

        return redirect()->route('s.index')->with('success', 'Staf created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Staf $staf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staf $staf)
    {
        return view('staf.edit', compact('staf'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staf $staf)
    {
        $request->validate([
            'name' => 'required',
            'idLibrary' => 'required|unique:staf,idLibrary,' . $staf->id,
            'email' => 'required|email|unique:staf,email,' . $staf->id,
            'no_telpon' => 'required',
            'level' => 'required|in:admin,pengunjung',
            'address' => 'required',
        ]);

        $staf->update([
            'name' => $request->name,
            'idLibrary' => $request->idLibrary,
            'email' => $request->email,
            'no_telpon' => $request->no_telpon,
            'level' => $request->level,
            'address' => $request->address,
        ]);

        return redirect()->route('s.index')->with('success', 'Staf updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staf $staf)
    {
        $staf->delete();
        return redirect()->route('s.index')->with('success', 'Staf deleted successfully.');
    }
}
