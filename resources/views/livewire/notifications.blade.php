<div class="flex flex-col space-y-4" x-data="actions">
    <input type="text"
           wire:model="title"
           class="transition duration-100 rounded-lg focus:border-transparent border border-gray-200 ring-offset-0 ring-gray-200 focus:ring-[#3A6CD9]/50 focus:ring-4"
           placeholder="Title"/>

    <input type="text"
           wire:model="message"
           class="transition duration-100 rounded-lg focus:border-transparent border border-gray-200 ring-offset-0 ring-gray-200 focus:ring-[#3A6CD9]/50 focus:ring-4"
           placeholder="Message"/>

        <label class="flex items-center space-x-2">
            <input type="checkbox"
                   wire:model="hasReply"
                   class="transition duration-100 rounded border border-gray-800 focus:ring-0"/>
            <span class="ml-2 mt-0 text-gray-500 inline-block">Can reply to the Notification (macOS only)</span>
        </label>

    <input type="text"
           x-show="$wire.hasReply"
           x-cloak=""
           wire:model="replyPlaceholder"
           class="transition duration-100 rounded-lg focus:border-transparent border border-gray-200 ring-offset-0 ring-gray-200 focus:ring-[#3A6CD9]/50 focus:ring-4"
           placeholder="Reply placeholder"/>


    <button
        x-on:click="$wire.actions.push('')"
        class="bg-gray-600 rounded-lg text-white py-1 px-2 shadow">Add Action
    </button>
    <div class="space-x-2">
        <template x-for="(action, index) in $wire.actions" :key="index">
            <div class="flex space-x-2">
                <input type="text"
                       x-model="$wire.actions[index]"
                       class="flex-1 transition duration-100 rounded-lg focus:border-transparent border border-gray-200 ring-offset-0 ring-gray-200 focus:ring-[#3A6CD9]/50 focus:ring-4"
                       placeholder="Action"/>
                <button
                    x-on:click="$wire.actions.splice(index, 1)"
                    class="bg-gray-600 rounded-lg text-white py-1 px-2 shadow">Remove
                </button>
            </div>
        </template>

    </div>
    <button
        wire:click="sendNotification"
        class="bg-gradient-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow">Send
    </button>



    <hr>
    <p>This is an example of using frameless windows to make your own notification.</p>
    <button
        wire:click="framelessWindow"
        class="bg-gradient-to-b from-[#4B91F7] to-[#367AF6] rounded-lg text-white py-1 px-2 shadow">Frameless Notification
    </button>


    @if ($notificationClicked)
        <div>
            The notification was clicked!
        </div>
    @endif

    @if ($notificationReplied)
        <div>
            {{ $notificationReplied }}
        </div>
    @endif
</div>
