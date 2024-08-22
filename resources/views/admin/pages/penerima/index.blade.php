@extends('admin.layouts.app')

@section('content')
    <div class="my-10">
        <h1 class="my-4 text-3xl font-bold">DATA PENERIMA</h1>
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
                        <span class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2">Data Kriteria</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="mt-8 pb-4">
        <div class="mb-2 flex justify-between">
            <h3 class="mb-2 text-xl font-bold">Tabel Data Penerima - Tahun {{ $selectedYear }}</h3>
        </div>

        <div class="relative overflow-x-auto sm:rounded-lg">
            <div class="flex-column flex flex-wrap items-center justify-between space-y-4 pb-4 sm:flex-row sm:space-y-0">

                <div class="flex w-[160px] items-center justify-center gap-4 rounded-lg bg-blue-600 py-[5px]">
                    <label for="tahun" class="block text-sm font-medium text-white">Tahun</label>
                    <form method="GET" action="{{ route('admin.penerima.index') }}">
                        <select name="tahun" id="tahun"
                            class="block rounded-lg border border-gray-300 bg-white p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            onchange="this.form.submit()">
                            @foreach ($criteriaSelected as $pilihan)
                                <option value="{{ $pilihan->nama }}"
                                    {{ $pilihan->nama == $selectedYear ? 'selected' : '' }}>
                                    {{ $pilihan->nama }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>

                {{-- <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div
                        class="rtl:inset-r-0 pointer-events-none absolute inset-y-0 left-0 flex items-center ps-3 rtl:right-0">
                        <svg class="h-5 w-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="table-search"
                        class="block w-80 rounded-lg border border-gray-300 bg-white p-2 ps-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Search for items">
                </div> --}}

                <div class="flex justify-between gap-3">
                    <a href="{{ route('admin.penerima.report') }}"
                        class="hover:text-primary-700 flex flex-shrink-0 items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                        <svg class="h-6 w-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2 2 2 0 0 0 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h1.376A2.626 2.626 0 0 0 15 15.375v-1.75A2.626 2.626 0 0 0 12.375 11H11Zm1 5v-3h.375a.626.626 0 0 1 .625.626v1.748a.625.625 0 0 1-.626.626H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z"
                                clip-rule="evenodd" />
                        </svg>
                        Export PDF
                    </a>

                    <a href="{{ route('admin.penerima.exportExcel') }}"
                        class="hover:text-primary-700 flex flex-shrink-0 items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24"
                            viewBox="0 0 30 30">
                            <path
                                d="M 15 3 A 2 2 0 0 0 14.599609 3.0429688 L 14.597656 3.0410156 L 4.6289062 5.0351562 L 4.6269531 5.0371094 A 2 2 0 0 0 3 7 L 3 23 A 2 2 0 0 0 4.6289062 24.964844 L 14.597656 26.958984 A 2 2 0 0 0 15 27 A 2 2 0 0 0 17 25 L 17 5 A 2 2 0 0 0 15 3 z M 19 5 L 19 8 L 21 8 L 21 10 L 19 10 L 19 12 L 21 12 L 21 14 L 19 14 L 19 16 L 21 16 L 21 18 L 19 18 L 19 20 L 21 20 L 21 22 L 19 22 L 19 25 L 25 25 C 26.105 25 27 24.105 27 23 L 27 7 C 27 5.895 26.105 5 25 5 L 19 5 z M 23 8 L 24 8 C 24.552 8 25 8.448 25 9 C 25 9.552 24.552 10 24 10 L 23 10 L 23 8 z M 6.1855469 10 L 8.5878906 10 L 9.8320312 12.990234 C 9.9330313 13.234234 10.013797 13.516891 10.091797 13.837891 L 10.125 13.837891 C 10.17 13.644891 10.258531 13.351797 10.394531 12.966797 L 11.785156 10 L 13.972656 10 L 11.359375 14.955078 L 14.050781 19.998047 L 11.716797 19.998047 L 10.212891 16.740234 C 10.155891 16.625234 10.089203 16.393266 10.033203 16.072266 L 10.011719 16.072266 C 9.9777187 16.226266 9.9105937 16.458578 9.8085938 16.767578 L 8.2949219 20 L 5.9492188 20 L 8.7324219 14.994141 L 6.1855469 10 z M 23 12 L 24 12 C 24.552 12 25 12.448 25 13 C 25 13.552 24.552 14 24 14 L 23 14 L 23 12 z M 23 16 L 24 16 C 24.552 16 25 16.448 25 17 C 25 17.552 24.552 18 24 18 L 23 18 L 23 16 z M 23 20 L 24 20 C 24.552 20 25 20.448 25 21 C 25 21.552 24.552 22 24 22 L 23 22 L 23 20 z">
                            </path>
                        </svg>
                        Export Excel
                    </a>
                </div>
            </div>

            <a href="{{ route('admin.penerima.calon') }}"
                class="mb-8 inline-block rounded-lg bg-blue-600 px-3 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
                Lihat Data Calon Penerima {{ $selectedYear }}
            </a>

            @if ($paginatedResults->isNotEmpty())
                <table class="w-full text-left text-sm text-gray-500 rtl:text-right">
                    <thead class="bg-blue-50 text-center text-xs font-bold uppercase text-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            @foreach ($paginatedResults->first()->alternative->alternativeValues as $value)
                                <th scope="col" class="px-6 py-3">
                                    {{ $value->criteria->nama }}
                                </th>
                            @endforeach
                            <th scope="col" class="px-6 py-3">
                                Skor
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($paginatedResults as $data)
                            <tr class="text-gray-900 odd:bg-white even:bg-blue-50 hover:bg-gray-50 even:hover:bg-blue-100">
                                <th class="px-6 py-4">
                                    {{ ($paginatedResults->currentPage() - 1) * $paginatedResults->perPage() + $loop->iteration }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $data->alternative->nama }}
                                </td>
                                @foreach ($data->alternative->alternativeValues as $value)
                                    @if ($value->criteria->subCriteria->isNotEmpty())
                                        @foreach ($value->criteria->subCriteria as $subCriteria)
                                            @if ($value->nilai === $subCriteria->nilai)
                                                <td class="px-6 py-4">{{ $subCriteria->nama }}</td>
                                            @endif
                                        @endforeach
                                    @else
                                        @php
                                            // Tentukan apakah kriteria ini adalah 'Jumlah Tanggungan' atau 'Usia'
                                            $isDecimalColumn = in_array($value->criteria->nama, [
                                                'Jumlah Anggota Keluarga',
                                                'Usia',
                                            ]);
                                        @endphp

                                        <td class="px-6 py-4">
                                            @if ($isDecimalColumn)
                                                {{ number_format($value->nilai, 0, '.', ',') }}
                                            @else
                                                {{ $value->nilai }}
                                            @endif
                                        </td>
                                    @endif
                                @endforeach
                                <td class="px-6 py-4">
                                    {{ $data->skor_total }}
                                </td>
                                <td class="px-6 py-4">
                                    <button data-modal-target="aksi-modal-{{ $loop->iteration }}"
                                        data-modal-toggle="aksi-modal-{{ $loop->iteration }}"
                                        class="btn-warning rounded-lg px-2.5 py-1.5 text-xs" type="button">
                                        Aksi
                                    </button>
                                </td>
                            </tr>

                            @component('admin.layouts.modal_aksi', [
                                'chooseName' => $data->alternative->nama,
                                'loopId' => $loop->iteration,
                                'chooseId' => $data->id,
                                'is_verified' => $data->is_verified,
                                'is_verified_desc' => $data->is_verified_desc,
                                'routeName' => 'admin.penerima.verifikasi',
                            ])
                            @endcomponent
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>
        {{-- PAGINATION --}}
        <div>
            {{ $paginatedResults->links('vendor.pagination.tailwind') }}
        </div>
    </div>
@endsection

@push('after-script')
@endpush
