@extends('admin.layouts.app')

@section('content')
    <div class="my-10">
        <h1 class="my-4 text-3xl font-bold">DATA PENILAIAN WARGA</h1>
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 rtl:space-x-reverse md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="{{ route('admin.index') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="me-0.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
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
                        <span class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2">Data Penilaian
                            Warga</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="mt-8 pb-4">
        <div class="mb-2 flex justify-between">
            <h3 class="mb-2 text-xl font-bold">Tabel Data Penilaian Warga</h3>
        </div>

        <div class="relative overflow-x-auto sm:rounded-lg">
            <div class="flex-column flex flex-wrap items-center justify-between space-y-4 pb-4 sm:flex-row sm:space-y-0">

                <a href="{{ route('admin.alternative.penilaian.create') }}"
                    class="text- mb-2 me-2 flex items-center justify-center rounded-lg bg-blue-600 px-3 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
                    <span>
                        @include('partials.icons._plus-icons', [
                            'class' => 'h-5 w-5 text-white',
                        ])
                    </span>
                    Tambah Penilaian Warga</a>
            </div>

            <table class="w-full text-left text-sm text-gray-500 rtl:text-right" id="alternativeValueTable">
                <thead class="bg-blue-50 text-center text-xs font-bold text-gray-700">
                    <tr>
                        <th scope="col" class="border px-6 py-3 align-middle" rowspan="2">
                            No
                        </th>
                        <th scope="col" class="border px-6 py-3 align-middle" rowspan="2">
                            Nama
                        </th>
                        @php
                            $filteredCriterias = $criterias->filter(
                                fn($criteria) => $criteria->alternativeValues->isNotEmpty(),
                            );
                        @endphp
                        {{-- <th scope="col" class="border px-6 py-3 uppercase" colspan="{{ $filteredCriterias->count() }}"
                            rowspan="1">
                            Kriteria
                        </th> --}}
                    </tr>
                    <tr>
                        @foreach ($filteredCriterias as $criteria)
                            <th scope="col" class="border px-6 py-3" rowspan="1">
                                {{ $criteria->nama }}
                            </th>
                        @endforeach

                        <th scope="col" class="border px-6 py-3 align-middle" rowspan="1">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($alternatives as $data)
                        <tr class="text-gray-900 odd:bg-white even:bg-blue-50 hover:bg-gray-50 even:hover:bg-blue-100">
                            <th class="px-6 py-4">
                                {{ $loop->iteration }}
                            </th>
                            <td class="border px-6 py-4">
                                {{ $data->nama }}
                            </td>
                            @foreach ($filteredCriterias as $criteria)
                                @php
                                    $alternativeValue = $data->alternativeValues->firstWhere(
                                        'criteria_id',
                                        $criteria->id,
                                    );
                                @endphp
                                <td class="border px-6 py-4">
                                    @if ($alternativeValue)
                                        @if ($alternativeValue->criteria->subCriteria->isNotEmpty())
                                            @php
                                                $subCriteriaName =
                                                    $alternativeValue->criteria->subCriteria->firstWhere(
                                                        'nilai',
                                                        $alternativeValue->nilai,
                                                    )->nama ?? 'N/A';
                                            @endphp
                                            {{ $subCriteriaName . ' (' . $alternativeValue->nilai . ')' }}
                                        @else
                                            {{ number_format($alternativeValue->nilai, 0, '.', '.') ?? 'N/A' }}
                                        @endif
                                    @else
                                        N/A
                                    @endif
                                </td>
                            @endforeach
                            <td class="border px-6 py-4">
                                <a href="{{ route('admin.alternative.penilaian.show', $data->id) }}"
                                    class="btn-primary rounded-lg px-2.5 py-1.5 text-xs">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection

@push('after-script')
    <script type="module">
        if (document.getElementById("alternativeValueTable") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#alternativeValueTable", {
                searchable: true,
                sortable: true,
                paging: true,
                perPage: 10,
                perPageSelect: [10, 15, 20, 25],

            });
        }
    </script>
@endpush
