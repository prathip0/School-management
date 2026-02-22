<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'fee_category_id',
        'academic_year',
        'annual_payment',
        'term1_payment',
        'term2_payment',
        'term3_payment',
        'notes',
        'is_active',
    ];

    protected $casts = [
        'annual_payment' => 'decimal:2',
        'term1_payment' => 'decimal:2',
        'term2_payment' => 'decimal:2',
        'term3_payment' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    /**
     * Get the fee category
     */
    public function category()
    {
        return $this->belongsTo(FeeCategory::class, 'fee_category_id');
    }

    /**
     * Calculate total for three terms
     */
    public function totalTermPayment()
    {
        return $this->term1_payment + $this->term2_payment + $this->term3_payment;
    }
}
