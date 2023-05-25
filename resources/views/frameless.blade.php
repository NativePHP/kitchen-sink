<html>
    <head>
        <title></title>

        @vite('resources/css/app.css')
    </head>
    <body class="pt-1">
        <div class="border border-gray-500 transition-all duration-200 rounded-lg bg-gray-50 flex items-center px-4 h-10 opacity-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 animate-spin">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
            </svg>

            <span class="text-gray-600 ml-2">Doing something…</span>
        </div>

    <script>
        setTimeout(() => {
            document.querySelector('.opacity-0').classList.remove('opacity-0');
        }, 100);
        setTimeout(() => {
            document.querySelector('.border').classList.add('opacity-0');
            setTimeout(() => {
                window.close()
            }, 250);
        }, 2500);
    </script>
    </body>
</html>
