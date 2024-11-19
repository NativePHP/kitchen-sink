<div>
    <button
        wire:click="bounce"
        class="bg-gradient-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow"
    >
        Bounce
    </button>

    <button
        wire:click="bounce('critical')"
        class="bg-gradient-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow"
    >
        Critical Bounce
    </button>

    <span wire:stream="countdown"></span>
</div>
