<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>

<body class="">

    @include('layouts.navbar')


    @yield('content')

    @include('layouts.footer')

    @include('layouts.script')
    @yield('after-script')

</body>

</html>
