@extends('layouts.app')
@section('content')
    <div class="flex w-full flex-wrap">
        @foreach ($chatbots as $chatbot)
            <div class="w-1/4 mb-4">

                <div class="card bg-base-100 shadow-xl mx-4">
                    <figure><img src="{{ $chatbot->image_url }}" alt="Shoes" /></figure>
                    <div class="card-body text-white">
                        <h2 class="card-title">{{ $chatbot->chatbot_name }}</h2>
                        <p>{{ $chatbot->chatbot_description }}</p>
                        <div class="card-actions justify-end">
                            <a href="{{ route('chat', $chatbot->id) }}">
                                <button class="btn btn-primary">Test</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
