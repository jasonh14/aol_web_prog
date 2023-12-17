@extends('layouts.app')
@section('content')
    <div class="flex w-full flex-wrap gap-3 p-4">
        @if (count($chatbots) == 0)
            <div class=" h-[70vh] w-screen flex justify-center items-center font-semibold text-xl">No chatbots Uploaded</div>
        @else
            @foreach ($chatbots as $chatbot)
                <div class="cursor-pointer rounded-xl bg-white p-3 shadow-lg hover:shadow-xl">
                    <div class="relative flex items-end overflow-hidden rounded-xl">
                        <img src="{{ $chatbot->image_url }}" alt="wallpaper" class="h-[500px] w-full" />

                        <div class="absolute bottom-3 left-3 inline-flex items-center rounded-lg bg-white p-2 shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>

                            <span
                                class="ml-1 text-sm text-slate-400">{{ number_format($avgRatings[$chatbot->id] ?? 0, 1) ?? 'No rating' }}</span>
                        </div>
                    </div>

                    <div class="mt-1 p-2">
                        <h2 class="text-slate-700">{{ $chatbot->chatbot_name }}</h2>
                        <p class="mt-1 text-sm text-slate-400">{{ $chatbot->chatbot_description }}</p>

                        <div class="mt-3 flex items-end justify-between">
                            <div class="card-actions w-full justify-end">
                                @auth
                                    <a href="{{ route('chat', 1) }}">
                                        <button class="btn btn-primary">Test Chatbot</button>
                                    </a>
                                @endauth

                                @guest
                                    <a href="{{ route('login') }}">
                                        <button class="btn btn-primary">Login to Test</button>
                                    </a>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
