<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::latest()->get();
        return view('dashboard.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('dashboard.certificates.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal_perolehan' => 'required|date',
            'penerbit' => 'required|string|max:255',
            'bukti_sertifikat' => 'nullable|file|mimes:pdf|max:5120',
            'certificate_id' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('bukti_sertifikat')) {
            $validated['bukti_sertifikat'] = $request->file('bukti_sertifikat')->store('certificates', 'public');
        }

        Certificate::create($validated);

        return redirect()->route('certificates.index')->with('success', 'Certificate berhasil ditambahkan!');
    }

    public function edit(Certificate $certificate)
    {
        return view('dashboard.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal_perolehan' => 'required|date',
            'penerbit' => 'required|string|max:255',
            'bukti_sertifikat' => 'nullable|file|mimes:pdf|max:5120',
            'certificate_id' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('bukti_sertifikat')) {
            if ($certificate->bukti_sertifikat) {
                Storage::disk('public')->delete($certificate->bukti_sertifikat);
            }
            $validated['bukti_sertifikat'] = $request->file('bukti_sertifikat')->store('certificates', 'public');
        }

        $certificate->update($validated);

        return redirect()->route('certificates.index')->with('success', 'Certificate berhasil diupdate!');
    }

    public function destroy(Certificate $certificate)
    {
        if ($certificate->bukti_sertifikat) {
            Storage::disk('public')->delete($certificate->bukti_sertifikat);
        }

        $certificate->delete();

        return redirect()->route('certificates.index')->with('success', 'Certificate berhasil dihapus!');
    }
}
