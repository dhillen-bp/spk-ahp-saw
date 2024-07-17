@extends('admin.layouts.app')

@section('content')
    {{-- BREADCRUMB --}}
    <div class="my-10">
        <h1 class="my-4 text-3xl font-bold">HASIL PERHITUNGAN SAW</h1>
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
                            Perbandingan Kriteria</a>
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
                            SAW</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
    {{-- END BREADCRUMB --}}

    <div class="space-y-10 pb-6">
        {{-- TABEL BOBOT PRIORITAS --}}
        <div class="rounded-lg bg-slate-50 p-4">
            <h3 class="mb-4 text-lg font-bold">TABEL NILAI ALTERNATIF</h3>
            <table class="w-full border-2 border-gray-900 text-left text-sm text-gray-500 rtl:text-right">
                <thead class="border-2 border-gray-900 bg-blue-200 text-center font-bold text-gray-900">
                    <tr class="border-2 border-gray-900">
                        @foreach ($criteriaPriorityValue as $priority)
                            <th class="border-2 border-gray-900 px-6 py-4">{{ $priority->criteria->nama }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr class="text-gray-900">
                        @foreach ($criteriaPriorityValue as $priority)
                            <td class="border-2 border-gray-900 px-6 py-4">{{ round($priority->nilai * 100, 3) }} %</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Tabel Nilai Alternatif --}}
        <div class="rounded-lg bg-slate-50 p-4">
            <h3 class="mb-4 text-lg font-bold">TABEL NILAI ALTERNATIF</h3>
            <table class="w-full border-2 border-gray-900 text-left text-sm text-gray-500 rtl:text-right">
                <thead class="border-2 border-gray-900 bg-blue-200 text-center font-bold text-gray-900">
                    <tr class="border-2 border-gray-900">
                        <th class="border-2 border-gray-900 px-6 py-4">Alternatif</th>
                        @foreach ($criteria as $criterion)
                            <th class="border-2 border-gray-900 px-6 py-4">{{ $criterion->nama }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($alternativeValues as $alternative => $values)
                        <tr class="text-gray-900">
                            <th class="border-2 border-gray-900 bg-blue-200 px-6 py-4">{{ $alternative }}</th>
                            @foreach ($values as $criterion => $value)
                                <td class="border-2 border-gray-900 px-6 py-4">{{ $value }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Matriks Normalisasi Alternatif --}}
        <div class="rounded-lg bg-slate-50 p-4">
            <h3 class="mb-4 text-lg font-bold">MATRIKS NORMALISASI ALTERNATIF</h3>
            <table class="w-full border-2 border-gray-900 text-left text-sm text-gray-500 rtl:text-right">
                <thead class="border-2 border-gray-900 bg-blue-200 text-center font-bold text-gray-900">
                    <tr class="border-2 border-gray-900">
                        <th class="border-2 border-gray-900 px-6 py-4">Alternatif</th>
                        @foreach ($criteria as $criterion)
                            <th class="border-2 border-gray-900 px-6 py-4">{{ $criterion->nama }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($normalizedMatrix as $alternative => $values)
                        <tr class="text-gray-900">
                            <th class="border-2 border-gray-900 bg-blue-200 px-6 py-4">{{ $alternative }}</th>
                            @foreach ($values as $criterion => $value)
                                <td class="border-2 border-gray-900 px-6 py-4">{{ $value }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Hasil Perangkingan --}}
        <div class="rounded-lg bg-slate-50 p-4">
            <h3 class="mb-4 text-lg font-bold">HASIL PERANGKINGAN SAW</h3>
            <table class="w-full border-2 border-gray-900 text-left text-sm text-gray-500 rtl:text-right">
                <thead class="border-2 border-gray-900 bg-blue-200 text-center font-bold text-gray-900">
                    <tr class="border-2 border-gray-900">
                        <th class="border-2 border-gray-900 px-6 py-4">Nama Alternatif</th>
                        <th class="border-2 border-gray-900 px-6 py-4">Skor</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($ranking as $id => $score)
                        <tr class="text-gray-900">
                            <td class="border-2 border-gray-900 px-6 py-4">{{ \App\Models\Alternative::find($id)->nama }}
                            </td>
                            <td class="border-2 border-gray-900 px-6 py-4">{{ $score }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- BUTTON SAVE --}}
        <form method="POST" action="{{ route('admin.pemeringkatan.saveSAWResult', $criteriaSelectedId) }}">
            @csrf
            <input type="hidden" name="ranking" value="{{ json_encode($ranking) }}">
            <input type="hidden" name="criteria_selected_id" value="{{ $criteriaSelectedId }}">
            <button type="submit"
                class="mb-2 me-2 w-full rounded-lg bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 px-5 py-2.5 text-center text-sm font-bold text-white hover:bg-gradient-to-br focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">
                Simpan Hasil SAW
            </button>
        </form>
    </div>
@endsection
