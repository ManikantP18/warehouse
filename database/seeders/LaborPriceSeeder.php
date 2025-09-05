<?php

namespace Database\Seeders;
namespace App\Models;

use Illuminate\Database\Seeder;
use App\Models\LaborPrice;

class LaborPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create default prices for each module
        $prices = [
            [
                'module_type' => 'staging',
                'price_per_kwintal' => 50.00,
                'description' => 'Default staging labor price per kwintal',
                'is_active' => true
            ],
            [
                'module_type' => 'grading',
                'price_per_kwintal' => 75.00,
                'description' => 'Default grading labor price per kwintal',
                'is_active' => true
            ],
            [
                'module_type' => 'packing',
                'price_per_kwintal' => 100.00,
                'description' => 'Default packing labor price per kwintal',
                'is_active' => true
            ]
        ];

        foreach ($prices as $price) {
            LaborPrice::create($price);
        }
    }
}
