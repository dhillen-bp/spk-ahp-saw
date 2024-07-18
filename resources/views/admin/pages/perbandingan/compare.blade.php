@extends('admin.layouts.app')
@section('content')
    {{-- BREADCRUMB --}}
    <div class="my-10">
        <h1 class="my-4 text-3xl font-bold">PERBANDINGAN KRITERIA</h1>
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
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2">Perbandingan
                            Kriteria</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
    {{-- END BREADCRUMB --}}

    <div class="grid grid-cols-1 space-y-5 md:grid-cols-5 md:space-x-10 md:space-y-0">
        <div class="md:col-span-3">
            <form action="{{ route('admin.perbandingan.compareUpdate', $criteriaSelectedId) }}" method="POST">
                @csrf
                @method('PATCH')

                @foreach ($criteriaComparison as $data)
                    @php
                        $nilaiKriteria1 = $data->nilai_kriteria1;

                        if ($nilaiKriteria1 == 9.0) {
                            $value = -7;
                        } elseif ($nilaiKriteria1 == 8.0) {
                            $value = -6;
                        } elseif ($nilaiKriteria1 == 7.0) {
                            $value = -5;
                        } elseif ($nilaiKriteria1 == 6.0) {
                            $value = -4;
                        } elseif ($nilaiKriteria1 == 5.0) {
                            $value = -3;
                        } elseif ($nilaiKriteria1 == 4.0) {
                            $value = -2;
                        } elseif ($nilaiKriteria1 == 3.0) {
                            $value = -1;
                        } elseif ($nilaiKriteria1 == 2.0) {
                            $value = 0;
                        } elseif ($nilaiKriteria1 == 1.0) {
                            $value = 1;
                        } elseif ($nilaiKriteria1 == 0.5) {
                            $value = 2;
                        } elseif ($nilaiKriteria1 == 0.333) {
                            $value = 3;
                        } elseif ($nilaiKriteria1 == 0.25) {
                            $value = 4;
                        } elseif ($nilaiKriteria1 == 0.2) {
                            $value = 5;
                        } elseif ($nilaiKriteria1 == 0.167) {
                            $value = 6;
                        } elseif ($nilaiKriteria1 == 0.143) {
                            $value = 7;
                        } elseif ($nilaiKriteria1 == 0.125) {
                            $value = 8;
                        } elseif ($nilaiKriteria1 == 0.111) {
                            $value = 9;
                        } else {
                            $value = '';
                        }
                    @endphp

                    <div class="mb-10 rounded-lg bg-blue-50 p-5 shadow-lg">
                        <div class="flex justify-between">
                            <p class="font-bold">{{ $data['kriteria1']->nama }} </p>
                            <p class="font-bold">{{ $data['kriteria2']->nama }}</p>
                        </div>
                        <div class="relative mb-6">
                            <label for="labels-range-input" class="sr-only">Labels range</label>
                            {{-- {{ 'Nilai Value: ' . $value }}
                            {{ 'Nilai Kriteria1: ' . $data->nilai_kriteria1 }} --}}
                            <input id="labels-range-input" type="range" min="-7" max="9"
                                name="nilai[{{ $data->id }}]" value="{{ $value }}"
                                class="h-2 w-full cursor-pointer appearance-none rounded-lg bg-gray-200 dark:bg-gray-700">
                            <span class="absolute -bottom-6 start-0 text-sm text-gray-900 dark:text-gray-400">9</span>
                            <span
                                class="absolute -bottom-6 start-[12.5%] ml-1 -translate-x-1/2 text-sm text-gray-900 rtl:translate-x-1/2 dark:text-gray-400">7</span>
                            <span
                                class="absolute -bottom-6 start-[25%] ml-1 -translate-x-1/2 text-sm text-gray-900 rtl:translate-x-1/2 dark:text-gray-400">5</span>
                            <span
                                class="absolute -bottom-6 start-[37.5%] -translate-x-1/2 text-sm text-gray-900 rtl:translate-x-1/2 dark:text-gray-400">3</span>
                            <span
                                class="absolute -bottom-6 start-[50%] -translate-x-1/2 text-sm text-gray-900 rtl:translate-x-1/2 dark:text-gray-400">1</span>
                            <span
                                class="absolute -bottom-6 start-[62.5%] -translate-x-1/2 text-sm text-gray-900 rtl:translate-x-1/2 dark:text-gray-400">3</span>
                            <span
                                class="absolute -bottom-6 start-[75%] -ml-1 -translate-x-1/2 text-sm text-gray-900 rtl:translate-x-1/2 dark:text-gray-400">5</span>
                            <span
                                class="absolute -bottom-6 start-[87.5%] -ml-1 -translate-x-1/2 text-sm text-gray-900 rtl:translate-x-1/2 dark:text-gray-400">7</span>
                            <span
                                class="absolute -bottom-6 start-[100%] -ml-1 -translate-x-1/2 text-sm text-gray-900 rtl:translate-x-1/2 dark:text-gray-400">9</span>
                        </div>
                    </div>
                @endforeach

                <button type="submit"
                    class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Simpan
                    Perbandingan</button>
            </form>

            @if ($criteriaComparison[0]->nilai_kriteria1 > 0)
                <a href="{{ route('admin.perbandingan.compareResult', $criteriaSelectedId) }}">
                    <button
                        class="group relative mb-2 me-2 mt-5 inline-flex w-full items-center justify-center overflow-hidden rounded-lg bg-gradient-to-br from-purple-600 to-blue-500 p-0.5 text-sm font-medium text-gray-900 hover:text-white focus:outline-none focus:ring-4 focus:ring-blue-300 group-hover:from-purple-600 group-hover:to-blue-500 dark:text-white dark:focus:ring-blue-800">
                        <span
                            class="relative w-full rounded-md bg-white px-5 py-2.5 transition-all duration-75 ease-in group-hover:bg-opacity-0 dark:bg-gray-900">
                            Perhitungan AHP
                        </span>
                    </button>
                </a>
            @endif
        </div>

        {{-- TABEL KETERANGAN --}}
        <div class="col-span-2 rounded-lg bg-blue-50 p-4">
            <div class="sticky top-16">
                <h3 class="text-center text-lg font-bold">Keterangan Skala Kepentingan</h3>
                <table class="my-4 w-full border-2 border-gray-900 text-left rtl:text-right">
                    <thead>
                        <tr>
                            <th class="w-1/4 border-2 border-gray-900 p-2 text-center">Nilai</th>
                            <th class="w-3/4 border-2 border-gray-900 p-2 text-center">Definisi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        <tr>
                            <td class="border-2 border-gray-900 p-2">1</td>
                            <td class="border-2 border-gray-900 p-2">Sama Penting</td>
                        </tr>
                        <tr>
                            <td class="border-2 border-gray-900 p-2">3</td>
                            <td class="border-2 border-gray-900 p-2">Sedikit Lebih Penting</td>
                        </tr>
                        <tr>
                            <td class="border-2 border-gray-900 p-2">5</td>
                            <td class="border-2 border-gray-900 p-2">Lebih Penting</td>
                        </tr>
                        <tr>
                            <td class="border-2 border-gray-900 p-2">7</td>
                            <td class="border-2 border-gray-900 p-2">Sangat Penting</td>
                        </tr>
                        <tr>
                            <td class="border-2 border-gray-900 p-2">9</td>
                            <td class="border-2 border-gray-900 p-2">Mutlak Sangat Penting</td>
                        </tr>
                        <tr>
                            <td class="border-2 border-gray-900 p-2">2, 4, 6, 8</td>
                            <td class="border-2 border-gray-900 p-2">Perlu Pertimbangan Karena Berdekatan (Compromise Value)
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
