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
        <div class="w-1/3">
            <div>test</div>
        </div>
    </div>
@endsection
