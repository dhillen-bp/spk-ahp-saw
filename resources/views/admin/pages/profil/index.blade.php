@extends('admin.layouts.app')

@section('content')
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-1 rounded bg-white p-4 shadow">
            <!-- Content for the first card -->
            <h2 class="text-xl font-bold">Profil Pengguna</h2>

            <form class="py-6">
                <div class="mb-4">
                    <label for="nama" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input type="text" id="nama"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        required />
                </div>
                <div class="mb-4">
                    <label for="username"
                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Username</label>
                    <input type="text" id="username"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        required />
                </div>
                <div class="mb-4">
                    <label for="role" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Role</label>
                    <input type="text" id="role"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        required />
                </div>
                <div class="mb-4">
                    <label for="password"
                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" id="password"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        required />
                </div>

                <button type="submit"
                    class="me-2 rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
            </form>
        </div>
        <div class="col-span-2 rounded bg-white p-4 shadow">
            <!-- Content for the second card -->
            <h2 class="text-xl font-bold">Keterangan Aplikasi</h2>
            <p>This is the content for the second card.</p>
        </div>
    </div>
@endsection
