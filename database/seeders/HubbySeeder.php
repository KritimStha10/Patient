<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Hubby;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HubbySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hubbies = ['Reading', 'Swimming', 'Gaming', 'Traveling', 'Cooking'];

        foreach ($hubbies as $hubby) {
            Hubby::create([
                'title' => $hubby,
                'key' => Str::slug($hubby, '_'),
                'slug' => Str::slug($hubby),
                'status' => 1,
                'created_by' => 1,
                'created_at' => now(),
            ]);
        }
    }
}
