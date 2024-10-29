<div wire:poll.250ms>
    <div>
        <span class="font-medium text-gray-600">Cursor Position:</span>
        {{ $this->cursorPosition->x }} , {{ $this->cursorPosition->y }}
    </div>

    <hr class="my-4" />

    <div>
        <span class="font-medium text-gray-600">Connected Displays:</span>
        <ul class="list-disc list-inside">
            @foreach($this->displays as $display)
                <li>
                    <span class="font-medium text-gray-600">Display #{{ $display['id'] }} – {{ $display['label'] }}:</span>
                    {{ $display['bounds']['width'] }} x {{ $display['bounds']['height'] }}
                </li>
            @endforeach
    </div>
</div>
