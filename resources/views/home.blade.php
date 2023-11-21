@extends('layouts.app')

@section('content')
<div class="">
    <div class="hero min-h-screen" style="background-image: url({{asset("images/bg.jpg")}});">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-center text-neutral-content">
          <div class="max-w-md">
            <h1 class="mb-5 text-5xl font-bold text-white">Chaturate: Publish. Explore. Connect.</h1>
            <p class="mb-5 text-white">Engage, Explore, Experience. Welcome to Chaturate – where conversations come alive. Publish your chatbots, explore others, and be part of the AI dialogue revolution!</p>
            <a href="{{route("register")}}">
                <button class="bg-gradient-to-r px-4 py-2 text-white rounded-xl from-cyan-600 to-cyan-500">Get Started</button>
            </a>
          </div>
        </div>
      </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
        <div class="cursor-pointer rounded-xl bg-white p-3 shadow-lg hover:shadow-xl">
          <div class="relative flex items-end overflow-hidden rounded-xl">
            <img src="https://thumbnails.production.thenounproject.com/gA9eZOvsBYSHrMumgrslmRGoBto=/fit-in/1000x1000/photos.production.thenounproject.com/photos/BCBA88B6-5B41-4B50-A786-E60CAA0ECDA3.jpg" alt="wallpaper" />

            <div class="absolute bottom-3 left-3 inline-flex items-center rounded-lg bg-white p-2 shadow-md">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>

              <span class="ml-1 text-sm text-slate-400">4.9</span>
            </div>
          </div>

          <div class="mt-1 p-2">
            <h2 class="text-slate-700">The Malta Hotel</h2>
            <p class="mt-1 text-sm text-slate-400">Italy, Europe</p>

            <div class="mt-3 flex items-end justify-between">
              <p>
                <span class="text-lg font-bold text-cyan-500">$1,421</span>
                <span class="text-sm text-slate-400">/night</span>
              </p>

              <div class="group inline-flex rounded-xl bg-cyan-100 p-2 hover:bg-cyan-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-500 group-hover:text-cyan-500" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                </svg>
              </div>
            </div>
          </div>
        </div>

        <div class="cursor-pointer rounded-xl bg-white p-3 shadow-lg hover:shadow-xl">
          <div class="relative flex items-end overflow-hidden rounded-xl">
            <img src="https://thumbnails.production.thenounproject.com/gA9eZOvsBYSHrMumgrslmRGoBto=/fit-in/1000x1000/photos.production.thenounproject.com/photos/BCBA88B6-5B41-4B50-A786-E60CAA0ECDA3.jpg" alt="wallpaper" />

            <div class="absolute bottom-3 left-3 inline-flex items-center rounded-lg bg-white p-2 shadow-md">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>

              <span class="ml-1 text-sm text-slate-400">4.9</span>
            </div>
          </div>

          <div class="mt-1 p-2">
            <h2 class="text-slate-700">The Malta Hotel</h2>
            <p class="mt-1 text-sm text-slate-400">Italy, Europe</p>

            <div class="mt-3 flex items-end justify-between">
              <p>
                <span class="text-lg font-bold text-cyan-500">$1,421</span>
                <span class="text-sm text-slate-400">/night</span>
              </p>

              <div class="group inline-flex rounded-xl bg-cyan-100 p-2 hover:bg-cyan-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-500 group-hover:text-cyan-500" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                </svg>
              </div>
            </div>
          </div>
        </div>

        <div class="cursor-pointer rounded-xl bg-white p-3 shadow-lg hover:shadow-xl">
          <div class="relative flex items-end overflow-hidden rounded-xl">
            <img src="https://thumbnails.production.thenounproject.com/gA9eZOvsBYSHrMumgrslmRGoBto=/fit-in/1000x1000/photos.production.thenounproject.com/photos/BCBA88B6-5B41-4B50-A786-E60CAA0ECDA3.jpg" alt="wallpaper" />

            <div class="absolute bottom-3 left-3 inline-flex items-center rounded-lg bg-white p-2 shadow-md">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>

              <span class="ml-1 text-sm text-slate-400">4.9</span>
            </div>
          </div>

          <div class="mt-1 p-2">
            <h2 class="text-slate-700">The Malta Hotel</h2>
            <p class="mt-1 text-sm text-slate-400">Italy, Europe</p>

            <div class="mt-3 flex items-end justify-between">
              <p>
                <span class="text-lg font-bold text-cyan-500">$1,421</span>
                <span class="text-sm text-slate-400">/night</span>
              </p>

              <div class="group inline-flex rounded-xl bg-cyan-100 p-2 hover:bg-cyan-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-500 group-hover:text-cyan-500" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>

    <div class="relative font-inter antialiased">

        <main class="relative min-h-screen flex flex-col justify-center bg-slate-50 overflow-hidden">
            <div class="w-full max-w-5xl mx-auto px-4 md:px-6 py-24">

                <!-- Animated Number Counter -->
                <section class="grid gap-12 md:grid-cols-3 md:gap-16">
                    <!-- Block #1 -->
                    <article>
                        <div class="w-14 h-14 rounded shadow-md bg-white flex justify-center items-center rotate-3 mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="31" height="20">
                                <defs>
                                    <linearGradient id="icon1-a" x1="50%" x2="50%" y1="0%" y2="100%">
                                        <stop offset="0%" stop-color="#a0ebff" />
                                        <stop offset="100%" stop-color="#0891b2" />
                                    </linearGradient>
                                    <linearGradient id="icon1-b" x1="50%" x2="50%" y1="0%" y2="100%">
                                        <stop offset="0%" stop-color="#a0ebff" />
                                        <stop offset="100%" stop-color="#0891b2" />
                                    </linearGradient>
                                </defs>
                                <g fill="none" fill-rule="nonzero">
                                    <path fill="url(#icon1-a)" d="M20.625 0H9.375a9.375 9.375 0 0 0 0 18.75h11.25a9.375 9.375 0 0 0 0-18.75Z" transform="translate(.885 .885)" />
                                    <path fill="url(#icon1-b)" d="M9.375 17.5A8.125 8.125 0 0 1 1.25 9.375 8.125 8.125 0 0 1 9.375 1.25 8.125 8.125 0 0 1 17.5 9.375 8.125 8.125 0 0 1 9.375 17.5Z" transform="translate(.885 .885)" />
                                </g>
                            </svg>
                        </div>
                        <h2>
                            <span class="flex tabular-nums text-slate-900 text-5xl font-extrabold mb-2 transition-[_--num] duration-[3s] ease-out [counter-set:_num_var(--num)] supports-[counter-set]:before:content-[counter(num)]" x-data="{ shown: false }" x-intersect="shown = true" :class="shown && '[--num:40]'">
                                <span class="supports-[counter-set]:sr-only">40</span>K+
                            </span>
                            <span class="inline-flex font-semibold bg-clip-text text-transparent bg-gradient-to-r from-cyan-600 to-cyan-300 mb-2">Variations</span>
                        </h2>
                        <p class="text-sm text-slate-500">Many desktop publishing packages and web page editors now use Pinky as their default model text.</p>
                    </article>
                    <!-- Block #2 -->
                    <article>
                        <div class="w-14 h-14 rounded shadow-md bg-white flex justify-center items-center -rotate-3 mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="19">
                                <defs>
                                    <linearGradient id="icon2-a" x1="50%" x2="50%" y1="0%" y2="100%">
                                        <stop offset="0%" stop-color="#a0ebff" />
                                        <stop offset="100%" stop-color="#0891b2" />
                                    </linearGradient>
                                    <linearGradient id="icon2-b" x1="50%" x2="50%" y1="0%" y2="100%">
                                        <stop offset="0%" stop-color="#a0ebff" />
                                        <stop offset="100%" stop-color="#0891b2" />
                                    </linearGradient>
                                </defs>
                                <g fill="none" fill-rule="nonzero">
                                    <path fill="url(#icon2-a)" d="M5.5 0a5.5 5.5 0 0 0 0 11c.159 0 .314-.01.469-.024a15.896 15.896 0 0 1-2.393 6.759A.5.5 0 0 0 4 18.5h1a.5.5 0 0 0 .362-.155C7.934 15.64 11 11.215 11 5.5A5.506 5.506 0 0 0 5.5 0Z" />
                                    <path fill="url(#icon2-b)" d="M18.5 0a5.5 5.5 0 0 0 0 11c.159 0 .314-.01.469-.024a15.896 15.896 0 0 1-2.393 6.759.5.5 0 0 0 .424.765h1a.5.5 0 0 0 .363-.155C20.934 15.64 24 11.215 24 5.5A5.506 5.506 0 0 0 18.5 0Z" />
                                </g>
                            </svg>
                        </div>
                        <h2>
                            <span class="flex tabular-nums text-slate-900 text-5xl font-extrabold mb-2 transition-[_--num] duration-[3s] ease-out [counter-set:_num_var(--num)] " x-data="{ shown: false }" x-intersect="shown = true" :class="shown && '[--num:70]'">
                                <span class="">70</span>K+
                            </span>
                            <span class="inline-flex font-semibold bg-clip-text text-transparent bg-gradient-to-r from-cyan-600 to-cyan-300 mb-2">Lessons</span>
                        </h2>
                        <p class="text-sm text-slate-500">Many desktop publishing packages and web page editors now use Pinky as their default model text.</p>
                    </article>
                    <!-- Block #3 -->
                    <article>
                        <div class="w-14 h-14 rounded shadow-md bg-white flex justify-center items-center rotate-3 mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26">
                                <defs>
                                    <radialGradient id="icon3-a" cx="68.15%" cy="27.232%" r="67.641%" fx="68.15%" fy="27.232%">
                                        <stop offset="0%" stop-color="#0891b2" />
                                        <stop offset="100%" stop-color="#a0ebff" />
                                    </radialGradient>
                                </defs>
                                <g fill="none" fill-rule="nonzero">
                                    <circle cx="13" cy="13" r="13" fill="url(#icon3-a)" />
                                    <path fill="#00728a" fill-opacity=".56" d="M0 13a12.966 12.966 0 0 0 4.39 9.737l1.15-1.722s.82-.237.997-.555c.554-.997-.43-2.733-.43-2.733a5.637 5.637 0 0 0-.198-1.23c-.148-.369-1.182-.874-1.182-.874S3.73 13.998 3.73 13a1.487 1.487 0 0 1 1.404-1.55 2.424 2.424 0 0 0 1.588-1.146s1.256-.332 1.551-.847c.295-.515-.332-2.36-.332-2.36a3.086 3.086 0 0 0-.012-1.481 2.8 2.8 0 0 0-.93-1.12 6.143 6.143 0 0 0-1.447-2.148A12.981 12.981 0 0 0 0 13ZM13 0c-.35 0-.696.018-1.04.045-.112.35-.695 1.248-.548 1.653.147.406 1.353.783 1.353.783s-.32 1.25.235 1.692c.554.443 1.44-.148 1.773-.037.331.111.258 2.29.258 2.29s1.07 1.181 2.124 1.33c1.053.147 2.656-1.64 2.656-1.64a21.131 21.131 0 0 0 3.448-1.102A12.974 12.974 0 0 0 13 0Z" />
                                    <path fill="#00728a" fill-opacity=".4" d="M21.398 13.848c.296.702-.555 2.494-1.256 2.843a4.76 4.76 0 0 0-1.82 1.452c-.259.406-.598 2.082-1.447 2.415-.85.332-2.863 2.228-3.934 1.932-1.071-.296-1.071-2.842-.333-3.988.441-.683-.074-2.179-.113-2.695-.039-.517-1.586-1.478-1.586-1.994 0-.813 1.772-2.955 1.772-2.955s1.453-.48 1.896-.37c.448.164.877.374 1.28.628.782.058 1.552.22 2.29.48l.848.775s2.107.777 2.403 1.477Z" />
                                </g>
                            </svg>

                        </div>
                        <h2>
                            <span class="flex tabular-nums text-slate-900 text-5xl font-extrabold mb-2 transition-[_--num] duration-[3s] ease-out [counter-set:_num_var(--num)] supports-[counter-set]:before:content-[counter(num)]" x-data="{ shown: false }" x-intersect="shown = true" :class="shown && '[--num:149]'">
                                <span class="supports-[counter-set]:sr-only">149</span>+
                            </span>
                            <span class="inline-flex font-semibold bg-clip-text text-transparent bg-gradient-to-r from-cyan-600 to-cyan-300 mb-2">Workshops</span>
                        </h2>
                        <p class="text-sm text-slate-500">Many desktop publishing packages and web page editors now use Pinky as their default model text.</p>
                    </article>
                </section>
                <!-- End: Animated Number Counter -->

            </div>

        </main>

        <!-- Page footer -->
        <footer class="absolute left-6 right-6 md:left-12 md:right-auto bottom-4 md:bottom-8 text-center md:text-left">
            <a class="text-xs text-slate-500 hover:underline" href="https://cruip.com">&copy;Chaturate</a>
        </footer>

        <!-- Banner with links -->
        <div class="fixed bottom-0 right-0 w-full md:bottom-6 md:right-12 md:w-auto z-50" :class="bannerOpen ? '' : 'hidden'" x-data="{ bannerOpen: true }">
            <div class="bg-slate-800 text-sm p-3 md:rounded shadow flex justify-between">
                <div class="text-slate-500 inline-flex">
                    <a class="font-medium hover:underline text-slate-300" href="https://cruip.com/how-to-make-an-animated-number-counter-with-tailwind-css/" target="_blank">
                        Read Tutorial
                    </a>
                    <span class="italic px-1.5">or</span>
                    <a class="font-medium hover:underline text-indigo-500 flex items-center" href="https://github.com/cruip/cruip-tutorials/blob/main/animated-number-counter/index.html" target="_blank" rel="noreferrer">
                        <span>Download</span>
                        <svg class="fill-indigo-400 ml-1" xmlns="http://www.w3.org/2000/svg" width="9" height="9">
                            <path d="m1.649 8.514-.91-.915 5.514-5.523H2.027l.01-1.258h6.388v6.394H7.158l.01-4.226z" />
                        </svg>
                    </a>
                </div>
                <button class="text-slate-500 hover:text-slate-400 pl-2 ml-3 border-l border-slate-700" @click="bannerOpen = false">
                    <span class="supports-[counter-set]:sr-only">Close</span>
                    <svg class="w-4 h-4 shrink-0 fill-current" viewBox="0 0 16 16">
                        <path d="M12.72 3.293a1 1 0 00-1.415 0L8.012 6.586 4.72 3.293a1 1 0 00-1.414 1.414L6.598 8l-3.293 3.293a1 1 0 101.414 1.414l3.293-3.293 3.293 3.293a1 1 0 001.414-1.414L9.426 8l3.293-3.293a1 1 0 000-1.414z" />
                    </svg>
                </button>
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
