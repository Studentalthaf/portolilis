<?php

namespace App\Http\Controllers;

use App\Models\Sharing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SharingController extends Controller
{
    public function index()
    {
        $sharings = Sharing::latest()->get();
        return view('dashboard.sharings.index', compact('sharings'));
    }

    public function create()
    {
        return view('dashboard.sharings.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|max:2048',
            'kategori' => 'required|in:Tutorial,Tips,Informasi,Rekomendasi',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('sharings', 'public');
        }

        Sharing::create($validated);

        return redirect()->route('sharings.index')->with('success', 'Sharing berhasil ditambahkan!');
    }

    public function edit(Sharing $sharing)
    {
        return view('dashboard.sharings.edit', compact('sharing'));
    }

    public function update(Request $request, Sharing $sharing)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|max:2048',
            'kategori' => 'required|in:Tutorial,Tips,Informasi,Rekomendasi',
        ]);

        if ($request->hasFile('foto')) {
            if ($sharing->foto) {
                Storage::disk('public')->delete($sharing->foto);
            }
            $validated['foto'] = $request->file('foto')->store('sharings', 'public');
        }

        $sharing->update($validated);

        return redirect()->route('sharings.index')->with('success', 'Sharing berhasil diupdate!');
    }

    public function destroy(Sharing $sharing)
    {
        if ($sharing->foto) {
            Storage::disk('public')->delete($sharing->foto);
        }

        $sharing->delete();

        return redirect()->route('sharings.index')->with('success', 'Sharing berhasil dihapus!');
    }
}
