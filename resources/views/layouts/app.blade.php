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

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

            
            @include('layouts.navigation')

        
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('services') ? 'active' : '' }}" href="/services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('bookings') ? 'active' : '' }}" href="/bookings">Bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('payments') ? 'active' : '' }}" href="/payments">Payments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('paymenthistory') ? 'active' : '' }}" href="/paymenthistory">Payment History</a>
                    </li>
                </ul>
            </div>

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow mt-4">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="mt-4">
                {{ $slot }}
            </main>

        </div>
    </body>
</html>