<?php

namespace App\Helpers;

use App\Models\Criteria;
use App\Models\CriteriaSelected;

if (!function_exists('statusPengaduan')) {
    function statusPengaduan($status)
    {
        switch ($status) {
            case 'menunggu':
                return '<span class="badge-warning">Menunggu</span>';
            case 'diproses':
                return '<span class="badge-primary">Diproses</span>';
            case 'selesai':
                return '<span class="badge-success">Selesai</span>';
            default:
                return '<span class="me-2 self-start rounded bg-gray-100 px-2.5 py-0.5 text-sm font-medium text-gray-800 dark:bg-gray-900 dark:text-gray-300">Tidak Diketahui</span>';
        }
    }
}



if (!function_exists('getTotalKriteria')) {
    function getTotalKriteria($year)
    {

        $kriteriaSelected = CriteriaSelected::with('criteriaComparisons')
            ->where('nama', $year)
            ->get();

        $criteriaBySelected = [];
        $allUniqueKriteriaIds = collect();

        foreach ($kriteriaSelected as $selected) {
            $kriteriaIds = collect();

            foreach ($selected->criteriaComparisons as $comparison) {
                $kriteriaIds->push($comparison->kriteria1_id);
                $kriteriaIds->push($comparison->kriteria2_id);
            }

            // Remove duplicates
            $uniqueKriteriaIds = $kriteriaIds->unique();

            // Add to the collection of all unique IDs
            $allUniqueKriteriaIds = $allUniqueKriteriaIds->merge($uniqueKriteriaIds);

            // Get criteria names based on unique IDs
            $criteriaNames = Criteria::whereIn('id', $uniqueKriteriaIds)->pluck('nama');

            // Save criteria to associative array
            $criteriaBySelected[$selected->id] = $criteriaNames;
        }

        // Calculate the total number of unique criteria
        $totalUniqueCriteria = $allUniqueKriteriaIds->unique()->count();
        return $totalUniqueCriteria;
    }
}


if (!function_exists('formatAngka')) {
    function  formatAngka($desimal)
    {
        return number_format($desimal, 0, ",", ".");
    }
}
