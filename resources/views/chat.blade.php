@extends('layouts.app')
@section('content')
    <div class="p-8 flex min-h-screen">

        <div class="relative w-2/3 max-h-[70vh] overflow-y-auto">
            @for ($i = 0; $i < 100; $i++)
                <div class="chat chat-start">
                    <div class="chat-image avatar">
                        <div class="w-10 rounded-full">
                            <img alt="Tailwind CSS chat bubble component"
                                src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                        </div>
                    </div>
                    <div class="chat-header">
                        Obi-Wan Kenobi
                        <time class="text-xs opacity-50">12:45</time>
                    </div>
                    <div class="chat-bubble">You were the Chosen One!</div>
                    <div class="chat-footer opacity-50">
                        Delivered
                    </div>
                </div>
                <div class="chat chat-end">
                    <div class="chat-image avatar">
                        <div class="w-10 rounded-full">
                            <img alt="Tailwind CSS chat bubble component"
                                src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                        </div>
                    </div>
                    <div class="chat-header">
                        Anakinp
                        <time class="text-xs opacity-50">12:46</time>
                    </div>
                    <div class="chat-bubble">I hate you!</div>
                    <div class="chat-footer opacity-50">
                        Seen at 12:46
                    </div>
                </div>
            @endfor
            <div class="sticky flex gap-2 bg-black rounded-md m-4 bottom-0 text-white  p-4">
                <input class="pl-4 w-5/6 rounded-md" type="text">
                <button class="btn btn-active w-1/6 btn-primary ">
                    <span class="material-symbols-outlined">
                        send
                    </span>
                    <span>
                        send
                    </span>
                </button>
            </div>
        </div>
        <div class="divider divider-horizontal"></div>
        <div class="w-1/3 h-[70vh] overflow-y-auto">
            <div>test</div>
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
@endsection
