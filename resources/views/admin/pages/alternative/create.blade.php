@extends('admin.layouts.app')
@section('content')
    <div class="my-10">
        <h1 class="my-4 text-3xl font-bold">TAMBAH WARGA</h1>
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
                        <a href="{{ route('admin.alternative.index') }}"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white md:ms-2">Data
                            Warga</a>
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
                            Warga</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="grid grid-cols-1 space-y-5 md:grid-cols-5 md:space-x-10 md:space-y-0">

        <form method="POST" action="{{ route('admin.alternative.store') }}"
            class="mx-auto w-full rounded-lg bg-blue-50 p-4 md:col-span-3">
            @csrf
            <div class="mb-5">
                <label for="nik"
                    class="{{ $errors->has('nik') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    NIK</label>
                <input type="number" id="nik" name="nik" required
                    class="{{ $errors->has('nik') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                    value="{{ old('nik') }}" />
                @error('nik')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="no_kk"
                    class="{{ $errors->has('no_kk') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    No KK</label>
                <input type="number" id="no_kk" name="no_kk" required
                    class="{{ $errors->has('no_kk') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                    value="{{ old('no_kk') }}" />
                @error('no_kk')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="nama"
                    class="{{ $errors->has('nama') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Nama Warga</label>
                <input type="text" id="nama" name="nama" required
                    class="{{ $errors->has('nama') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                    value="{{ old('nama') }}" />
                @error('nama')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="alamat"
                    class="{{ $errors->has('alamat') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Alamat</label>
                <input type="text" id="alamat" name="alamat" required
                    class="{{ $errors->has('alamat') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                    value="{{ old('alamat') }}" />
                @error('alamat')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="jenis_kelamin"
                    class="{{ $errors->has('jenis_kelamin') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin"
                    class="{{ $errors->has('jenis_kelamin') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm">
                    <option selected disabled>-Pilih Jenis Kelamin-</option>
                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto">Simpan</button>
        </form>

        <div class="col-span-2 rounded-lg bg-blue-50 p-4">
            <h3 class="text-center text-lg font-bold">Keterangan</h3>
            <p class="mt-2">
                <strong>NIK:</strong> Nomor Induk Kependudukan warga. Pastikan terdiri dari 16 digit.<br>
                <strong>No KK:</strong> Nomor Kartu Keluarga warga. Pastikan terdiri dari 16 digit.<br>
                <strong>Nama:</strong> Nama lengkap warga sesuai KTP.<br>
                <strong>Alamat:</strong> Alamat tempat tinggal warga. (misal: KARANGWUNI RT 001 RW 002)<br>
                <strong>Jenis Kelamin:</strong> Laki-Laki (L) atau Perempuan (P).
            </p>
        </div>

    </div>
@endsection
