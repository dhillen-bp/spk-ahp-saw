@extends('admin.layouts.app')
@section('content')
    <div class="my-10">
        <h1 class="my-4 text-3xl font-bold">EDIT PENILAIAN ALTERNATIVE</h1>
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
                        <a href="{{ route('admin.alternative.penilaian.index') }}"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white md:ms-2">Data
                            Penilaian
                            Alternative</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2">Edit Penilaian
                            Alternative</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="grid grid-cols-1 space-y-5 md:grid-cols-5 md:space-x-10 md:space-y-0">
        <form method="POST" action="{{ route('admin.alternative.penilaian.update', $alternative->id) }}"
            class="mx-auto w-full rounded-lg bg-blue-50 p-4 md:col-span-3">
            @csrf
            @method('PATCH')
            <div class="mb-5">
                <label for="alternative_id"
                    class="{{ $errors->has('alternative_id') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Nama Warga:</label>
                <input type="hidden" id="alternative_id" name="alternative_id" value="{{ $alternative->id }}">
                <p class="block w-full rounded-lg border bg-gray-100 p-2.5 text-sm">{{ $alternative->nama }}</p>
            </div>
            <div class="mb-5">
                <label for="nik" class="mb-2 block text-sm font-medium text-gray-900">
                    NIK:</label>
                <input type="text" id="nik" name="nik" disabled value="{{ $alternative->nik }}"
                    class="block w-full cursor-not-allowed rounded-lg border border-gray-300 bg-gray-100 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
            </div>
            <div class="mb-5">
                <label for="alamat" class="mb-2 block text-sm font-medium text-gray-900">
                    Alamat:</label>
                <input type="text" id="alamat" name="alamat" disabled value="{{ $alternative->alamat }}"
                    class="block w-full cursor-not-allowed rounded-lg border border-gray-300 bg-gray-100 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
            </div>
            <div class="mb-5">
                <label for="criteria_values"
                    class="{{ $errors->has('criteria_values') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Nilai Kriteria:</label>
                @foreach ($criterias as $criteria)
                    <div class="my-4 rounded-lg border border-blue-500 px-2 py-3 shadow-sm">
                        <label for="nilai_{{ $criteria->id }}" class="text-sm">{{ $criteria->nama }}</label>
                        @php
                            $nilai =
                                $alternative->alternativeValues->firstWhere('criteria_id', $criteria->id)->nilai ?? '';
                        @endphp
                        @if ($criteria->subcriteria->isNotEmpty())
                            <select id="nilai_{{ $criteria->id }}" name="criteria_values[{{ $criteria->id }}]"
                                class="mt-2 block w-full rounded-lg border p-2.5 text-sm">
                                <option class="text-gray-200" value="" disabled selected>-Pilih-</option>
                                @foreach ($criteria->subcriteria as $sub)
                                    <option value="{{ $sub->nilai }}" {{ $sub->nilai == $nilai ? 'selected' : '' }}>
                                        {{ $sub->nama }} - {{ $sub->nilai }}</option>
                                @endforeach
                            </select>
                        @else
                            <input type="number" id="nilai_{{ $criteria->id }}"
                                name="criteria_values[{{ $criteria->id }}]" min="0" value="{{ $nilai }}"
                                class="mt-2 block w-full rounded-lg border p-2.5 text-sm">
                        @endif
                    </div>
                @endforeach
                @error('criteria_values')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto">Simpan</button>
        </form>

        <div class="col-span-2 rounded-lg bg-blue-50 p-4">
            <h3 class="text-center text-lg font-bold">Keterangan</h3>
            <p></p>
        </div>
    </div>
@endsection
