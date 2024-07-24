@extends('admin.layouts.app')

@section('content')
    <div class="grid gap-4 md:grid-cols-3">
        <div class="rounded bg-white p-4 shadow md:col-span-1">
            <!-- Content for the first card -->
            <h2 class="text-xl font-bold">Profil Pengguna</h2>

            <form class="py-6" action="{{ route('admin.profil.update') }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <label for="nama" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ $admin->nama }}"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        required />
                </div>
                <div class="mb-4">
                    <label for="username"
                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Username</label>
                    <input type="text" id="username" name="username" value="{{ $admin->username }}"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        required />
                </div>
                <div class="mb-4">
                    <label for="countries" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Role</label>
                    <select id="countries" name="role"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        <option {{ $admin->role == null ? 'selected' : '' }} disabled />-</option>
                        <option value="pemerintah_desa" {{ $admin->role == 'pemerintah_desa' ? 'selected' : '' }}
                            {{ $admin->role == 'rt_rw' ? 'disabled' : '' }}>Pemerintah
                            Desa</option>
                        <option value="rt_rw" {{ $admin->role == 'rt_rw' ? 'selected' : '' }}>RT/RW</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="password"
                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" id="password" name="password"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" />
                </div>

                <div class="mb-4">

                    <label for="message" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Deskripsi
                        tentang anda</label>
                    <textarea id="message" rows="4" name="desc"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">{{ $admin->desc }}</textarea>

                </div>

                <button type="submit"
                    class="me-2 rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
            </form>
        </div>
        <div class="rounded bg-white p-4 shadow md:col-span-2">
            <!-- Content for the second card -->
            <h2 class="text-xl font-bold">Keterangan Aplikasi</h2>
            <p>This is the content for the second card.</p>
        </div>
    </div>
@endsection
