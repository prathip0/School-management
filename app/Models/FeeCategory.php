<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age_range',
        'description',
        'min_age',
        'max_age',
    ];

    /**
     * Get the fees for this category
     */
    public function fees()
    {
        return $this->hasMany(Fee::class);
    }

    /**
     * Get current year fees
     */
    public function currentYearFees()
    {
        $currentYear = date('Y') . '-' . (date('Y') + 1);
        return $this->fees()->where('academic_year', $currentYear)->first();
    }
}
