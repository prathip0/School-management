<?php

namespace Database\Seeders;

use App\Models\FeeCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Toddlers',
                'age_range' => 'Ages 2-3',
                'description' => 'Toddler program',
                'min_age' => 2,
                'max_age' => 3,
            ],  
            [
                'name' => 'Nursery/Reception',
                'age_range' => 'Ages 3-4',
                'description' => 'Nursery and Reception program',
                'min_age' => 3,
                'max_age' => 4,
            ],
            [
                'name' => 'Year 1-2',
                'age_range' => 'Ages 5-6',
                'description' => 'Year 1 and Year 2 program',
                'min_age' => 5,
                'max_age' => 6,
            ],
            [
                'name' => 'Year 3-6',
                'age_range' => 'Ages 7-12',
                'description' => 'Primary education program',
                'min_age' => 7,
                'max_age' => 12,
            ],
            [
                'name' => 'Year 7-11',
                'age_range' => 'Ages 13-16',
                'description' => 'Lower secondary program',
                'min_age' => 13,
                'max_age' => 16,
            ],
            [
                'name' => 'Year 12',
                'age_range' => 'Ages 16-17',
                'description' => 'Upper secondary program',
                'min_age' => 16,
                'max_age' => 17,
            ],
            [
                'name' => 'Year 13',
                'age_range' => 'Ages 17-18',
                'description' => 'Year 13 program',
                'min_age' => 17,
                'max_age' => 18,
            ],
        ];

        foreach ($categories as $category) {
            FeeCategory::firstOrCreate(
                ['name' => $category['name']],
                $category
            );
        }
    }
}
