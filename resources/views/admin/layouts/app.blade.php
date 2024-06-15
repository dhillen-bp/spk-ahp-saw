<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>

<body class="">

    @include('admin.layouts.navbar')

    @include('admin.layouts.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="mt-14 dark:bg-gray-700">
            @yield('content')
        </div>
    </div>

    @include('admin.layouts.footer')

    @include('layouts.script')
    @yield('after-script')

</body>

</html>
