@extends('admin.layouts.app')
@section('content')
    <div class="my-10">
        <h1 class="my-4 text-3xl font-bold">TAMBAH ADMIN</h1>
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
                        <a href="{{ route('admin.data_admin.index') }}"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white md:ms-2">Data
                            Admin</a>
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
                            Admin</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="grid grid-cols-1 space-y-5 md:grid-cols-5 md:space-x-10 md:space-y-0">

        <form method="POST" action="{{ route('admin.data_admin.store') }}"
            class="mx-auto w-full rounded-lg bg-blue-50 p-4 md:col-span-3">
            @csrf
            <div class="mb-5">
                <label for="nama"
                    class="{{ $errors->has('nama') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Nama </label>
                <input type="text" id="nama" name="nama"
                    class="{{ $errors->has('nama') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                    value="{{ old('nama') }}" />
                @error('nama')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="username"
                    class="{{ $errors->has('username') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Username </label>
                <input type="text" id="username" name="username"
                    class="{{ $errors->has('username') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                    value="{{ old('username') }}" />
                @error('username')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="role"
                    class="{{ $errors->has('role') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Role</label>
                <select id="role" name="role"
                    class="{{ $errors->has('role') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm">
                    <option selected disabled>-Pilih Role-</option>
                    <option value="pemerintah_desa" {{ old('role') == 'pemerintah_desa' ? 'selected' : '' }}>Pemerintah
                        Desa
                    </option>
                    <option value="rt_rw" {{ old('role') == 'rt_rw' ? 'selected' : '' }}>RT/RW</option>
                </select>
                @error('role')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password"
                    class="{{ $errors->has('password') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Password </label>
                <input type="password" id="password" name="password"
                    class="{{ $errors->has('password') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                    value="{{ old('password') }}" />
                @error('password')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="desc"
                    class="{{ $errors->has('desc') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Keterangan</label>
                <textarea id="desc" rows="4" name="desc"
                    class="{{ $errors->has('desc') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm">{{ old('desc') }}</textarea>
                @error('desc')
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
