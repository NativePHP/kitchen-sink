<div>
    <div class="flex flex-col space-y-4">
        <input type="text"
               wire:model="title"
               class="transition duration-100 rounded-lg focus:border-transparent border border-gray-200 ring-offset-0 ring-gray-200 focus:ring-[#3A6CD9]/50 focus:ring-4"
               placeholder="Title"/>

        <input type="text"
               wire:model="buttonLabel"
               class="transition duration-100 rounded-lg focus:border-transparent border border-gray-200 ring-offset-0 ring-gray-200 focus:ring-[#3A6CD9]/50 focus:ring-4"
               placeholder="Button Label"/>

        <label class="flex items-center space-x-2">
            <input type="checkbox"
                   wire:model="multipleSelections"
                   class="transition duration-100 rounded border border-gray-800 focus:ring-0"/>
            <span class="ml-2 mt-0 text-gray-500 inline-block">Allow multiple selections</span>
        </label>

        <label class="flex items-center space-x-2">
            <input type="checkbox"
                   wire:model="resolveSymlinks"
                   class="transition duration-100 rounded border border-gray-800 focus:ring-0"/>
            <span class="ml-2 mt-0 text-gray-500 inline-block">Resolve symlinks</span>
        </label>

        <label class="flex items-center space-x-2">
            <input type="checkbox"
                   wire:model="asSheet"
                   class="transition duration-100 rounded border border-gray-800 focus:ring-0"/>
            <span class="ml-2 mt-0 text-gray-500 inline-block">Present as sheet (macOS only)</span>
        </label>
    </div>
    <div class="mt-4 flex space-x-4 items-center">

        <button
            wire:click="selectFile"
            class="bg-gradient-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow">
            Select File
        </button>
        <div class="size-5">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </div>
        <input type="text"
               readonly
               value="{{ $this->selectedFile }}"
               class="flex-1 transition duration-100 rounded-lg focus:border-transparent border border-gray-200 ring-offset-0 ring-gray-200 focus:ring-[#3A6CD9]/50 focus:ring-4"
               placeholder=""/>

    </div>

    <hr class="mt-4" />


    <div class="mt-4 flex space-x-4 items-center">
        <button
            wire:click="saveFile"
            class="bg-gradient-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow">
            Save Dialog
        </button>
        <div class="size-5">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </div>
        <input type="text"
               readonly
               value="{{ $this->selectedSaveFile }}"
               class="flex-1 transition duration-100 rounded-lg focus:border-transparent border border-gray-200 ring-offset-0 ring-gray-200 focus:ring-[#3A6CD9]/50 focus:ring-4"
               placeholder=""/>

    </div>
</div>
