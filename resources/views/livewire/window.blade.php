<div class="">
    <div class="flex flex-col space-y-4">
        <input type="text"
               wire:model="windowId"
               class="transition duration-100 rounded-lg focus:border-transparent border border-gray-200 ring-offset-0 ring-gray-200 focus:ring-[#3A6CD9]/50 focus:ring-4"
               placeholder="ID (leave empty for random)"/>

        <input type="text"
               wire:model="title"
               class="transition duration-100 rounded-lg focus:border-transparent border border-gray-200 ring-offset-0 ring-gray-200 focus:ring-[#3A6CD9]/50 focus:ring-4"
               placeholder="Title"/>

        <label class="flex items-center space-x-2">
            <input type="checkbox"
                   wire:model="multipleSelections"
                   class="transition duration-100 rounded border border-gray-800 focus:ring-0"/>
            <span class="ml-2 mt-0 text-gray-500 inline-block">Allow multiple selections</span>
        </label>

        <button
            wire:click="open"
            class="bg-gradient-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow">
            Open Window
        </button>
    </div>
</div>
