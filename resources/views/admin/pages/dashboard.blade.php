@extends('admin.layouts.app')

@section('content')
    <div class="my-10">
        <h1 class="my-4 text-3xl font-bold">DASHBOARD</h1>
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 rtl:space-x-reverse md:space-x-2">
                <li aria-current="page">
                    <div class="flex items-center text-gray-500">
                        <svg class="me-0.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2">Dashboard</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="mt-4 text-gray-900">
            <p>Selamat Datang <span class="font-bold">{{ Auth::guard('admin')->user()->nama }}</span>, sebagai
                <span class="font-bold">
                    {{ Auth::guard('admin')->user()->role == 'pemerintah_desa' ? 'Pemerintah Desa' : 'RT/RW' }}</span>
            </p>
            <p>Berikut adalah data tahun {{ \Carbon\Carbon::now()->year }}</p>
        </div>
    </div>


    <div class="grid grid-cols-2 gap-5 md:grid-cols-3">
        <!-- Card 1: Kriteria -->
        <div class="max-w-sm rounded-lg border border-gray-200 bg-white p-6 shadow dark:border-gray-700 dark:bg-gray-800">
            @php
                $criteriaColorClass =
                    $criteriaPercentageChange > 0
                        ? 'text-green-500'
                        : ($criteriaPercentageChange < 0
                            ? 'text-red-500'
                            : 'text-blue-500');
            @endphp
            <div class="flex items-center justify-between">
                <div>
                    <span class="mb-2 block text-lg tracking-tight text-gray-600 dark:text-white">Jumlah Kriteria</span>
                    <span
                        class="mb-2 block text-5xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $countCriteriaCurrentYear }}</span>
                </div>

                <div class="flex flex-col items-center">
                    @include('partials.icons._kriteria-icon', [
                        'class' => 'h-20 w-20 ' . $criteriaColorClass,
                    ])
                    <div class="{{ $criteriaColorClass }} flex items-center">
                        <span>{{ number_format($criteriaPercentageChange, 2) }}%</span>
                        @if ($criteriaPercentageChange > 0)
                            @include('partials.icons._arrow-up-icon', ['class' => 'h-6 w-6'])
                        @elseif ($criteriaPercentageChange < 0)
                            @include('partials.icons._arrow-down-icon', ['class' => 'h-6 w-6'])
                        @else
                            @include('partials.icons._arrow-right-icon', ['class' => 'h-6 w-6'])
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Penerima -->
        <div class="max-w-sm rounded-lg border border-gray-200 bg-white p-6 shadow dark:border-gray-700 dark:bg-gray-800">
            @php
                $penerimaColorClass =
                    $penerimaPercentageChange > 0
                        ? 'text-green-500'
                        : ($penerimaPercentageChange < 0
                            ? 'text-red-500'
                            : 'text-blue-500');
            @endphp
            <div class="flex items-center justify-between">
                <div>
                    <span class="mb-2 block text-lg tracking-tight text-gray-600 dark:text-white">Jumlah Penerima</span>
                    <span
                        class="mb-2 block text-5xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $countPenerimaCurrentYear }}</span>
                </div>

                <div class="flex flex-col items-center">
                    @include('partials.icons.penerima-icon', [
                        'class' => 'h-20 w-20 ' . $penerimaColorClass,
                    ])
                    <div class="{{ $penerimaColorClass }} flex items-center">
                        <span>{{ number_format($penerimaPercentageChange, 2) }}%</span>
                        @if ($penerimaPercentageChange > 0)
                            @include('partials.icons._arrow-up-icon', ['class' => 'h-6 w-6'])
                        @elseif ($penerimaPercentageChange < 0)
                            @include('partials.icons._arrow-down-icon', ['class' => 'h-6 w-6'])
                        @else
                            @include('partials.icons._arrow-right-icon', ['class' => 'h-6 w-6'])
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3: Anggaran -->
        <div class="max-w-sm rounded-lg border border-gray-200 bg-white p-6 shadow dark:border-gray-700 dark:bg-gray-800">
            @php
                $budgetColorClass =
                    $budgetPercentageChange > 0
                        ? 'text-green-500'
                        : ($budgetPercentageChange < 0
                            ? 'text-red-500'
                            : 'text-blue-500');
            @endphp
            <div class="flex items-center justify-between">
                <div>
                    <span class="mb-2 block text-lg tracking-tight text-gray-600 dark:text-white">Anggaran Tersedia</span>
                    <span class="mb-2 block text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Rp
                        {{ $formattedAvailableBudget }}</span>
                </div>

                <div class="flex flex-col items-center">
                    @include('partials.icons._money-icon', [
                        'class' => 'h-20 w-20 ' . $budgetColorClass,
                    ])
                    <div class="{{ $budgetColorClass }} flex items-center">
                        <span>{{ number_format($budgetPercentageChange, 2) }}%</span>
                        @if ($budgetPercentageChange > 0)
                            @include('partials.icons._arrow-up-icon', ['class' => 'h-6 w-6'])
                        @elseif ($budgetPercentageChange < 0)
                            @include('partials.icons._arrow-down-icon', ['class' => 'h-6 w-6'])
                        @else
                            @include('partials.icons._arrow-right-icon', ['class' => 'h-6 w-6'])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
