<div class="">
    <header class="border-b w-full border-gray-400 h-12 flex items-center justify-between mb-4 ">
        <button
            wire:click="chooseFile"
            class="bg-gradient-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow">Continue</button>
        <span class="font-mono">{{ $filename }}</span>
    </header>
    <div class="prose mt-8">
        {!! $content !!}
    </div>
</div>
