<div class="pt-12 bg-gray-50 p-4 min-w-[300px] border-r border-gray-200">
    <ul class="text-[#434343]">
        <li
            @class([
                'text-[#434343] text-sm p-1 rounded-lg pl-4',
                'bg-gray-300/60' => request()->is('app*'),
            ])>
            <a class="inline-block w-full" href="/app">App</a>
        </li>
        <li
            @class([
                'text-[#434343] text-sm p-1 rounded-lg pl-4',
                'bg-gray-300/60' => request()->is('child-processes*'),
            ])>
            <a class="inline-block w-full" href="/child-processes">Child Processes</a>
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
                'bg-gray-300/60' => request()->is('context-menu*'),
            ])>
            <a class="inline-block w-full" href="/context-menu">Context Menu</a>
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
                'bg-gray-300/60' => request()->is('global-shortcuts*'),
            ])>
            <a class="inline-block w-full" href="/global-shortcuts">Global Shortcuts</a>
        </li>
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
                'bg-gray-300/60' => request()->is('screen*'),
            ])>
            <a class="inline-block w-full" href="/screen">Screen</a>
        </li>
        <li
            @class([
                'text-[#434343] text-sm p-1 rounded-lg pl-4',
                'bg-gray-300/60' => request()->is('window*'),
            ])>
            <a class="inline-block w-full" href="/window">Window</a>
        </li>
    </ul>
</div>
