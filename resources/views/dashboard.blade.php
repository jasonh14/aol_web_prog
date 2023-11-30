@extends('layouts.app')
@section('content')
    <div>
        <div class="flex justify-center items-center p-4 gap-4">
            <div class="avatar online">
                <div class="w-24 rounded-full">
                    <img src="https://source.unsplash.com/user/wsanter" />
                </div>
            </div>
            <div class="flex flex-col gap-2">
                <h1 class="font-semibold text-2xl">Welcome Back {{ $user->display_name }}!</h1>
                <div class="flex gap-2">

                    <button class="btn btn-primary bg-cyan-400 hover:bg-cyan-500 border border-cyan-400">Edit
                        Profile</button>
                    <button class="btn btn-primary bg-cyan-400 hover:bg-cyan-500 border border-cyan-400">Sign Out</button>
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
                                            <img src="https://source.unsplash.com/user/wsanter"
                                                alt="Avatar Tailwind CSS Component" />
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
                                    <a href="{{ route('chat', 1) }}">
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
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <p class="font-semibold text-xl py-2">Your Reviews</p>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <tr>
                        <td>
                            <div class="flex items-center gap-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle w-12 h-12">
                                        <img src="https://source.unsplash.com/user/wsanter"
                                            alt="Avatar Tailwind CSS Component" />
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold">Hart Hagerty</div>
                                    <div class="text-sm opacity-50">United States</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            Zemlak, Daniel and Leannon
                            <br />
                            <span class="badge badge-ghost badge-sm">Desktop Support Technician</span>
                        </td>
                        <td>Purple</td>
                        <th>
                            <button class="btn btn-ghost btn-xs">details</button>
                        </th>
                    </tr>
                    <!-- row 2 -->
                    <tr>
                        <td>
                            <div class="flex items-center gap-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle w-12 h-12">
                                        <img src="https://source.unsplash.com/user/wsanter"
                                            alt="Avatar Tailwind CSS Component" />
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold">Brice Swyre</div>
                                    <div class="text-sm opacity-50">China</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            Carroll Group
                            <br />
                            <span class="badge badge-ghost badge-sm">Tax Accountant</span>
                        </td>
                        <td>Red</td>
                        <th>
                            <button class="btn btn-ghost btn-xs">details</button>
                        </th>
                    </tr>
                    <!-- row 3 -->
                    <tr>
                        <td>
                            <div class="flex items-center gap-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle w-12 h-12">
                                        <img src="https://source.unsplash.com/user/wsanter"
                                            alt="Avatar Tailwind CSS Component" />
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold">Marjy Ferencz</div>
                                    <div class="text-sm opacity-50">Russia</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            Rowe-Schoen
                            <br />
                            <span class="badge badge-ghost badge-sm">Office Assistant I</span>
                        </td>
                        <td>Crimson</td>
                        <th>
                            <button class="btn btn-ghost btn-xs">details</button>
                        </th>
                    </tr>
                    <!-- row 4 -->
                    <tr>
                        <td>
                            <div class="flex items-center gap-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle w-12 h-12">
                                        <img src="https://source.unsplash.com/user/wsanter"
                                            alt="Avatar Tailwind CSS Component" />
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold">Yancy Tear</div>
                                    <div class="text-sm opacity-50">Brazil</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            Wyman-Ledner
                            <br />
                            <span class="badge badge-ghost badge-sm">Community Outreach Specialist</span>
                        </td>
                        <td>Indigo</td>
                        <th>
                            <button class="btn btn-ghost btn-xs">details</button>
                        </th>
                    </tr>
                </tbody>


            </table>
        </div>
    </div>
@endsection
