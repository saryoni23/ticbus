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
    <div class="text-center">
        <h1 class="text-4xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-6xl">
            PT. Moria Unedo Jaya
        </h1>
        <p class="mt-6 text-lg leading-8 text-gray-600 dark:text-gray-300">
            Perusahaan yang bergerak dibidang jasa transportasi
            di kota Medan. Kini bus moria telah berbentuk
            perusahaan dengan nama PT. Moria Unedo Jaya.
        </p>
        <p class="font-medium text-justify text-secondary mb-10 leading-relaxed dark:text-slate-300">
            Secara umum, trayek bus moria adalah dari Medan ke
            daerah Toba sekitarnya seperti Sipahutar,
            Pangaribuan, Garoga, Sigotom, Lumbansinaga, dan
            Simangimbar. Tarif ongkos bus moria dari Medan ke
            Pangaribuan adalah Rp. 100.000. Tarif ongkos
            bervariasi tergantung daerah tujuan Anda. Mayoritas
            bus-bus moria telah terpasang AC. Sehingga membuat
            penumpang merasa sejuk berada didalam bus sepanjang
            perjalanan. Jika anda mau beli tiket Moria dapat
            pulang kampung bersama bus Moria, silahkan datang
            langsung ke alamat Loket Moria yang beralamat di:
            Jl. Sisingamangaraja KM 7,5 No. 61B, Harjosari II,
            Kec. Medan Amplas, Kota Medan. Untuk info lebih
            lanjut silahkan telp nomor berikut: 0811-6323-262.
            Loket bus Moria di Medan keberadaanya cukup besar.
            Dilengkapi toilet yang cukup baik, parkir luas dan
            gratis serta ada tempat makan/minum. Pada umumnya,
            fasilitas gantungan tas, tong sampah sepertinya
            harus ditambah di kamar mandi. Banyak para taksi
            online dan ojek online yang mendapat orderan di
            loket Moria medan. Para supir bus moria sudah
            berpengalaman dalam mengantar penumpang dan barang
            sampai ketujuan. Selain bus penumpang, bus moria
            juga melayani pengiriman paket/barang dengan ongkos
            yang relatif terjangkau dan aman. Dari Medan ke
            daerah Toba, akan beristirahat di loket Siantar.
            Disanalah penumpang bisa makan siang dan
            beristirahat sejenak. Jadwal keberangkatan bus Moria
            Medan ke toba mulai dari jam 7.00 pagi hingga jam
            11.00 Wib. Untuk keberangkatan sore dan malam hari
            tersedia jam keberangkatan mulai jam 16.00 hingga
            jam 20.00Wib.
        </p>
    </div>
</div>

@endsection
