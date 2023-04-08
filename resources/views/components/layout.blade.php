<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-blue-200">
    {{--  <div class="min-h-screen">  --}}
    <div style="min-height: 95vh">
        @include('layouts.navigation_front')

        <!-- Page Heading -->


        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        
    </div>
    <header>
        <div class="container bg-blue-200 ">
            <div class="border-t border-gray-600 pt-2">
                <div class="text-sm text-gray-200">Creado por
                     <a class="text-cyan-400 hover:underline" href="https://www.facebook.com/jaj.fracchia/"target="_blank" rel="noopener noreferrer">Josimar Jauregui</a>.
                </div>
            </div>
        </div>
    </header>
</body>

</html>
