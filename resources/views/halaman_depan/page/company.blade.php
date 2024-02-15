@extends('halaman_depan.layout.index')

@section('content')

<div class="mx-auto max-w-2xl py-12 sm:py-12 lg:py-56 space-y-20">
    <div id="indicators-carousel" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                <img src="{{
                                        asset('picture/bus/2022-05-31.jpg')
                                    }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..." />
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('picture/bus/unnamed.jpg') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..." />
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{
                                        asset('picture/bus/2020-01-28 (2).jpg')
                                    }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..." />
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{
                                        asset('picture/bus/2020-01-28 (1).jpg')
                                    }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..." />
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{
                                        asset('picture/bus/2023-10-15.jpg')
                                    }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..." />
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
    @foreach ($data as $data)
    <div class="text-center">
        <h1 class="text-4xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-6xl">
            {{ $data->nama_perusahaan }}
        </h1>
        <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
            {!! strip_tags($data->visi, '<strong><em><span>
                        <div>') !!}
        </h1>
        <div id="tambahstyle">
            <p class="lead  ">
                {!! $data->isi !!}
            </p>
        </div>
    </div>
    @endforeach
</div>


@endsection

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Temukan elemen dengan id 'tambahstyle'
        var element = document.getElementById('tambahstyle');

        // Periksa jika elemen ditemukan
        if (element) {
            // Tambahkan class yang diinginkan
            element.classList.add('text-gray-900', 'dark:text-white');
        }
    });

</script>