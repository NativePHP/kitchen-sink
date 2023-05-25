<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    @livewireStyles
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>


<body
    class=""
>
<div class="bg-white h-screen flex">
    <div class="absolute inset-0 h-10 w-full flex items-center justify-center text-gray-800 blurred:text-gray-300 font-medium user-select-none" style="-webkit-app-region: drag">
        {{ $title ?? '' }}
    </div>
    <div class="pt-12 bg-gray-50 p-4 min-w-[300px] border-r border-gray-200">
        <ul class="text-[#434343]">
            <li
                @class([
                    'text-[#434343] text-sm p-1 rounded-lg pl-4',
                    'bg-gray-300/60' => request()->is('notifications*'),
                ])>
                <a class="inline-block w-full" href="/notifications">Notifications</a>
            </li>
            <li
                @class([
                    'text-[#434343] text-sm p-1 rounded-lg pl-4',
                    'bg-gray-300/60' => request()->is('clipboard*'),
                ])>
                <a class="inline-block w-full" href="/clipboard">Clipboard</a>
            </li>
            <li
                @class([
                    'text-[#434343] text-sm p-1 rounded-lg pl-4',
                    'bg-gray-300/60' => request()->is('dialogs*'),
                ])>
                <a class="inline-block w-full" href="/dialogs">Dialogs</a>
            </li>
            <li
                @class([
                    'text-[#434343] text-sm p-1 rounded-lg pl-4',
                    'bg-gray-300/60' => request()->is('screen*'),
                ])>
                <a class="inline-block w-full" href="/screen">Screen</a>
            </li>
            <li
                @class([
                    'text-[#434343] text-sm p-1 rounded-lg pl-4',
                    'bg-gray-300/60' => request()->is('global-shortcuts*'),
                ])>
                <a class="inline-block w-full" href="/global-shortcuts">Global Shortcuts</a>
            </li>
            <li
                @class([
                    'text-[#434343] text-sm p-1 rounded-lg pl-4',
                    'bg-gray-300/60' => request()->is('app*'),
                ])>
                <a class="inline-block w-full" href="/app">App</a>
            </li>
        </ul>
    </div>
    <div class="pt-12 mt-6 p-6 lg:p-8 shadow-lg flex-1">
        {{ $slot }}
    </div>
</div>
@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
<script>
    const electron = require('electron');
    const ipcRenderer = electron.ipcRenderer;
    ipcRenderer.on('window:blur', () => {
        document.documentElement.classList.remove('focused');
        document.documentElement.classList.add('blurred');
    });
    ipcRenderer.on('window:focus', () => {
        document.documentElement.classList.remove('blurred');
        document.documentElement.classList.add('focused');
    });
</script>
</body>
</html>
