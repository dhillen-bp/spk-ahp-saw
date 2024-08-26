<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
    <title>Web BLT Dana Desa Karangwini</title>
</head>

<body class="">

    @include('layouts.navbar')


    @yield('content')

    @include('layouts.footer')

    @if (session()->has('success_message'))
        @component('admin.layouts.toastr-success', ['message' => session('success_message')])
        @endcomponent
    @endif

    @if (session()->has('error_message'))
        @component('admin.layouts.toastr-danger', ['message' => session('error_message')])
        @endcomponent
    @endif

    @include('layouts.script')
    @stack('after-script')

</body>

</html>
