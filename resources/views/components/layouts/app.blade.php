<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
<div class="bg-white h-screen flex">
    @if (! ($blank ?? false))
        <div class="absolute inset-0 h-10 w-full flex items-center justify-center text-gray-800 blurred:text-gray-300 font-medium user-select-none" style="-webkit-app-region: drag">
            {{ $title ?? '' }}
        </div>

        <x-nav />
    @endif

    <div class="pt-12 mt-6 p-6 lg:p-8 shadow-lg flex-1">
        {{ $slot }}
    </div>
</div>
</body>
</html>
