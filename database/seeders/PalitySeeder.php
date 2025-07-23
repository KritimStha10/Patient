<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pality;
use App\Models\District;
use Illuminate\Support\Str;

class PalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $palities = [
            'Kathmandu' => ['Kathmandu Metropolitan', 'Kageshwori Manohara', 'Tokha'],
            'Lalitpur' => ['Lalitpur Metropolitan', 'Godawari', 'Mahalaxmi'],
            'Bhaktapur' => ['Bhaktapur Municipality', 'Changunarayan', 'Madhyapur Thimi'],
        ];

        foreach ($palities as $districtTitle => $palityList) {
            $district = District::where('title', $districtTitle)->first();
            if (!$district) continue;

            foreach ($palityList as $pality) {
                Pality::create([
                    'district_id' => $district->id,
                    'title' => $pality,
                    'key' => Str::slug($pality, '_'),
                    'slug' => Str::slug($pality),
                    'status' => 1,
                    'created_by' => 1,
                    'created_at' => now()->timestamp,
                ]);
            }
        }
    }
}
