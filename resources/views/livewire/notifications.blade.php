<div class="flex flex-col space-y-4">
    <input type="text"
           wire:model="title"
           class="transition duration-100 rounded-lg focus:border-transparent border border-gray-200 ring-offset-0 ring-gray-200 focus:ring-[#3A6CD9]/50 focus:ring-4"
           placeholder="Title"/>

    <input type="text"
           wire:model="message"
           class="transition duration-100 rounded-lg focus:border-transparent border border-gray-200 ring-offset-0 ring-gray-200 focus:ring-[#3A6CD9]/50 focus:ring-4"
           placeholder="Message"/>

    <button
        wire:click="sendNotification"
        class="bg-gradient-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow">Send
    </button>


    <button
        wire:click="framelessWindow"
        class="bg-gradient-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow">Frameless Notification
    </button>


    @if ($notificationClicked)
        <div>
            The notification was clicked!
        </div>
    @endif
</div>
