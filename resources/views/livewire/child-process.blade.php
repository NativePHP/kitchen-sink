<div class="flex flex-col space-y-4">
    <input type="text"
           wire:model="alias"
           class="transition duration-100 rounded-lg focus:border-transparent border border-gray-200 ring-offset-0 ring-gray-200 focus:ring-[#3A6CD9]/50 focus:ring-4"
           placeholder="Alias (leave empty for random)"/>

    <label class="flex items-center space-x-2">
        <input type="checkbox"
               wire:model="persistent"
               class="transition duration-100 rounded-sm border border-gray-800 focus:ring-0"/>
        <span class="ml-2 mt-0 text-gray-500 inline-block">Persistent</span>
    </label>

    <button
        wire:click="start"
        class="bg-linear-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow-sm">
        Start Process
    </button>

    <button
        wire:click="stop"
        class="bg-linear-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow-sm">
        Stop Process
    </button>

    <button
        wire:click="restart"
        class="bg-linear-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow-sm">
        Restart Process
    </button>

    <button
        wire:click="getProcess"
        class="bg-linear-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow-sm">
        Get Process
    </button>

    <button
        wire:click="getAll"
        class="bg-linear-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow-sm">
        All Processes
    </button>

    <hr>

    <div class="flex space-x-4 items-center">
        <input type="text"
               wire:model="message"
               class="flex-1 transition duration-100 rounded-lg focus:border-transparent border border-gray-200 ring-offset-0 ring-gray-200 focus:ring-[#3A6CD9]/50 focus:ring-4"
               placeholder="Message the process"/>

        <button
            wire:click="sendMessage"
            class="bg-linear-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow-sm">
            Send message to process
        </button>
    </div>

    <button
        wire:click="clearLog"
        class="bg-linear-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow-sm">
        Clear log
    </button>

    <pre class="rounded-lg bg-gray-50 p-4 whitespace-pre-wrap" style="user-select: text">
@foreach ($log as $line)
{{ $line }}
@endforeach
</pre>
</div>
