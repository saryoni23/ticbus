<!doctype html>
<html lang="en">

<head>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <link rel="icon" href="{{ asset('picture/logo/logo1.png') }}" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>TicBus</title>
</head>

<body>
    <div class="bg-white dark:bg-gray-900">
        <!-- Navbar -->
        <header x-data="{openSidebar:false}" class="absolute inset-x-0 top-0 z-50 mx-auto max-w-screen-xl">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="/" class="flex items-center">
                        <img class="h-8 mr-3" src="{{ asset('picture/logo/logo1.png') }}" alt="Logo" />
                        <span
                            class="self-center text-2xl font-semibold whitespace-nowrap text-gray-900 dark:text-white">Moria</span>
                    </a>
                </div>
                <div class="flex lg:hidden">
                    <button @click="openSidebar=true" type="button"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="/" class="text-sm font-semibold leading-6 text-gray-900 dark:text-white">Home</a>
                    <a href="/blog" class="text-sm font-semibold leading-6 text-gray-900 dark:text-white">Blog</a>
                    <a href="/tiket" class="text-sm font-semibold leading-6 text-gray-900 dark:text-white">Tiket</a>
                    <a href="/company" class="text-sm font-semibold leading-6 text-gray-900 dark:text-white">Company</a>
                </div>

                <div class="hidden lg:flex lg:flex-1 lg:justify-end space-x-4">
                    <button id="theme-toggle" type="button"
                        class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <a href="{{ route('auth') }}" class="text-sm font-semibold leading-6 text-gray-900 dark:text-white">
                        @if (Auth::check()) Hello
                        {{ Auth::user()->fullname }}
                        @else Login @endif
                        <span aria-hidden="true">&rarr;</span></a>
                </div>
            </nav>
            <!-- Mobile menu, show/hide based on menu open state. -->
            <div x-show="openSidebar" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg" class="lg:hidden" role="dialog"
                aria-modal="true">
                <!-- Background backdrop, show/hide based on slide-over state. -->
                <div class="fixed inset-0 z-50"></div>
                <div
                    class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white dark:bg-gray-900 px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                    <div class="flex items-center justify-between">
                        <a href="/" class="flex items-center">
                            <img class="h-8 mr-3" src="{{ asset('picture/logo/logo1.png') }}" alt="Logo" />

                            <span
                                class="self-center text-2xl font-semibold whitespace-nowrap text-gray-900 dark:text-white">Moria</span>
                        </a>
                        <button @click="openSidebar=false" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                            <span class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-gray-500/10">
                            <div class="space-y-2 py-6">
                                <a href="/"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 dark:text-white hover:bg-gray-50">Home</a>
                                <a href="/blog"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 dark:text-white hover:bg-gray-50">Blog</a>
                                <a href="/tiket"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 dark:text-white hover:bg-gray-50">Tiket</a>
                                <a href="/company"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 dark:text-white hover:bg-gray-50">Company</a>
                            </div>
                            <div class="py-6">
                                <a href="{{ route('auth') }}"
                                    class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 dark:text-white hover:bg-gray-50">
                                    @if (Auth::check()) Hello
                                    {{ Auth::user()->fullname }} @else Login
                                    @endif</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
   
        <!-- Hero Section / Body -->
        <div class="relative isolate px-6 pt-14 lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                aria-hidden="true">
                <!-- bg warna -->
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#2ccb59] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="
                            clip-path: polygon(
                                74.1% 44.1%,
                                100% 61.6%,
                                97.5% 26.9%,
                                85.5% 0.1%,
                                80.7% 2%,
                                72.5% 32.5%,
                                60.2% 62.4%,
                                52.4% 68.1%,
                                47.5% 58.3%,
                                45.2% 34.5%,
                                27.5% 76.7%,
                                0.1% 64.9%,
                                17.9% 100%,
                                27.6% 76.8%,
                                76.1% 97.7%,
                                74.1% 44.1%
                            );
                        "></div>
            </div>
            <!-- end bg warna -->

            <div class="mx-auto max-w-2xl py-12 sm:py-12 lg:py-56 space-y-20">
                <div id="indicators-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                            <img src="{{
                                        asset('picture/bus/2022-05-31.jpg')
                                    }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="..." />
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('picture/bus/unnamed.jpg') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="..." />
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{
                                        asset('picture/bus/2020-01-28 (2).jpg')
                                    }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="..." />
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{
                                        asset('picture/bus/2020-01-28 (1).jpg')
                                    }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="..." />
                        </div>
                        <!-- Item 5 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{
                                        asset('picture/bus/2023-10-15.jpg')
                                    }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="..." />
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
                            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
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
            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#61d066] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="
                            clip-path: polygon(
                                74.1% 44.1%,
                                100% 61.6%,
                                97.5% 26.9%,
                                85.5% 0.1%,
                                80.7% 2%,
                                72.5% 32.5%,
                                60.2% 62.4%,
                                52.4% 68.1%,
                                47.5% 58.3%,
                                45.2% 34.5%,
                                27.5% 76.7%,
                                0.1% 64.9%,
                                17.9% 100%,
                                27.6% 76.8%,
                                76.1% 97.7%,
                                74.1% 44.1%
                            );
                        "></div>
            </div>
        </div>
        <!-- end Hero section/ body -->
    </div>

    <!-- Footer -->
    <footer class="bg-gray-50 dark:bg-gray-800 antialiased">
        <div class="p-4 py-6 mx-auto max-w-screen-xl md:p-8 lg:p-10">
            <div class="text-center">
                <a href="#"
                    class="flex justify-center items-center mb-5 text-2xl font-semibold text-gray-900 dark:text-white">
                    <img class="h-8 mr-3" src="{{ asset('picture/logo/logo1.png') }}" alt="Logo" />
                    Moria
                </a>
                <span class="block text-sm text-center text-gray-500 dark:text-gray-400">© {{ date("Y") }}
                    <a href="#" class="hover:underline">Saryoni™</a>| Pt.
                    Moria Unedo Jaya.
                </span>
                <ul class="flex justify-center mt-5 space-x-5">
                    <li>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                            <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 8 19">
                                <path fill-rule="evenodd"
                                    d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path fill="currentColor"
                                    d="M12.186 8.672 18.743.947h-2.927l-5.005 5.9-4.44-5.9H0l7.434 9.876-6.986 8.23h2.927l5.434-6.4 4.82 6.4H20L12.186 8.672Zm-2.267 2.671L8.544 9.515 3.2 2.42h2.2l4.312 5.719 1.375 1.828 5.731 7.613h-2.2l-4.699-6.237Z" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</body>

</html>
