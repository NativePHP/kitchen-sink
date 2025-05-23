<div class="flex flex-col space-y-4">
    @if (! $unlocked)
        <button
            wire:click="unlockWithTouchID"
            class="bg-linear-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow-sm">
            Unlock with TouchID
        </button>
    @else
        <button
            wire:click="lock"
            class="bg-linear-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow-sm">
            Lock
        </button>

        <label for="badgeCount" class="text-sm font-medium text-gray-700">Badge Count</label>
        <input type="number"
               wire:model.live="badgeCount"
               class="flex-1 transition duration-100 rounded-lg focus:border-transparent border border-gray-200 ring-offset-0 ring-gray-200 focus:ring-[#3A6CD9]/50 focus:ring-4"
               placeholder=""/>

        <button
            wire:click="hide"
            class="bg-linear-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow-sm">Hide
        </button>

        <label for="printers" class="text-sm font-medium text-gray-700">Printers</label>
        <div id="printers">
            @foreach($printers as $id => $name)
                <span>{{ $name }}</span>
            @endforeach
        </div>
    @endif
</div>
