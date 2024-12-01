<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengunjungs = Pengunjung::all();
        return view('pengunjung.data', compact('pengunjungs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengunjung.input');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'idLibrary' => 'required|unique:pengunjungs',
            'password' => 'required',
            'email' => 'required|email|unique:pengunjungs',
        ]);
    
        Pengunjung::create([
            'nama' => $request->nama,
            'idLibrary' => $request->idLibrary,
            'password' => $request->password,
            'email' => $request->email,
        ]);
    
        return redirect()->route('p.index')->with('success', 'Pengunjung berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengunjung $pengunjung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengunjung $pengunjung)
    {
        return view('pengunjung.edit', compact('pengunjung'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengunjung $pengunjung)
    {
        $request->validate([
            'nama' => 'required',
            'idLibrary' => 'required|unique:pengunjungs,idLibrary,' . $pengunjung->id,
            'email' => 'required|email|unique:pengunjungs,email,' . $pengunjung->id,
        ]);

        $pengunjung->update([
            'nama' => $request->nama,
            'idLibrary' => $request->id_libray,
            'email' => $request->email,
        ]);

        return redirect()->route('p.index')->with('success', 'Pengunjung berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengunjung $pengunjung)
    {
        $pengunjung->delete();
        return redirect()->route('p.index')->with('success', 'Pengunjung berhasil dihapus.');
    }
}
