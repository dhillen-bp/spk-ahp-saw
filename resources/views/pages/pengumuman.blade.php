@extends('layouts.app')

@section('content')
    <section class="bg-slate-100">
        <div class="relative h-96 w-full bg-cover bg-center py-32"
            style="background-image: url('{{ asset('images/background/karangwuni-bg.jpg') }}');">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-blue-900 opacity-75"></div>
            <h1 class="relative text-center text-3xl font-bold text-white">Pengumuman</h1>
        </div>

        <div class="-mb-16 p-4 md:px-6">
            <div class="relative -top-24 mx-2 rounded-lg bg-blue-100 p-8 sm:mx-4 md:mx-8">
                <div class="rounded-lg bg-blue-700 p-4 text-white">
                    <h3 class="text-center text-xl font-bold">Pengumuman Terkait Pengambilan BLT Dana Desa 2024</h3>
                    <div class="my-4">
                        <ol class="list-inside list-decimal space-y-2">
                            <li>BLT Dana Desa dapat diambil ke balai desa pada hari Senin, 10 Juni 2024 mulai pukul 09.00.
                            </li>
                            <li>Jika tidak bisa datang, bisa diwakilkan dengan membawa fotokopi KK/KTP penerima.</li>
                            <li>Jika ada yang ingin ditanyakan lebih lanjut, hubungi ...</li>
                        </ol>
                    </div>
                </div>

                <div class="mt-8 pb-4">
                    <h3 class="mb-2 text-center text-xl font-bold">Daftar Penerima BLT Dana Desa Tahun {{ $selectedYear }}
                    </h3>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div
                            class="flex-column flex flex-wrap items-center justify-between space-y-4 pb-4 sm:flex-row sm:space-y-0">
                            <div>
                                <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio"
                                    class="inline-flex items-center rounded-lg border border-gray-300 bg-white px-3 py-1.5 text-sm font-medium text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:hover:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                                    type="button">
                                    <svg class="me-3 h-3 w-3 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                    </svg>Tahun
                                    {{ $selectedYear }}
                                    <svg class="ms-2.5 h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdownRadio"
                                    class="z-10 hidden w-48 divide-y divide-gray-100 rounded-lg bg-white shadow dark:divide-gray-600 dark:bg-gray-700"
                                    data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top"
                                    style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                                    <ul class="space-y-1 p-3 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownRadioButton">
                                        <form method="GET" action="{{ route('pengumuman.penerima') }}"
                                            id="yearFilterForm">
                                            @foreach ($criteriaSelected as $pilihan)
                                                <li>
                                                    <div
                                                        class="flex items-center rounded p-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                        <input id="filter-radio-{{ $pilihan->nama }}" type="radio"
                                                            value="{{ $pilihan->nama }}" name="tahun"
                                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800"
                                                            {{ $pilihan->nama == $selectedYear ? 'checked' : '' }}
                                                            onchange="document.getElementById('yearFilterForm').submit();">
                                                        <label for="filter-radio-{{ $pilihan->nama }}"
                                                            class="ms-2 w-full rounded text-sm font-medium text-gray-900 dark:text-gray-300">
                                                            {{ $pilihan->nama }}
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </form>
                                    </ul>
                                </div>
                            </div>
                            <label for="table-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div
                                    class="rtl:inset-r-0 pointer-events-none absolute inset-y-0 left-0 flex items-center ps-3 rtl:right-0">
                                    <svg class="h-5 w-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input type="text" id="table-search"
                                    class="block w-80 rounded-lg border border-gray-300 bg-gray-50 p-2 ps-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    placeholder="Search for items">
                            </div>
                        </div>
                        <a href="{{ route('pengumuman.calon_penerima') }}"
                            class="mb-8 inline-block rounded-lg bg-blue-600 px-3 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
                            Lihat Data Calon Penerima {{ $selectedYear }}
                        </a>

                        <table class="w-full text-left text-sm text-gray-500 rtl:text-right">
                            <thead class="bg-blue-50 text-center text-xs font-bold uppercase text-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama
                                    </th>
                                    @foreach ($rankingResults->first()->alternative->alternativeValues as $value)
                                        <th scope="col" class="px-6 py-3">
                                            {{ $value->criteria->nama }}
                                        </th>
                                    @endforeach
                                    <th scope="col" class="px-6 py-3">
                                        Skor
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($rankingResults as $data)
                                    <tr
                                        class="text-gray-900 odd:bg-white even:bg-blue-50 hover:bg-gray-50 even:hover:bg-blue-100">
                                        <th class="px-6 py-4">
                                            {{ $loop->iteration }}
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
                                                <td class="px-6 py-4">{{ $value->nilai }}</td>
                                            @endif
                                        @endforeach
                                        <td class="px-6 py-4">
                                            {{ $data->skor_total }}
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
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
