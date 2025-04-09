<div class="flex flex-col space-y-4" wire:poll.100ms>
    <input type="text"
           readonly
           value="{{ $this->clipboardContent }}"
           class="transition duration-100 rounded-lg focus:border-transparent border border-gray-200 ring-offset-0 ring-gray-200 focus:ring-[#3A6CD9]/50 focus:ring-4"
           placeholder="Clipboard Content"/>

    <pre class="rounded-lg bg-gray-50 p-4 whitespace-pre-wrap" style="user-select: text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</pre>

    <hr>

    <div class="flex space-x-4 items-center">
        <input type="text"
               wire:model="newContent"
               class="flex-1 transition duration-100 rounded-lg focus:border-transparent border border-gray-200 ring-offset-0 ring-gray-200 focus:ring-[#3A6CD9]/50 focus:ring-4"
               placeholder="New Clipboard Content"/>

        <button
            wire:click="setClipboard"
            class="bg-linear-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow-sm">Set Clipboard Content</button>
    </div>
</div>
