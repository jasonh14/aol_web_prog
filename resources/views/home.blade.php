@extends('layouts.app')

@section('content')
<div class="">
    <div class=" bg-gradient-to-t from-cyan-400 to-cyan-100">
        <div class="w-full flex justify-center items-center h-[500px] text-2xl text-white font-bold">
            <div class="bg-red flex-1 flex justify-center items-center ">
                Ini Slogan Paling Oke Anjay
            </div>
            <div class="bg-blue flex-1 flex justify-center items-center ">
                Ini Gambar
            </div>
        </div>
    </div>
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
