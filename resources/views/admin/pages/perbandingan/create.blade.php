@extends('admin.layouts.app')
@section('content')
    <div class="my-10">
        <h1 class="my-4 text-3xl font-bold">TAMBAH PILIHAN TAHUN & KRITERIA</h1>
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
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white md:ms-2">Daftar
                            Tahun &
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
                        <span class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2">Tambah Pilihan
                            Tahun &
                            Kriteria</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="grid grid-cols-1 space-y-5 md:grid-cols-5 md:space-x-10 md:space-y-0">

        <form method="POST" action="{{ route('admin.perbandingan.store') }}"
            class="mx-auto w-full rounded-lg bg-blue-50 p-4 md:col-span-3">
            @csrf
            <div class="mb-5">
                <label for="nama"
                    class="{{ $errors->has('nama') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Nama Tahun</label>
                <input type="text" id="nama" name="nama"
                    class="{{ $errors->has('nama') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                    value="{{ old('nama') }}" />
                @error('nama')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="jumlah_penerima"
                    class="{{ $errors->has('jumlah_penerima') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Jumlah Penerima</label>
                <input type="number" id="jumlah_penerima" name="jumlah_penerima"
                    class="{{ $errors->has('jumlah_penerima') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                    value="{{ old('jumlah_penerima') }}" />
                @error('jumlah_penerima')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="keterangan"
                    class="{{ $errors->has('keterangan') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Keterangan</label>
                <textarea id="keterangan" rows="4" name="keterangan"
                    class="{{ $errors->has('keterangan') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="criteria"
                    class="{{ $errors->has('criteria') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Kriteria yang Dipilih</label>
                @error('criteria')
                    <p class="ml-2 mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
                <ul class="w-full rounded-lg border border-gray-200 bg-white text-sm font-medium text-gray-900">
                    @foreach ($kriteria as $data)
                        <li class="w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="{{ $data->id }}" type="checkbox" value="{{ $data->id }}"
                                    name="criteria[]"
                                    class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-700">
                                <label for="{{ $data->id }}"
                                    class="ms-2 flex w-full justify-between py-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    <span>{{ $data->nama }}</span>
                                    <span class="{{ $data->atribut == 'benefit' ? 'badge-benefit' : 'badge-cost' }}">
                                        {{ ucfirst($data->atribut) }}</span>
                                </label>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <button type="submit"
                class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto">Simpan</button>
        </form>

        <div class="col-span-2 rounded-lg bg-blue-50 p-4">
            <h3 class="text-center text-lg font-bold">Keterangan Inputan</h3>
            <table class="my-4 w-full border-2 border-gray-900 text-left rtl:text-right">
                <thead>
                    <tr>
                        <th class="w-1/2 border-2 border-gray-900 text-center">Nama</th>
                        <th class="w-1/2 border-2 border-gray-900 text-center">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <tr>
                        <td class="border-2 border-gray-900">Untuk "Nama" isikan tahun, misal "2024", "2023", "2022", dst.
                        </td>
                        <td class="border-2 border-gray-900">Untuk "Keterangan" isikan dari keterangan tahunnya, misal
                            "Kriteria Penentuan BLT Dana Desa 2024"</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
