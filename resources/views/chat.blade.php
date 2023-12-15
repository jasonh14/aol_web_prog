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
                <p class="text-lg font-semibold">Reviews</p>
                <div class="bg-black bg-opacity-10 p-6 rounded-lg ml-3 mr-3 mt-3 mb-3">
                    <h2 class="text-lg font-bold mb-4">Give a Review</h2>
                    <form action="{{ route('comments.store') }}" method="POST" id="reviewForm">
                        @csrf
                        <div class="mb-4">
                            <!-- Star Rating -->
                            <div class="rating rating-lg rating-half">
                                <input type="radio" name="rating" value="0.5" class="bg-green-500 mask mask-star-2 mask-half-1"/>
                                <input type="radio" name="rating" value="1" class="bg-green-500 mask mask-star-2 mask-half-2" />
                                <input type="radio" name="rating" value="1.5" class="bg-green-500 mask mask-star-2 mask-half-1" />
                                <input type="radio" name="rating" value="2" class="bg-green-500 mask mask-star-2 mask-half-2" />
                                <input type="radio" name="rating" value="2.5" class="bg-green-500 mask mask-star-2 mask-half-1" />
                                <input type="radio" name="rating" value="3" class="bg-green-500 mask mask-star-2 mask-half-2" />
                                <input type="radio" name="rating" value="3.5" class="bg-green-500 mask mask-star-2 mask-half-1" />
                                <input type="radio" name="rating" value="4" class="bg-green-500 mask mask-star-2 mask-half-2" />
                                <input type="radio" name="rating" value="4.5" class="bg-green-500 mask mask-star-2 mask-half-1" />
                                <input type="radio" name="rating" value="5" class="bg-green-500 mask mask-star-2 mask-half-2" />
                            </div>
                        </div>

                        <div class="mb-4 flex gap-2">
                            <textarea id="comment" name="comment" rows="1" style="resize: none;"
                                class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                            <button type="submit" id="submitButton"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" disabled>Input rating and comment</button>
                        </div>
                        <input type="hidden" name="chatbot_id" value="{{ $chatbot_id }}">
                    </form>
                </div>

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
                                    <div class="flex items-center">
                                        <!-- Username -->
                                        @if ($comment->user)
                                        <div class="font-bold">{{ $comment->user->display_name }}</div>
                                        @else
                                            <div class="font-bold">Unknown User</div>
                                        @endif

                                        <!-- Star Rating -->
                                        <div class="ml-3 mb-2 inline-flex items-center rounded-lg bg-white p-2 shadow-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <span class="ml-1 text-xs text-slate-400">{{ number_format($comment->rating, 1) }}</span>
                                        </div>
                                    </div>


                                    <p>{{ $comment->content }}</p>

                                    <!-- Timestamp -->
                                    <div class="text-sm text-gray-500">
                                        {{ $comment->createdAt->setTimezone('Asia/Bangkok')->diffForHumans(null, false, false, 1) }}
                                    </div>
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
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('reviewForm');
            const comment = document.getElementById('comment');
            const submitButton = document.getElementById('submitButton');
            const ratings = form.querySelectorAll('input[name="rating"]');

            function updateButtonState() {
                const isCommentEmpty = !comment.value.trim();
                const isRatingSelected = [...ratings].some(radio => radio.checked);
                const isValid = !isCommentEmpty && isRatingSelected;

                submitButton.disabled = !isValid;
                submitButton.textContent = isValid ? 'Submit' : 'Input rating and comment';
                submitButton.className = isValid ? 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline' : 'bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline';
            }

            comment.addEventListener('input', updateButtonState);
            ratings.forEach(rating => rating.addEventListener('change', updateButtonState));

            updateButtonState(); // Initial check on page load
        });
    </script>


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

            fetch('http://127.0.0.1:8000/api/chat/' + chatId + '/check-new-messages?lastMessageId=' + lastMessageId, {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
                method: "GET"
            }).then(response => response.json())
              .then(data => {
                    console.log('CHECK NEW MESSAGES JS');
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
