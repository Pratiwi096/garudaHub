<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class BidSeeder extends Seeder
{
    public function run(): void
    {
        $developers = User::where('role', 'developer')->get();

        Project::all()->each(function (Project $project) use ($developers) {
            $developers->random(2)->each(function (User $dev) use ($project) {
                $project->bids()->create([
                    'developer_id' => $dev->id,
                    'price' => (int) ($project->budget * fake()->randomFloat(2, 0.8, 1.1)),
                    'duration_days' => fake()->numberBetween(7, 30),
                    'proposal' => 'Saya siap mengerjakan proyek ini sesuai kebutuhan dan tenggat yang diminta.',
                ]);
            });
        });
    }
}
