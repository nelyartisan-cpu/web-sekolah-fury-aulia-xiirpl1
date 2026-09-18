<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ config('app.name', 'SMK Negeri 1 Cijati') }}
    </title>


    {{-- Bootstrap --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    {{-- Bootstrap Icons --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >


    {{-- Font --}}
    <link
        rel="preconnect"
        href="https://fonts.bunny.net"
    >

    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap"
        rel="stylesheet"
    >


    {{-- Vite --}}
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>


<body
    style="
        margin:0;
        font-family:'Figtree', sans-serif;
        background:#f5f7fb;
    "
>


    {{-- NAVBAR ADMIN --}}
    @include('layouts.navigation')


    {{-- HEADER --}}
    @isset($header)

        <header
            style="
                background:white;
                border-bottom:1px solid #e5e7eb;
            "
        >

            <div class="container-fluid px-4 py-3">

                {{ $header }}

            </div>

        </header>

    @endisset


    {{-- CONTENT --}}
    <main>

        {{ $slot }}

    </main>


    {{-- Bootstrap JS --}}
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    ></script>


</body>

</html>