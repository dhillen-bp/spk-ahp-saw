<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>

<body class="">

    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="gap- mx-auto flex flex-col items-center justify-center px-6 py-8 md:h-screen lg:py-0">
            <a href="#"
                class="mb-6 flex items-center justify-center gap-2 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-20" src="{{ asset('images/logo/logo_kab_sukoharjo.png') }}" alt="logo">
                <div class="ml-3 space-y-3">
                    <p>Desa Karangwuni</p>
                    <p>Kabupaten Sukoharjo</p>
                </div>
            </a>
            <div
                class="w-full rounded-lg bg-white shadow dark:border dark:border-gray-700 dark:bg-gray-800 sm:max-w-md md:mt-0 xl:p-0">
                <div class="space-y-4 p-6 sm:p-8 md:space-y-6">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white md:text-2xl">
                        Masuk ke Halaman Admin
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="POST"
                        action="{{ route('admin.login.authenticate') }}">
                        @csrf
                        <div>
                            <label for="username" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Username</label>
                            <input type="text" name="username" id="username"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                placeholder="Masukkan username" required="">
                        </div>
                        <div>
                            <label for="password"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                required="">
                        </div>
                        <div class="flex items-center justify-between">
                            {{-- <div class="flex items-start">
                                <div class="flex h-5 items-center">
                                    <input id="remember" aria-describedby="remember" type="checkbox"
                                        class="focus:ring-3 h-4 w-4 rounded border border-gray-300 bg-gray-50 focus:ring-blue-300 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        required="">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                </div>
                            </div> --}}
                            <a href="#"
                                class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">Forgot
                                password?</a>
                        </div>
                        <button type="submit"
                            class="w-full rounded-lg bg-blue-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign
                            in</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Kembali ke <a href="/"
                                class="font-medium text-blue-600 hover:underline dark:text-blue-500">halaman
                                pengguna</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @if (session()->has('success_message'))
        @component('admin.layouts.toastr-success', ['message' => session('success_message')])
        @endcomponent
    @endif

    @if (session()->has('error_message'))
        @component('admin.layouts.toastr-danger', ['message' => session('error_message')])
        @endcomponent
    @endif

</body>

</html>
