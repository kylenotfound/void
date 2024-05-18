<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', "Kyle's Void")</title>

        <meta name="description" content="@yield('description')">
        <meta name="og:description" content="Kyle's Void">
        <meta name="og:title" content="@yield('title', "Kyle's Void")">
        <meta name="og:description" content="@yield('description')">
        <meta name="og:url" content="{{ request()->url() }}">
        <meta name="og:type" content="website">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/07b7751319.js" crossorigin="anonymous"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    {{-- display none is set here, but is removed on js load to avoid theme decision flicker --}}
    <body class="font-sans antialiased" style="display: none;">