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

        @php
            $routeName = request()->route()->getName();
            $actionRoute =
                $routeName == 'admin.data_pengaduan.editAsDisAgree'
                    ? route('admin.data_pengaduan.updateAsDisAgree', $report->id)
                    : route('admin.data_pengaduan.updateAsAgree', $report->id);
        @endphp


        {{-- <form method="POST" action="{{ $actionRoute }}" class="mx-auto w-full rounded-lg bg-blue-50 p-4 md:col-span-3"> --}}
        <form method="POST" action="{{ route('admin.data_pengaduan.update', $report->id) }}"
            class="mx-auto w-full rounded-lg bg-blue-50 p-4 md:col-span-3">
            @csrf
            @method('PATCH')
            <div class="mb-5">
                <label for="nik"
                    class="{{ $errors->has('nik') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    NIK </label>
                <input type="text" id="nik" name="nik" readonly
                    class="{{ $errors->has('nik') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                    value="{{ old('nik') ?? $report->alternative->nik }}" />
            </div>
            <div class="mb-5">
                <label for="alternative"
                    class="{{ $errors->has('alternative') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Data warga yang diminta untuk diperbaiki </label>
                <input type="text" id="alternative" name="alternative" readonly
                    class="{{ $errors->has('alternative') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                    value="{{ old('alternative') ?? $report->alternative->nama }}" />
            </div>
            <div class="mb-5">
                <label for="criteria_id"
                    class="{{ $errors->has('criteria_id') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Data Kriteria yang Salah</label>
                <input type="text" id="criteria_id" name="criteria_id" readonly
                    class="{{ $errors->has('criteria_id') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                    value="{{ old('criteria_id') ?? $report->criteria->nama }}" />
                @error('criteria_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="old_value"
                    class="{{ $errors->has('old_value') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Nilai yang Salah</label>
                @if ($report->criteria->subCriteria->isNotEmpty())
                    {{-- {{ dd($report->criteria->subcriteria) }} --}}
                    <select id="old_value" name="old_value" class="mt-2 block w-full rounded-lg border p-2.5 text-sm"
                        disabled>
                        @foreach ($report->criteria->subCriteria as $subCriteria)
                            @if ($subCriteria->nilai == $report->old_value)
                                <option value="{{ $subCriteria->nilai }}" selected disabled>{{ $subCriteria->nama }} -
                                    {{ $subCriteria->nilai }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                @else
                    <input type="text" id="old_value" name="old_value" readonly
                        class="{{ $errors->has('old_value') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                        value="{{ $report->criteria->nama == 'Jumlah Anggota Keluarga' || $report->criteria->nama == 'Usia' ? number_format($report->old_value, 0, '.', ',') : $report->old_value }}" />
                @endif
                @error('old_value')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="new_value"
                    class="{{ $errors->has('new_value') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Nilai yang Dibenarkan Warga</label>
                @if ($report->criteria->subCriteria->isNotEmpty())
                    {{-- {{ dd($report->criteria->subcriteria) }} --}}
                    <select id="new_value" name="new_value" class="mt-2 block w-full rounded-lg border p-2.5 text-sm"
                        disabled>
                        @foreach ($report->criteria->subCriteria as $subCriteria)
                            @if ($subCriteria->nilai == $report->new_value)
                                <option value="{{ $subCriteria->nilai }}" selected disabled>{{ $subCriteria->nama }} -
                                    {{ $subCriteria->nilai }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                @else
                    <input type="text" id="new_value" name="new_value" readonly
                        class="{{ $errors->has('new_value') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                        value="{{ $report->criteria->nama == 'Jumlah Anggota Keluarga' || $report->criteria->nama == 'Usia' ? number_format($report->new_value, 0, '.', ',') : $report->new_value }}" />
                @endif
                @error('new_value')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="deskripsi_aduan"
                    class="{{ $errors->has('deskripsi_aduan') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Deskripsi aduan</label>
                <textarea id="deskripsi_aduan" rows="4" name="deskripsi_aduan" readonly
                    class="{{ $errors->has('deskripsi_aduan') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm">{{ old('deskripsi_aduan') ?? $report->deskripsi_aduan }}</textarea>
                @error('deskripsi_aduan')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <hr class="my-5">
            <div class="mb-5">
                <label for="fix_value"
                    class="{{ $errors->has('fix_value') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Masukkan Data yang Benar/Sesuai</label>
                @if ($report->criteria->subCriteria->isNotEmpty())
                    {{-- {{ dd($report->criteria->subcriteria) }} --}}
                    <select id="fix_value" name="fix_value" class="mt-2 block w-full rounded-lg border p-2.5 text-sm">
                        <option disabled selected>-Pilih-</option>
                        @foreach ($report->criteria->subCriteria as $subCriteria)
                            <option value="{{ $subCriteria->nilai }}">{{ $subCriteria->nama }} -
                                {{ $subCriteria->nilai }}
                            </option>
                        @endforeach
                    </select>
                @else
                    <input type="text" id="fix_value" name="fix_value"
                        class="{{ $errors->has('fix_value') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                        value="{{ old('fix_value') }}" />
                @endif

                @error('fix_value')
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
                        Menunggu
                    </option>
                    <option value="disetujui"
                        {{ old('status') == 'disetujui' ? 'selected' : ($report->status == 'disetujui' ? 'selected' : '') }}>
                        Disetujui
                    </option>
                    <option value="ditolak"
                        {{ old('status') == 'ditolak' ? 'selected' : ($report->status == 'ditolak' ? 'selected' : '') }}>
                        Ditolak
                    </option>
                </select>
                @error('status')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="keterangan_balasan"
                    class="{{ $errors->has('keterangan_balasan') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Keterangan Balasann</label>
                <textarea id="keterangan_balasan" rows="4" name="keterangan_balasan"
                    class="{{ $errors->has('keterangan_balasan') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm">{{ old('keterangan_balasan') ?? $report->keterangan_balasan }}</textarea>
                @error('keterangan_balasan')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto">Simpan</button>
            {{-- @if ($routeName == 'admin.data_pengaduan.editAsAgree')
                <button type="submit"
                    class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto">Setujui</button>
            @else
                <button type="submit"
                    class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto">Tolak</button>
            @endif --}}

        </form>

        <div class="col-span-2 rounded-lg bg-blue-50 p-4">
            <h3 class="text-center text-lg font-bold">Keterangan Pemeriksaan Aduan</h3>
            <ul>
                <ol>1. Periksa Data Warga yang di adukan</ol>
                <ol>2. Masukkan nilai yang benar jika ternyata ada kesalahn data</ol>
                <ol>3. Ubah status aduan (menyesuaikan pemeriksaan)</ol>
            </ul>
        </div>
    </div>
@endsection
