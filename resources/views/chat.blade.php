@extends('layouts.app')

@section('content')
    <div class="p-8 flex min-h-screen">
        <div class="relative w-2/3">
            <div class="w-full text-center mb-6">
                <h1 class="text-3xl font-bold">{{ $chatbot->chatbot_name }}</h1>
                <p class="text-lg text-gray-600">{{ $chatbot->chatbot_description }}</p>
            </div>
            <div class="relative max-h-[70vh] overflow-y-auto" style="background-color: rgba(0, 0, 0, 0.1); border-radius: 8px; min-height: 55vh;">
                @forelse ($messages as $message)
                    <div class="chat {{ $message->sender == 1 ? 'chat-end' : 'chat-start' }} ml-4 mr-4 mt-2">
                        <div class="chat-image avatar">
                            <div class="w-10 rounded-full">
                                <img alt="Avatar" src="{{ $message->sender == 1 ? (Auth::user()->image_url ? Auth::user()->image_url : asset('images/guest.png')) : ($chatbot->image_url ? $chatbot->image_url : asset('images/guest.png')) }}" />
                            </div>
                        </div>
                        <div class="chat-header">
                            {{ $message->sender == 1 ? 'You' : $chatbot->chatbot_name }}
                        </div>
                        <div class="chat-bubble">{{ $message->message }}</div>
                        <div class="chat-footer opacity-50">
                            {{ $message->created_at->setTimezone('Asia/Bangkok')->format('H:i') }}
                        </div>
                    </div>
                @empty
                    <div class="text-center text-gray-600 py-10">
                        You have not started a chat yet. Send a message and see how the bot responds!
                    </div>
                @endforelse
            </div>

            <div class="sticky flex gap-2 bg-black rounded-md m-4 bottom-0 text-white p-4">
                <form action="{{ url('/chat/' . $session->id . '/clear') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline btn-danger">Clear Chat</button>
                </form>
                <form action="{{ url('/chat/' . $session->id . '/send') }}" method="POST" class="flex-grow">
                    @csrf
                    <div class="flex gap-2">
                        {{-- Message Input --}}
                        <input id="messageInput" name="message" class="pl-4 w-full rounded-md" type="text" style="color: black;" oninput="toggleButton()">

                        {{-- Send Button --}}
                        <button id="sendButton" class="btn btn-active btn-primary" type="submit">
                            <span class="material-symbols-outlined">
                                send
                            </span>
                            <span>
                                Send
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="divider divider-horizontal"></div>
        <div class="w-1/3 h-[70vh] overflow-y-auto">
            <div class="divider divider-vertical"></div>
            <div>
                <p class="text-lg font-semibold">Comments</p>
                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <div class="mb-4 flex gap-2">
                        <textarea id="comment" name="comment" rows="1"style="resize: none;"
                            class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add</button>
                    </div>
                    <input type="hidden" name="chatbot_id" value="{{ $chatbot_id }}">
                </form>
                <div class="flex flex-col">

                    @foreach ($comments as $comment)
                        <div>
                            <div class="flex items-center gap-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle w-12 h-12">
                                        @if ($comment->user->image_url)
                                            <img src="{{ $comment->user->image_url }}" />
                                        @else
                                            <img src="{{ asset('images/guest.png') }}" />
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    @if ($comment->user)
                                        <!-- Check if the 'user' relationship exists -->
                                        <div class="font-bold">{{ $comment->user->display_name }}</div>
                                    @else
                                        <div class="font-bold">Unknown User</div>
                                    @endif

                                    <p>{{ $comment->content }}</p>

                                </div>
                            </div>
                            <div class="divider divider-vertical"></div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <script>
        var pollingInterval;

        function sendMessage() {
            var message = document.getElementById('messageInput').value.trim();
            var chatId = '{{ $session->id }}';

            if (message) {
                document.getElementById('messageInput').value = '';
                toggleButton();
                startPolling();
            }
        }

        function startPolling() {
            if (pollingInterval) {
                clearInterval(pollingInterval);
            }
            pollingInterval = setInterval(checkForNewMessages, 200);
        }

        function checkForNewMessages() {
            var chatId = '{{ $session->id }}';
            var lastMessageId = getLastMessageId();

            fetch('/chat/' + chatId + '/check-new-messages?lastMessageId=' + lastMessageId, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
            }).then(response => response.json())
              .then(data => {
                    if (data.newMessages) {
                        clearInterval(pollingInterval);
                        location.reload();
                    }
                });
        }

        function getLastMessageId() {
            var lastMessage = document.querySelector('.chat:last-child');
            return lastMessage ? lastMessage.dataset.messageId : 0;
        }

        function scrollToBottom() {
            const chatContainer = document.querySelector('.relative.overflow-y-auto');
            if (chatContainer) {
                chatContainer.scrollTop = chatContainer.scrollHeight;
            }
        }

        function toggleButton() {
            var input = document.getElementById('messageInput');
            var button = document.getElementById('sendButton');
            if (input.value.trim()) {
                button.disabled = false;
            } else {
                button.disabled = true;
            }
        }

        window.onload = function() {
            toggleButton();
            scrollToBottom();
        };
    </script>
@endsection
