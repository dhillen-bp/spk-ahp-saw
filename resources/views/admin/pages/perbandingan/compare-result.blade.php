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

    <div class="space-y-10 pb-6">
        <!-- Tabel Matriks Penjumlahan Kolom Kriteria -->
        <div class="rounded-lg bg-slate-50 p-4">
            <h3 class="toggle-table mb-4 cursor-pointer text-lg font-bold" data-target="#sumColumnnMatrix">
                <span class="toggle-sign float-right">-</span>MATRIKS PENJUMLAHAN KOLOM KRITERIA
            </h3>
            <div id="sumColumnnMatrix" class="table-container">
                <table class="w-full border-2 border-gray-900 text-left text-sm text-gray-500 rtl:text-right">
                    <thead class="border-2 border-gray-900 bg-blue-200 text-center font-bold text-gray-900">
                        <tr class="border-2 border-gray-900">
                            <th class="border-2 border-gray-900 px-6 py-4">
                                <!-- Empty for the left top corner of the table -->
                            </th>
                            @foreach ($columns as $column)
                                <th class="border-2 border-gray-900 px-6 py-4">{{ $column }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($rows as $kriteria1 => $columnsData)
                            <tr class="text-gray-900">
                                <th class="border-2 border-gray-900 bg-blue-200 px-6 py-4">{{ $kriteria1 }}</th>
                                @foreach ($columnsData as $kriteria2 => $nilai)
                                    <td class="border-2 border-gray-900 px-6 py-4">{{ $nilai }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                        <tr class="bg-slate-900 text-white">
                            <th class="border-2 border-gray-900 px-6 py-4">Jumlah</th>
                            @foreach ($columns as $column)
                                <td class="border-2 border-gray-900 px-6 py-4 font-bold">
                                    {{ array_sum(array_column($rows, $column)) }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tabel Matriks Normalisasi Kriteria -->
        <div class="rounded-lg bg-slate-50 p-4">
            <h3 class="toggle-table mb-4 cursor-pointer text-lg font-bold" data-target="#normalizationMatrix">
                <span class="toggle-sign float-right">-</span> MATRIKS NORMALISASI KRITERIA
            </h3>
            <div id="normalizationMatrix" class="table-container">
                <table class="w-full border-2 border-gray-900 text-left text-xs text-gray-500 rtl:text-right">
                    <thead class="border-2 border-gray-900 bg-blue-200 text-center font-bold text-gray-900">
                        <tr class="border-2 border-gray-900">
                            <th class="border-2 border-gray-900 px-6 py-4">
                                <!-- Empty for the left top corner of the table -->
                            </th>
                            @foreach ($columns as $column)
                                <th class="border-2 border-gray-900 px-6 py-4">{{ $column }}</th>
                            @endforeach
                            <th class="border-2 border-gray-700 bg-slate-800 px-6 py-4 text-white">Jumlah</th>
                            <th class="border-2 border-gray-700 bg-slate-900 px-6 py-4 text-white">Nilai Prioritas</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($normalizedRows as $kriteria1 => $columnsData)
                            <tr class="text-gray-900">
                                <th class="border-2 border-gray-900 bg-blue-200 px-6 py-4">{{ $kriteria1 }}</th>
                                @foreach ($columnsData as $kriteria2 => $nilai)
                                    <td class="border-2 border-gray-900 px-6 py-4">{{ $nilai }}</td>
                                @endforeach
                                <td class="border-2 border-gray-700 bg-slate-800 px-6 py-4 text-white">
                                    {{ array_sum($columnsData) }}</td>
                                <td class="border-2 border-gray-700 bg-slate-900 px-6 py-4 text-white">
                                    {{ $priorityValues[$kriteria1] }}</td>
                            </tr>
                        @endforeach
                        <tr class="{{ $totalPriorityValues == 1 || 1.0 ? 'bg-green-500' : 'bg-red-500' }} text-white">
                            <th class="border-2 border-green-500 px-6 py-4">Total </th>
                            @foreach ($columns as $column)
                                <td class="border-2 border-green-500 px-6 py-4"></td>
                            @endforeach
                            <td class="border-2 border-green-500 px-6 py-4"></td>
                            <td class="border-2 border-green-500 px-6 py-4">{{ $totalPriorityValues }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <!-- Tabel Perhitungan Lambda Maks -->
        <div class="rounded-lg bg-slate-50 p-4">
            <h3 class="toggle-table mb-4 cursor-pointer text-lg font-bold" data-target="#lambdaMax">
                <span class="toggle-sign float-right">-</span> PERHITUNGAN LAMBDA MAKS
            </h3>
            <div id="lambdaMax" class="table-container">
                <table class="w-full border-2 border-gray-900 text-left text-sm text-gray-500 rtl:text-right">
                    <thead class="border-2 border-gray-900 bg-blue-200 text-center font-bold text-gray-900">
                        <tr class="border-2 border-gray-900">
                            <th class="border-2 border-gray-900 px-6 py-4">Kriteria</th>
                            @foreach ($columns as $column)
                                <th class="border-2 border-gray-900 px-6 py-4">{{ $column }}</th>
                            @endforeach
                            <th class="border-2 border-gray-700 bg-slate-800 px-6 py-4 text-white">Jumlah Per Baris</th>
                            <th class="border-2 border-gray-700 bg-slate-900 px-6 py-4 text-white">Hasil Bagi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @php
                            $totalHasilBagi = 0;
                        @endphp
                        @foreach ($rows as $kriteria1 => $columnsData)
                            <tr class="text-gray-900">
                                <th class="border-2 border-gray-900 bg-blue-200 px-6 py-4">{{ $kriteria1 }}</th>
                                @php
                                    $totalPerBaris = 0;
                                @endphp
                                @foreach ($columnsData as $kriteria2 => $nilai)
                                    @php
                                        // Mengalikan nilai dengan nilai prioritas yang didapat sebelumnya
                                        $nilaiPrioritas = $priorityValues[$kriteria2];
                                        $nilaiKalikan = $nilai * $nilaiPrioritas;
                                        $totalPerBaris += $nilaiKalikan;
                                    @endphp
                                    <td class="border-2 border-gray-900 px-6 py-4">{{ $nilaiKalikan }}</td>
                                @endforeach
                                @php
                                    // Hitung hasil bagi berdasarkan total per baris dibagi nilai prioritas kriteria1
                                    $hasilBagi = $totalPerBaris / $priorityValues[$kriteria1];
                                    $totalHasilBagi += $hasilBagi;
                                @endphp
                                <td class="border-2 border-gray-700 bg-slate-800 px-6 py-4 text-white">
                                    {{ $totalPerBaris }}
                                </td>
                                <td class="border-2 border-gray-700 bg-slate-900 px-6 py-4 text-white">{{ $hasilBagi }}
                                </td>
                            </tr>
                        @endforeach
                        <tr class="bg-slate-900 text-white">
                            <th colspan="{{ count($columns) + 2 }}" class="border-2 border-gray-900 px-6 py-4">Total
                                Hasil
                                Bagi
                            </th>
                            <td class="border-2 border-gray-900 px-6 py-4">{{ $totalHasilBagi }}</td>
                        </tr>
                        <tr class="bg-slate-900 text-white">
                            <th colspan="{{ count($columns) + 2 }}" class="border-2 border-gray-900 px-6 py-4">Lambda
                                Maks
                            </th>
                            <td class="border-2 border-gray-900 px-6 py-4">{{ $lambdaMaks }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>



        <!-- Konsistensi -->
        <div class="rounded-lg bg-slate-50 p-4">
            <h3 class="toggle-table mb-4 cursor-pointer text-lg font-bold" data-target="#consistencyChecking">
                <span class="toggle-sign float-right">-</span> MENGUKUR KONSISTENSI
            </h3>
            <div id="consistencyChecking" class="table-container">
                <table class="w-full border-2 border-gray-900 text-left text-sm text-gray-800 rtl:text-right">
                    <tbody>
                        <tr>
                            <th class="border-2 border-gray-900 bg-blue-200 px-6 py-4">Lambda Maks</th>
                            <td class="border-2 border-gray-900 px-6 py-4 font-semibold">{{ $lambdaMaks }}</td>
                        </tr>
                        <tr>
                            <th class="border-2 border-gray-900 bg-blue-200 px-6 py-4">CI</th>
                            <td class="border-2 border-gray-900 px-6 py-4 font-semibold">{{ $ci }}</td>
                        </tr>
                        <tr>
                            <th class="border-2 border-gray-900 bg-blue-200 px-6 py-4">CR</th>
                            <td class="border-2 border-gray-900 px-6 py-4 font-semibold">{{ $cr }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @if ($cr < 0.1)
            <div class="mb-4 flex items-center rounded-lg border border-green-300 bg-green-50 p-4 text-sm text-green-800 dark:border-green-800 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Hasil Konsisten!</span> Rasio konsistensi menunjukkan kurang dari <span
                        class="font-bold">0.1</span> yaitu sebesar <span class="font-bold">{{ $cr }}</span>.
                </div>
            </div>

            <form method="POST"
                action="{{ $isCriteriaPriorityValueExist ? route('admin.perbandingan.updatePriorityValue', $criteriaSelectedId) : route('admin.perbandingan.savePriorityValue', $criteriaSelectedId) }}">
                @csrf
                @if ($isCriteriaPriorityValueExist)
                    @method('PATCH')
                @endif
                <input type="hidden" name="criteria_priorities" value="{{ json_encode($priorityValues) }}">
                <button type="submit"
                    class="mb-2 me-2 w-full rounded-lg bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 px-5 py-2.5 text-center text-sm font-bold text-white hover:bg-gradient-to-br focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">
                    Simpan Bobot Prioritas
                </button>
            </form>
        @else
            <div class="mb-4 flex items-center rounded-lg border border-red-300 bg-red-50 p-4 text-sm text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Hasil Tidak Konsisisten!</span> Rasio konsistensi menunjukkan lebih dari
                    <span class="font-bold">0.1</span> yaitu sebesar <span class="font-bold">{{ $cr }}</span>.
                    Silakan lakukan evaluasi kembali perbandingan kriteria.
                </div>
            </div>
        @endif
    </div>
@endsection

@push('after-script')
    <script type="module">
        $(document).ready(function() {
            $('.toggle-table').click(function() {
                var target = $(this).data('target');
                $(target).toggle();
                var sign = $(target).is(':visible') ? '-' : '+';
                $(this).find('.toggle-sign').text(sign);
            });
        });
    </script>
@endpush
