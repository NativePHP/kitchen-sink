<div class="flex flex-col">

    <div class="mb-4 space-y-4 flex-col flex">
        <button
            wire:click="register"
            class="bg-gradient-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow">
            Register Context Menu
        </button>

        <button
            wire:click="remove"
            class="bg-gradient-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow">
            Remove Context Menu
        </button>
    </div>

    <div class="h-32 w-32 bg-red-200 cursor-context-menu" id="context1"></div>

    <div class="mt-8">
        <span class="font-medium">Context Menu Events:</span>
        <ul class="list-disc ml-4">
            @foreach($latestEvents as $event)
                <li>{{ json_encode($event, JSON_PRETTY_PRINT) }}</li>
            @endforeach
        </ul>
    </div>
</div>
