@extends('layouts.app')

@section('content')
    <div class="relative h-96 w-full bg-cover bg-center py-32"
        style="background-image: url('{{ asset('images/background/karangwuni-bg.jpg') }}');">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-blue-900 opacity-75"></div>
        <h1 class="relative text-center text-3xl font-bold text-white">Form Pengaduan</h1>
    </div>


    <div class="-mb-16 p-4 md:px-6">
        <div class="relative -top-24 mx-2 rounded-lg bg-blue-100 p-8 sm:mx-4 md:mx-8">
            <div class="grid grid-cols-1 space-y-5 md:grid-cols-5 md:space-x-10 md:space-y-0">

                <form method="POST" action="{{ route('pengaduan.store') }}"
                    class="mx-auto w-full rounded-lg p-4 md:col-span-3">
                    @csrf
                    <div class="mb-5">
                        <label for="judul"
                            class="{{ $errors->has('judul') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                            Judul Aduan </label>
                        <input type="text" id="judul" name="judul"
                            class="{{ $errors->has('judul') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                            value="{{ old('judul') }}" />
                        @error('judul')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="pengirim"
                            class="{{ $errors->has('pengirim') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                            Pengirim </label>
                        <input type="text" id="pengirim" name="pengirim"
                            class="{{ $errors->has('pengirim') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                            value="{{ old('pengirim') }}" />
                        @error('pengirim')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="deskripsi"
                            class="{{ $errors->has('deskripsi') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                            Deskripsi Aduan</label>
                        <textarea id="deskripsi" rows="4" name="deskripsi"
                            class="{{ $errors->has('deskripsi') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto">Simpan</button>
                </form>

                <div class="col-span-2 rounded-lg bg-blue-50 p-4">
                    <h3 class="text-center text-lg font-bold">Keterangan Form Pengaduan</h3>
                    <table class="my-4 w-full border-2 border-gray-900 text-left rtl:text-right">
                        <thead>
                            <tr>
                                <th class="w-1/2 border-2 border-gray-900 text-center">Kolom</th>
                                <th class="w-1/2 border-2 border-gray-900 text-center">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr>
                                <td class="border-2 border-gray-900">Judul</td>
                                <td class="border-2 border-gray-900">Isikan judul dari aduan</td>
                            </tr>
                            <tr>
                                <td class="border-2 border-gray-900">Pengirim</td>
                                <td class="border-2 border-gray-900">Isikan nama anda atau kosongi agar anonim</td>
                            </tr>
                            <tr>
                                <td class="border-2 border-gray-900">Deskripsi</td>
                                <td class="border-2 border-gray-900">Isikan deskripsi dari aduan</td>
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
@endsection
