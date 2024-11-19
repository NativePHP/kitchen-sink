<div>
    <button
        wire:click="create"
        class="bg-gradient-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow"
    >
        Create MenuBar app
    </button>

    <button
        wire:click="clock"
        class="bg-gradient-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow"
    >
        Clock
    </button>

    <button
        wire:click="icon"
        class="bg-gradient-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow"
    >
        Give me a medal
    </button>

    <button
        wire:click="tooltip"
        class="bg-gradient-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow"
    >
        Give me a tip
    </button>

    <p class="my-4">
        What would you like from the MenuBar?
    </p>
    <p>
        {{ $order }}
    </p>
</div>
