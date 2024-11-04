<?php

namespace App\Http\Controllers;

use App\Models\Pengguna; // Pastikan model di-import di sini
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = Pengguna::all();
        return view('pengguna.index', compact('pengguna'));
    }

    public function create()
    {
        return view('pengguna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:pengguna',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
        ]);

        Pengguna::create($request->all());
        return redirect()->route('pengguna.index')->with('success', 'Pengguna created successfully.');
    }

    public function edit(Pengguna $pengguna)
    {
        return view('pengguna.edit', compact('pengguna'));
    }

    public function update(Request $request, Pengguna $pengguna)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:pengguna,email,' . $pengguna->id,
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
        ]);

        $pengguna->update($request->all());
        return redirect()->route('pengguna.index')->with('success', 'Pengguna updated successfully.');
    }

    public function destroy(Pengguna $pengguna)
    {
        $pengguna->delete();
        return redirect()->route('pengguna.index')->with('success', 'User deleted successfully.');
    }
}
