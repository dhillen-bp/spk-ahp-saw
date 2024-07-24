@extends('admin.layouts.app')
@section('content')
    <div class="my-10">
        <h1 class="my-4 text-3xl font-bold">EDIT PENGADUAN</h1>
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
                        <a href="{{ route('admin.data_pengaduan.index') }}"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white md:ms-2">Data
                            Pengaduan</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2">Edit
                            Pengaduan</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="grid grid-cols-1 space-y-5 md:grid-cols-5 md:space-x-10 md:space-y-0">

        <form method="POST" action="{{ route('admin.data_pengaduan.update', $report->id) }}"
            class="mx-auto w-full rounded-lg bg-blue-50 p-4 md:col-span-3">
            @csrf
            @method('PATCH')
            <div class="mb-5">
                <label for="judul"
                    class="{{ $errors->has('judul') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Judul Aduan </label>
                <input type="text" id="judul" name="judul"
                    class="{{ $errors->has('judul') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                    value="{{ old('judul') ?? $report->judul }}" />
                @error('judul')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="pengirim"
                    class="{{ $errors->has('pengirim') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Username </label>
                <input type="text" id="pengirim" name="pengirim"
                    class="{{ $errors->has('pengirim') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                    value="{{ old('pengirim') ?? $report->pengirim }}" />
                @error('pengirim')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="status"
                    class="{{ $errors->has('status') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Status</label>
                <select id="status" name="status"
                    class="{{ $errors->has('status') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm">
                    <option selected disabled>-Pilih Status-</option>
                    <option value="menunggu"
                        {{ old('status') == 'menunggu' ? 'selected' : ($report->status == 'menunggu' ? 'selected' : '') }}>
                        Menunggu</option>
                    <option value="diproses"
                        {{ old('status') == 'diproses' ? 'selected' : ($report->status == 'diproses' ? 'selected' : '') }}>
                        Diproses
                    </option>
                    <option value="selesai"
                        {{ old('status') == 'selesai' ? 'selected' : ($report->status == 'selesai' ? 'selected' : '') }}>
                        Selesai
                    </option>
                </select>
                @error('role')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="deskripsi"
                    class="{{ $errors->has('deskripsi') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Deskripsi Pengguna</label>
                <textarea id="deskripsi" rows="4" name="deskripsi"
                    class="{{ $errors->has('deskripsi') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm">{{ old('deskripsi') ?? $report->deskripsi }}</textarea>
                @error('deskripsi')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto">Simpan</button>
        </form>

        <div class="col-span-2 rounded-lg bg-blue-50 p-4">
            <h3 class="text-center text-lg font-bold">Keterangan Atribut</h3>
            <table class="my-4 w-full border-2 border-gray-900 text-left rtl:text-right">
                <thead>
                    <tr>
                        <th class="w-1/2 border-2 border-gray-900 text-center">Benefit</th>
                        <th class="w-1/2 border-2 border-gray-900 text-center">Cost</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <tr>
                        <td class="border-2 border-gray-900">Atribut benefit adalah kriteria yang diinginkan untuk
                            dimaksimalkan.</td>
                        <td class="border-2 border-gray-900">Atribut cost adalah kriteria yang diinginkan untuk
                            diminimalkan.</td>
                    </tr>
                    <tr>
                        <td class="border-2 border-gray-900">Semakin tinggi nilai kriteria ini, semakin baik atau
                            menguntungkan suatu alternatif.</td>
                        <td class="border-2 border-gray-900">Semakin rendah nilai kriteria ini, semakin baik atau
                            menguntungkan suatu alternatif.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
