<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::orderBy('urutan')->get();
        return view('dashboard.education.index', compact('educations'));
    }

    public function create()
    {
        return view('dashboard.education.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'institusi' => 'required|string|max:255',
            'tingkat' => 'required|in:SD,SMP,SMA,Universitas',
            'tahun_mulai' => 'required|string|max:4',
            'tahun_selesai' => 'required|string|max:4',
            'keterangan' => 'nullable|string',
            'urutan' => 'required|integer|min:0',
        ]);

        Education::create($validated);

        return redirect()->route('education.index')->with('success', 'Education berhasil ditambahkan!');
    }

    public function edit(Education $education)
    {
        return view('dashboard.education.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $validated = $request->validate([
            'institusi' => 'required|string|max:255',
            'tingkat' => 'required|in:SD,SMP,SMA,Universitas',
            'tahun_mulai' => 'required|string|max:4',
            'tahun_selesai' => 'required|string|max:4',
            'keterangan' => 'nullable|string',
            'urutan' => 'required|integer|min:0',
        ]);

        $education->update($validated);

        return redirect()->route('education.index')->with('success', 'Education berhasil diupdate!');
    }

    public function destroy(Education $education)
    {
        $education->delete();

        return redirect()->route('education.index')->with('success', 'Education berhasil dihapus!');
    }
}
