<div>

    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>


    <div class="space-y-2 mb-4">
        <ul class="list-disc list-inside">
        @foreach($shortcuts as $registeredShortcut)
            <li class="flex items-center space-x-2 my-2">
                <span class="font-mono text-gray-600">{{ $registeredShortcut }}</span>
                <button
                    wire:click="removeShortcut('{{ $registeredShortcut }}')"
                    class="bg-gradient-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow">
                    Remove
                </button>
            </li>
        @endforeach
        </ul>
    </div>

    <div class="space-x-2">
        <input type="text"
               id="shortcut"
               class="flex-1 transition duration-100 rounded-lg focus:border-transparent border border-gray-200 ring-offset-0 ring-gray-200 focus:ring-[#3A6CD9]/50 focus:ring-4"
               placeholder="New Shortcut"/>

        <button
            wire:click="saveShortcut"
            class="bg-gradient-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow">
            Select Shortcut
        </button>
    </div>

    @if($lastPressed)
        <div class="mt-4">
            <span class="font-bold">Pressed:</span>
            <span class="font-mono text-gray-600">{{ $lastPressed }}</span>
        </div>
    @endif
</div>

<script>
    hotkeys('*', function (event, handler) {
        event.preventDefault();
        document.getElementById('shortcut').value = hotkeys.getPressedKeyString();
        @this.shortcut = hotkeys.getPressedKeyString();
    });
    hotkeys.filter = function (event) {
        return event.target.id === 'shortcut';
    }
</script>
