<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('admin.layouts.head')
    <title>SPK BLT Dana Desa Karangwini</title>
</head>

<body class="">

    @include('admin.layouts.navbar')

    @include('admin.layouts.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="mt-14 dark:bg-gray-700">
            @yield('content')

            @if (session()->has('success_message'))
                @component('admin.layouts.toastr-success', ['message' => session('success_message')])
                @endcomponent
            @endif

            @if (session()->has('error_message'))
                @component('admin.layouts.toastr-danger', ['message' => session('error_message')])
                @endcomponent
            @endif
        </div>
    </div>

    @include('admin.layouts.footer')

    @include('admin.layouts.script')
    @stack('after-script')

</body>

</html>
