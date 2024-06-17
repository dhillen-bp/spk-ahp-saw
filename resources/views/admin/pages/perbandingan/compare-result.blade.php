@extends('admin.layouts.app')
@section('content')
    {{-- BREADCRUMB --}}
    <div class="my-10">
        <h1 class="my-4 text-3xl font-bold">HASIL PERHITUNGAN AHP</h1>
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 rtl:space-x-reverse md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="{{ route('admin.index') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        @include('partials.icons._dashboard-icon', ['class' => 'me-0.5 h-3 w-3'])
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="{{ route('admin.perbandingan.index') }}"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white md:ms-2">Tabel
                            Perbandingan
                            Kriteria</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="{{ route('admin.perbandingan.compareUpdate', $criteriaSelectedId) }}"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white md:ms-2">
                            Perbandingan
                            Kriteria</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2">Hasil Perhitungan
                            AHP</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
    {{-- END BREADCRUMB --}}

    <div class="my-6">
        <div class="space-y-2 rounded-lg bg-slate-50 p-4">
            <h3 class="text-lg font-bold">MATRIKS PENJUMLAHAN KOLOM KRITERIA</h3>
            <table class="w-full border-2 border-gray-900 text-left text-sm text-gray-500 rtl:text-right">
                <thead class="border-2 border-gray-900 bg-blue-200 text-center font-bold uppercase text-gray-700">
                    <tr class="border-2 border-gray-900">
                        <th scope="col" class="w-1/3 border-2 border-gray-900 px-6 py-4">
                            Kriteria
                        </th>
                        <th scope="col" class="w-1/3 border-2 border-gray-900 px-6 py-4">
                            C1
                        </th>
                        <th scope="col" class="w-1/3 border-2 border-gray-900 px-6 py-4">
                            C2
                        </th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr class="h text-gray-900">
                        <th class="w-1/3 border-2 border-gray-900 bg-blue-200 px-6 py-4">
                            C1
                        </th>
                        <td class="w-1/3 border-2 border-gray-900 px-6 py-4">
                            1
                        </td>
                        <td class="w-1/3 border-2 border-gray-900 px-6 py-4">
                            1
                        </td>
                    </tr>
                    <tr class="text-gray-900">
                        <th class="w-1/3 border-2 border-gray-900 bg-blue-200 px-6 py-4">
                            C2
                        </th>
                        <td class="w-1/3 border-2 border-gray-900 px-6 py-4">
                            1
                        </td>
                        <td class="w-1/3 border-2 border-gray-900 px-6 py-4">
                            1
                        </td>
                    </tr>
                    <tr class="bg-slate-900 text-white">
                        <th class="w-1/3 border-2 border-gray-500 px-6 py-4">
                            Jumlah
                        </th>
                        <td class="w-1/3 border-2 border-gray-500 px-6 py-4">
                            1
                        </td>
                        <td class="w-1/3 border-2 border-gray-500 px-6 py-4">
                            1
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
@endsection
