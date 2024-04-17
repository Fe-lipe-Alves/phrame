<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <title>{{ $title ?? config('app.name') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="text-raisin-black font-inter">
<div class="w-full min-h-screen flex flex-col items-center bg-white">
    <x-layouts.headers.header-guest/>

    <div class="flex-1 w-full flex justify-center">
        {{ $slot }}
    </div>

    <x-layouts.footer/>
</div>
</body>
</html>
