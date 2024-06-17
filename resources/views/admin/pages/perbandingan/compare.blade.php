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
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-900 dark:text-gray-400 md:ms-2">Perbandingan
                            Kriteria</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
    {{-- END BREADCRUMB --}}

    @for ($i = 0; $i < $totalKriteria - 1; $i++)
        @for ($j = $i + 1; $j < $totalKriteria; $j++)
            @php
                $kriteria1 = $kriteria[$i]->nama;
                $kriteria2 = $kriteria[$j]->nama;
            @endphp
            <div class="mb-10 rounded-lg bg-blue-50 p-5 shadow-lg">
                <div class="flex justify-between">
                    <p>{{ $kriteria1 }} </p>
                    <p>{{ $kriteria2 }}</p>
                </div>
                <div class="relative mb-6">
                    <label for="labels-range-input" class="sr-only">Labels range</label>
                    <input id="labels-range-input" type="range" value="0" min="-9" max="9"
                        class="h-2 w-full cursor-pointer appearance-none rounded-lg bg-gray-200 dark:bg-gray-700">
                    <span class="absolute -bottom-6 start-0 text-sm text-gray-900 dark:text-gray-400">9</span>
                    <span
                        class="absolute -bottom-6 start-[12.5%] -translate-x-1/2 text-sm text-gray-900 rtl:translate-x-1/2 dark:text-gray-400">7</span>
                    <span
                        class="absolute -bottom-6 start-[25%] -translate-x-1/2 text-sm text-gray-900 rtl:translate-x-1/2 dark:text-gray-400">5</span>
                    <span
                        class="absolute -bottom-6 start-[37.5%] -translate-x-1/2 text-sm text-gray-900 rtl:translate-x-1/2 dark:text-gray-400">3</span>
                    <span
                        class="absolute -bottom-6 start-[50%] -translate-x-1/2 text-sm text-gray-900 rtl:translate-x-1/2 dark:text-gray-400">1</span>
                    <span
                        class="absolute -bottom-6 start-[62.5%] -translate-x-1/2 text-sm text-gray-900 rtl:translate-x-1/2 dark:text-gray-400">3</span>
                    <span
                        class="absolute -bottom-6 start-[75%] -translate-x-1/2 text-sm text-gray-900 rtl:translate-x-1/2 dark:text-gray-400">5</span>
                    <span
                        class="absolute -bottom-6 start-[87.5%] -translate-x-1/2 text-sm text-gray-900 rtl:translate-x-1/2 dark:text-gray-400">7</span>
                    <span
                        class="absolute -bottom-6 start-[100%] -translate-x-1/2 text-sm text-gray-900 rtl:translate-x-1/2 dark:text-gray-400">9</span>
                </div>
            </div>
        @endfor
    @endfor

@endsection
