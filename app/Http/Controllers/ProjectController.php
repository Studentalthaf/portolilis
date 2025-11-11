<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('dashboard.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('dashboard.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'durasi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'dokumentasi' => 'nullable|image|max:2048',
            'tech_stack' => 'nullable|string',
            'status' => 'required|in:completed,in_progress',
        ]);

        if ($request->hasFile('dokumentasi')) {
            $validated['dokumentasi'] = $request->file('dokumentasi')->store('projects', 'public');
        }

        if ($request->tech_stack) {
            $validated['tech_stack'] = array_map('trim', explode(',', $request->tech_stack));
        }

        Project::create($validated);

        return redirect()->route('projects.index')->with('success', 'Project berhasil ditambahkan!');
    }

    public function edit(Project $project)
    {
        return view('dashboard.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'durasi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'dokumentasi' => 'nullable|image|max:2048',
            'tech_stack' => 'nullable|string',
            'status' => 'required|in:completed,in_progress',
        ]);

        if ($request->hasFile('dokumentasi')) {
            if ($project->dokumentasi) {
                Storage::disk('public')->delete($project->dokumentasi);
            }
            $validated['dokumentasi'] = $request->file('dokumentasi')->store('projects', 'public');
        }

        if ($request->tech_stack) {
            $validated['tech_stack'] = array_map('trim', explode(',', $request->tech_stack));
        }

        $project->update($validated);

        return redirect()->route('projects.index')->with('success', 'Project berhasil diupdate!');
    }

    public function destroy(Project $project)
    {
        if ($project->dokumentasi) {
            Storage::disk('public')->delete($project->dokumentasi);
        }

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project berhasil dihapus!');
    }
}
