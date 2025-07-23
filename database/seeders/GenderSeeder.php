<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Gender;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genders = ['Male', 'Female', 'Other'];

        foreach ($genders as $gender) {
            Gender::create([
                'title' => $gender,
                'key' => Str::slug($gender, '_'),
                'slug' => Str::slug($gender),
                'status' => 1,
                'created_by' => 1,
                'created_at' => now()->timestamp,
            ]);
        }

    }
}
