<?php

namespace App\Http\Controllers;

use App\Models\CriteriaSelected;
use Illuminate\Http\Request;

use function App\Helpers\formatAngka;
use function App\Helpers\getTotalKriteria;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentYear = now()->year;
        $lastYear = $currentYear - 1;

        $countCriteriaCurrentYear =  getTotalKriteria($currentYear) ?? 0;
        $countCriteriaLastYear = getTotalKriteria($lastYear) ?? 0;
        if ($countCriteriaLastYear > 0) {
            $criteriaPercentageChange = (($countCriteriaCurrentYear - $countCriteriaLastYear) / $countCriteriaLastYear) * 100;
        } else {
            $criteriaPercentageChange = $countCriteriaCurrentYear > 0 ? 100 : 0;
        }

        $checkPenerima = CriteriaSelected::where('nama', $currentYear)->first();
        $checkPenerimaLastYear = CriteriaSelected::where('nama', $lastYear)->first();

        $countPenerimaCurrentYear = $checkPenerima->jumlah_penerima ?? 0;
        $countPenerimaLastYear = $checkPenerimaLastYear->jumlah_penerima ?? 0;

        if ($countPenerimaCurrentYear > 0) {
            $penerimaPercentageChange = (($countPenerimaCurrentYear - $countPenerimaLastYear) / $countPenerimaLastYear) * 100;
        } else {
            $penerimaPercentageChange = $countPenerimaCurrentYear > 0 ? 100 : 0;
        }

        $availableBudgetCurrentYear = 300_000 * $countPenerimaCurrentYear * 12;
        $availableBudgetLastYear = 300_000 * $countPenerimaLastYear * 12;
        if ($availableBudgetLastYear > 0) {
            $budgetPercentageChange = (($availableBudgetCurrentYear - $availableBudgetLastYear) / $availableBudgetLastYear) * 100;
        } else {
            $budgetPercentageChange = $availableBudgetCurrentYear > 0 ? 100 : 0;
        }
        $formattedAvailableBudget = formatAngka($availableBudgetCurrentYear);

        return view('admin.pages.dashboard', compact('countCriteriaCurrentYear', 'countPenerimaCurrentYear', 'formattedAvailableBudget', 'criteriaPercentageChange', 'penerimaPercentageChange', 'budgetPercentageChange'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
