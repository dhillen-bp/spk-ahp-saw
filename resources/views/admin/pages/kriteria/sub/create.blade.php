@extends('admin.layouts.app')
@section('content')
    <div class="my-10">
        <h1 class="my-4 text-3xl font-bold">TAMBAH SUBKRITERIA</h1>
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
                        <a href="{{ route('admin.kriteria.index') }}"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white md:ms-2">Data
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
                        <a href="{{ route('admin.kriteria.show', $criteria_id) }}"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white md:ms-2">Detail
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
                        <span class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2">Tambah
                            SubKriteria</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="grid grid-cols-1 space-y-5 md:grid-cols-5 md:space-x-10 md:space-y-0">
        <form method="POST" action="{{ route('admin.kriteria.sub.store') }}"
            class="mx-auto w-full rounded-lg bg-blue-50 p-4 md:col-span-3">
            @csrf
            <input type="hidden" name="criteria_id" value="{{ $criteria_id }}">
            <div class="mb-5">
                <label for="nama"
                    class="{{ $errors->has('nama') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Nama SubKriteria</label>
                <input type="text" id="nama" name="nama"
                    class="{{ $errors->has('nama') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                    value="{{ old('nama') }}" />
                @error('nama')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="nilai"
                    class="{{ $errors->has('nilai') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Nilai SubKriteria</label>
                <input type="number" id="nilai" name="nilai" step="0.001"
                    class="{{ $errors->has('nilai') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                    value="{{ old('nilai') }}" />
                @error('nilai')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto">Simpan</button>
        </form>

        <div class="col-span-2 rounded-lg bg-blue-50 p-4">
            <h3 class="mb-3 text-center text-lg font-bold">Keterangan Kriteria </h3>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">

                        <tbody>
                            <tr
                                class="border-b odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800">
                                <th scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    ID
                                </th>
                                <td class="px-6 py-4">
                                    {{ $criteria->id }}
                                </td>
                            </tr>
                            <tr
                                class="border-b odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800">
                                <th scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    Nama
                                </th>
                                <td class="px-6 py-4">
                                    {{ $criteria->nama }}
                                </td>
                            </tr>
                            <tr
                                class="border-b odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800">
                                <th scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    Atribut
                                </th>
                                <td class="px-6 py-4">
                                    {{ $criteria->atribut }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>



            </div>

            <div class="mb-5 mt-5 block">
                <p class="mb-3 text-center font-bold">Keterangan Pengisian Form SubKriteria</p>
                <div class="space-y-3">
                    <p><span class="font-semibold">Nama SubKriteria</span>: Isikan dengan nama atau nilai dari kriteria,
                        misal
                        jika kriteria
                        pekerjaan maka nama subkriteria nya 'Tidak Bekerja', 'Pekerjaan Tidak Tetap', 'Pekerjaan Tetap' </p>
                    <p><span class="font-semibold">Nilai SubKriteria</span>: Untuk nilainya bisa diisikan angka,
                        menyesuaikan
                        atribut/jenis kriteria. Jika benefit maka mana subkriteria yang menjadi prioritas akan bernilai
                        paling tinggi. Dan jika cost maka nama subkriteria yang menjadi priorirtas akan bernilai paling
                        rendah. </p>
                    <img src="{{ asset('images/keterangan/contoh_nilai_subkriteria.png') }}"
                        alt="Contoh Nilai Subkriteria">
                </div>
            </div>
        </div>
    </div>
@endsection
