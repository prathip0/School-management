<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    /**
     * Show fees page with all categories and fees
     */
    public function index()
    {
        $currentYear = date('Y') . '-' . (date('Y') + 1);
        $categories = FeeCategory::with(['fees' => function($query) use ($currentYear) {
            $query->where('academic_year', $currentYear)->where('is_active', true);
        }])->orderBy('min_age')->get();

        return view('fees.index', compact('categories', 'currentYear'));
    }

    /**
     * Show fee calculator
     */
    public function calculator()
    {
        $currentYear = date('Y') . '-' . (date('Y') + 1);
        $categories = FeeCategory::with(['fees' => function($query) use ($currentYear) {
            $query->where('academic_year', $currentYear)->where('is_active', true);
        }])->orderBy('min_age')->get();

        return view('fees.calculator', compact('categories', 'currentYear'));
    }

    /**
     * Calculate fees for multiple children
     */
    public function calculateFees(Request $request)
    {
        $validated = $request->validate([
            'children' => 'required|array',
            'children.*.category_id' => 'required|exists:fee_categories,id',
            'children.*.payment_type' => 'required|in:annual,term',
        ]);

        $currentYear = date('Y') . '-' . (date('Y') + 1);
        $totalFee = 0;
        $breakdown = [];

        foreach ($validated['children'] as $child) {
            $fee = Fee::where('fee_category_id', $child['category_id'])
                ->where('academic_year', $currentYear)
                ->where('is_active', true)
                ->first();

            if ($fee) {
                $category = FeeCategory::find($child['category_id']);
                $amount = $child['payment_type'] === 'annual' ? $fee->annual_payment : $fee->totalTermPayment();
                
                $breakdown[] = [
                    'category_name' => $category->name,
                    'age_range' => $category->age_range,
                    'payment_type' => $child['payment_type'],
                    'amount' => $amount,
                ];

                $totalFee += $amount;
            }
        }

        return response()->json([
            'success' => true,
            'totalFee' => $totalFee,
            'breakdown' => $breakdown,
            'formattedTotal' => 'RM' . number_format($totalFee, 2),
        ]);
    }

    /**
     * Admin: Show all fees management
     */
    public function manage()
    {
        $categories = FeeCategory::with('fees')->orderBy('min_age')->get();
        return view('fees.manage', compact('categories'));
    }

    /**
     * Admin: Store new fee
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fee_category_id' => 'required|exists:fee_categories,id',
            'academic_year' => 'required|string',
            'annual_payment' => 'required|numeric|min:0',
            'term1_payment' => 'required|numeric|min:0',
            'term2_payment' => 'required|numeric|min:0',
            'term3_payment' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        Fee::create($validated);

        return redirect()->route('fees.manage')->with('success', 'Fee created successfully!');
    }

    /**
     * Admin: Update fee
     */
    public function update(Request $request, Fee $fee)
    {
        $validated = $request->validate([
            'annual_payment' => 'required|numeric|min:0',
            'term1_payment' => 'required|numeric|min:0',
            'term2_payment' => 'required|numeric|min:0',
            'term3_payment' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $fee->update($validated);

        return redirect()->route('fees.manage')->with('success', 'Fee updated successfully!');
    }

    /**
     * Admin: Delete fee
     */
    public function destroy(Fee $fee)
    {
        $fee->delete();
        return redirect()->route('fees.manage')->with('success', 'Fee deleted successfully!');
    }
}
