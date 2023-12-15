@extends('layouts.app')
@section('content')
    <div>
        <div class="flex justify-center items-center p-4 gap-4">
            <div class="avatar online">
                <div class="rounded-full overflow-hidden h-32 w-32">

                    @if ($user->image_url)
                        <img src="{{ $user->image_url }}" />
                    @else
                        <img src="{{ asset('images/guest.png') }}" />
                    @endif
                </div>
            </div>
            <div class="flex flex-col gap-2">
                <h1 class="font-semibold text-2xl">Welcome Back {{ $user->display_name }}!</h1>
                <div class="flex gap-2">
                    <a href="{{ route('edit') }}">
                        <button class="btn btn-primary bg-cyan-400 hover:bg-cyan-500 border border-cyan-400">Edit
                            Profile</button>
                    </a>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        <button class="btn btn-primary bg-cyan-400 hover:bg-cyan-500 border border-cyan-400">Logout</button>
                    </a>
                </div>

            </div>
        </div>
        <div>
            <div>

            </div>
            <div></div>
        </div>
    </div>
    <div class="p-4 flex justify-center items-start gap-6">
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <p class="font-semibold text-xl py-2">Your Published Chatbots</p>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->

                    @foreach ($chatbots as $chatbot)
                        <tr>

                            <td>
                                <div class="flex items-center gap-3">
                                    <div class="avatar">
                                        <div class="mask mask-squircle w-12 h-12">
                                            <img src="{{ $chatbot->image_url }}" alt="Avatar Tailwind CSS Component" />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-bold">{{ $chatbot->chatbot_name }}</div>

                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ $chatbot->chatbot_description }}

                            </td>

                            <th>
                                <div class="card-actions justify-end">
                                    <a href="{{ route('chat', $chatbot->id) }}">
                                        <button class="btn btn-primary">Test</button>
                                    </a>
                                </div>
                            </th>
                        </tr>
                    @endforeach

                </tbody>


            </table>
        </div>
        <div class="divider lg:divider-horizontal"></div>
        <div class="overflow-x-auto overflow-y-scroll h-96">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <p class="font-semibold text-xl py-2">Your Reviews</p>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    @foreach ($comments as $comment)
                        <tr>
                            <td>
                                <div class="flex items-center gap-3">
                                    <div class="avatar">
                                        <div class="mask mask-squircle w-12 h-12">
                                            <img src="{{ $comment->chatbot->image_url }}"
                                                alt="Avatar Tailwind CSS Component" />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-bold">{{ $comment->chatbot->chatbot_name }}</div>

                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ $comment->content }}

                            </td>

                        </tr>
                    @endforeach

                </tbody>


            </table>
        </div>
    </div>
@endsection
