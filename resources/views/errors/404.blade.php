<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
    @section('title')
        404 Halaman Tidak Tersedia
    @endsection
</head>

<body class="">
    <section class="bg-white dark:bg-gray-900">
        <div class="mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-16">
            <div class="mx-auto max-w-screen-sm text-center">
                <h1 class="mb-4 text-7xl font-extrabold tracking-tight text-blue-600 dark:text-blue-500 lg:text-9xl">
                    404</h1>
                <p class="mb-4 text-3xl font-bold tracking-tight text-gray-900 dark:text-white md:text-4xl">Ada yang
                    salah!</p>
                <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Maaf, kami tidak dapat menemukan
                    halaman yang anda cari.
                    Temukan lebih banyak pada halaman beranda. </p>
                <a href="/"
                    class="my-4 inline-flex rounded-lg bg-blue-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">Kembali
                    ke beranda</a>
            </div>
        </div>
    </section>
</body>

</html>
