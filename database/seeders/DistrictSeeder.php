<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\District;
use Illuminate\Support\Str;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts = ['Kathmandu', 'Lalitpur', 'Bhaktapur'];

        foreach ($districts as $d) {
            District::create([
                'title' => $d,
                'key' => Str::slug($d, '_'),
                'slug' => Str::slug($d),
                'status' => 1,
                'created_by' => 1,
                'created_at' => now()->timestamp
            ]);
        }
    }
}
