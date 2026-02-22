<?php

namespace Database\Seeders;

use App\Models\Fee;
use App\Models\FeeCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $academicYear = '2025-2026';

        $fees = [
            [
                'category_name' => 'Toddlers',
                'annual_payment' => 274000,
                'term1_payment' => 95300,
                'term2_payment' => 89350,
                'term3_payment' => 89350,
            ],
            [
                'category_name' => 'Nursery/Reception',
                'annual_payment' => 304000,
                'term1_payment' => 133400,
                'term2_payment' => 85300,
                'term3_payment' => 85300,
            ],
            [
                'category_name' => 'Year 1-2',
                'annual_payment' => 338000,
                'term1_payment' => 146000,
                'term2_payment' => 88500,
                'term3_payment' => 103500,
            ],
            [
                'category_name' => 'Year 3-6',
                'annual_payment' => 374000,
                'term1_payment' => 161000,
                'term2_payment' => 101500,
                'term3_payment' => 111500,
            ],
            [
                'category_name' => 'Year 7-11',
                'annual_payment' => 399750,
                'term1_payment' => 174800,
                'term2_payment' => 104500,
                'term3_payment' => 120450,
            ],
            [
                'category_name' => 'Year 12',
                'annual_payment' => 399750,
                'term1_payment' => 174800,
                'term2_payment' => 104500,
                'term3_payment' => 120450,
            ],
            [
                'category_name' => 'Year 13',
                'annual_payment' => 399750,
                'term1_payment' => 174800,
                'term2_payment' => 104500,
                'term3_payment' => 120450,
            ],
        ];

        foreach ($fees as $feeData) {
            $category = FeeCategory::where('name', $feeData['category_name'])->first();
            if ($category) {
                Fee::firstOrCreate(
                    [
                        'fee_category_id' => $category->id,
                        'academic_year' => $academicYear,
                    ],
                    [
                        'annual_payment' => $feeData['annual_payment'],
                        'term1_payment' => $feeData['term1_payment'],
                        'term2_payment' => $feeData['term2_payment'],
                        'term3_payment' => $feeData['term3_payment'],
                        'is_active' => true,
                    ]
                );
            }
        }
    }
}
