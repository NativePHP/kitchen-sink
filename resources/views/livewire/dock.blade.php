<div class="space-4">

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
    </div>

    <p class="mt-4">
        App will bounce in <span wire:stream="countdown">{{ $this->countdown }}</span> seconds
        <br> Unfocus the window to see the effect
    </p>


</div>
