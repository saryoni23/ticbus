@extends('halaman_depan.layout.index')

@section('content')

<div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
    <div class="hidden sm:mb-8 sm:flex sm:justify-center">
        <div
            class="relative rounded-full px-3 py-1 text-sm leading-6 text-gray-600 ring-1 dark:text-white ring-gray-900/10 hover:ring-gray-900/20">
            Lihat Tiket Sekarang !
            <a href="/tiket" class="font-semibold text-indigo-600"><span class="absolute inset-0"
                    aria-hidden="true"></span>Lihat <span aria-hidden="true">&rarr;</span></a>
        </div>
    </div>
    <div class="text-center">
        <h1 class="text-4xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-6xl">
            Selamat Datang Di Web Kami
        </h1>
        <p class="mt-6 text-lg leading-8 text-gray-600">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga
            laborum, impedit voluptate beatae, cupiditate temporibus velit
            soluta optio nam magni porro explicabo earum, possimus nisi
            placeat laboriosam consequatur. Perspiciatis, accusantium..
        </p>
        <div class="mt-10 flex items-center justify-center gap-x-6">
            <a href="/tiket" class="text-sm font-semibold leading-6 text-gray-900 dark:text-white">Lihat Tiket Lain
                <span aria-hidden="true">→</span></a>
        </div>
    </div>
</div>

@endsection
