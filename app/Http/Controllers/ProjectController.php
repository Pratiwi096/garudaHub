<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::with('client')
            ->withCount('bids')
            ->when($request->q, function ($query, $q) {
                $query->where(function ($sub) use ($q) {
                    $sub->where('title', 'like', "%{$q}%")
                        ->orWhere('description', 'like', "%{$q}%");
                });
            })
            ->when($request->category, fn ($query, $c) => $query->where('category', $c))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('projects.index', compact('projects'));
    }

    public function create(Request $request)
    {
        abort_unless($request->user()->isClient(), 403);

        return view('projects.create');
    }

    public function store(Request $request)
    {
        abort_unless($request->user()->isClient(), 403);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'description' => ['required', 'string'],
            'category' => ['required', 'string', 'max:50'],
            'budget' => ['required', 'integer', 'min:0'],
            'bid_deadline' => ['required', 'date', 'after:now'],
        ]);

        $project = $request->user()->projects()->create($data);

        return redirect()->route('projects.show', $project)
            ->with('success', 'Proyek berhasil dipasang.');
    }

    public function show(Project $project)
    {
        $project->load(['client', 'bids.developer']);

        return view('projects.show', compact('project'));
    }

    public function edit(Request $request, Project $project)
    {
        $this->authorizeOwner($request, $project);

        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $this->authorizeOwner($request, $project);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'description' => ['required', 'string'],
            'category' => ['required', 'string', 'max:50'],
            'budget' => ['required', 'integer', 'min:0'],
            'bid_deadline' => ['required', 'date'],
        ]);

        $project->update($data);

        return redirect()->route('projects.show', $project)
            ->with('success', 'Proyek berhasil diperbarui.');
    }

    public function destroy(Request $request, Project $project)
    {
        $this->authorizeOwner($request, $project);

        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Proyek dihapus.');
    }

    // Hanya pemilik proyek atau admin
    private function authorizeOwner(Request $request, Project $project): void
    {
        $user = $request->user();

        abort_unless($user->isAdmin() || $project->client_id === $user->id, 403);
    }
}
