<!DOCTYPE html>
<html class="light" lang="ru">
<head>
    <meta charset="utf-8">
    <link href="" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Админка - Quiet</title>

    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('admin/css/dashboard.css') }}" />
{{--    @vite(['resources/assets/admin/scss/main.scss'])--}}

    @yield('head')

</head>

<body class="main">

    <div class="flex">

        @include('admin.components.sidebar')

        <div class="content">
            <div class="top-bar">
                @include('admin.components.breadcrumbs')
                @include('admin.components.topbar')
            </div>

            @yield('content')
        </div>

    </div>

<div id="emptyModal" class="st_modal"></div>

<div class="overlay"></div>

<script src="{{ asset('admin/js/dashboard.js') }}"></script>

@vite(['resources/assets/admin/js/app.js'])

@yield('footer')
</body>
</html>
