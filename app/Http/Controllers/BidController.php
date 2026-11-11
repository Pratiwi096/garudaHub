<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BidController extends Controller
{
    // Developer mengajukan penawaran
    public function store(Request $request, Project $project)
    {
        abort_unless($request->user()->isDeveloper(), 403);

        if (! $project->isOpen()) {
            return back()->withErrors(['bid' => 'Lelang proyek ini sudah ditutup.']);
        }

        $data = $request->validate([
            'price' => ['required', 'integer', 'min:1'],
            'duration_days' => ['required', 'integer', 'min:1', 'max:1000'],
            'proposal' => ['required', 'string'],
        ]);

        // unique(project_id, developer_id) di DB; updateOrCreate agar tidak error duplikat
        $project->bids()->updateOrCreate(
            ['developer_id' => $request->user()->id],
            $data
        );

        return back()->with('success', 'Penawaran terkirim.');
    }

    // Klien memilih pemenang
    public function accept(Request $request, Bid $bid)
    {
        $project = $bid->project;

        abort_unless($project->client_id === $request->user()->id, 403);
        abort_if($project->status === 'awarded', 403, 'Pemenang sudah dipilih.');

        DB::transaction(function () use ($bid, $project) {
            $project->bids()->where('id', '!=', $bid->id)->update(['status' => 'rejected']);
            $bid->update(['status' => 'accepted']);
            $project->update(['status' => 'awarded']);
        });

        return back()->with('success', 'Pemenang dipilih.');
    }
}
