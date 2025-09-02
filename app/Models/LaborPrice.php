<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaborPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_type',
        'price_per_kwintal',
        'description',
        'is_active'
    ];

    protected $casts = [
        'price_per_kwintal' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    /**
     * Get the price for a specific module type
     */
    public static function getPriceForModule($moduleType)
    {
        return self::where('module_type', $moduleType)
                   ->where('is_active', true)
                   ->first();
    }

    /**
     * Calculate payment based on weight and module type
     */
    public static function calculatePayment($weight, $moduleType)
    {
        $price = self::getPriceForModule($moduleType);
        if ($price) {
            return $weight * $price->price_per_kwintal;
        }
        return 0;
    }
}
