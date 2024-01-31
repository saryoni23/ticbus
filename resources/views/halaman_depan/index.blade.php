<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="{{asset('picture/logo/logo1.png')}}">
    <title>TicBus</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-200 dark:bg-abutua">
    <header class="bg-gray-200 dark:bg-black">
        <div class="container">
            <nav
                class="bg-white dark:bg-gray-900 fixed w-full z-40 top-0 left-0 border-b border-gray-200 dark:border-gray-600 bg-opacity-80 dark:bg-opacity-80 bg-clip-padding blur-backdrop-fillter">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                    <a href="#" class="flex items-center">
                        <img class="h-8 mr-3" src="{{asset('picture/logo/logo1.png')}}" alt="Logo">
                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white ">Moria</span>
                    </a>

                    <div class="flex md:order-2">
                        <a id='userlogin' href="{{ route('auth') }}" type="button"
                            class="mr-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800  md:mr-6">
                            @if (Auth::check())
                            Hello {{ Auth::user()->fullname }}
                            @else
                            Login
                            @endif
                        </a>
                        <button id="theme-toggle" type="button"
                            class="mr-4 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1 md:mr-6">
                            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z">
                                </path>
                            </svg>
                            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                    fill-rule="evenodd" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <button data-collapse-toggle="navbar-sticky" type="button"
                            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            aria-controls="navbar-sticky" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                            </svg>
                        </button>

                    </div>
                    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
                        id="navbar-sticky">
                        <ul
                            class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                            <li>
                                <a href="#home"
                                    class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                                    aria-current="page">Home</a>
                            </li>
                            <li>
                                <a href="#about"
                                    class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                            </li>
                            <li>
                                <button
                                    class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 data-drawer-target="
                                    drawer-contact" data-drawer-show="drawer-contact"
                                    aria-controls="drawer-contact">Contact</button>
                            </li>
                            <li>

                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!--  Hero Section Start -->
    <section id="home" class="bg-gray-200 pt-20 dark:bg-abutua">
        <div class="container px-4 mx-auto mb-8 lg:py-16">
            <div id="indicators-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                        <img src="{{ asset('picture/bus/2022-05-31.jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('picture/bus/unnamed.jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('picture/bus/2020-01-28 (2).jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 4 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('picture/bus/2020-01-28 (1).jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 5 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('picture/bus/2023-10-15.jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
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
                        <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>


        {{-- <div class="container px-4 mx-auto lg:py-16 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8flex "> --}}


        {{-- <div class="flex-col justify-items-end"> --}}

        <!-- <div class="container mx-auto mt-10 p-6">
                        <h2 class="text-2xl font-bold mb-4 dark:text-white">Pilih Tujuan dan Tiket Anda</h2> -->

        <!-- Form untuk memilih tujuan dan tiket -->
        {{-- <form action="" method="" class="mb-4"> --}}

        {{-- <div class="grid grid-cols-2 gap-4"> --}}

        <!-- Tiket lainnya di sini -->
        {{-- </div> --}}
        {{-- </form> --}}
        <!-- <div class="flex justify-center mt-4">
                            <button id="switchButton"
                                class="flex items-center bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M10.335 6.514 6.91 1.464a1.122 1.122 0 0 0-1.818 0l-3.426 5.05a.988.988 0 0 0 .91 1.511h6.851a.988.988 0 0 0 .91-1.511Zm-8.67 6.972 3.426 5.05a1.121 1.121 0 0 0 1.818 0l3.426-5.05a.988.988 0 0 0-.909-1.511H2.574a.987.987 0 0 0-.909 1.511Z" />
                                </svg>
                                Tukar Tujuan
                            </button>
                            <button id="resetButton"
                                class="flex items-center bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="w-6 h-6 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Reset Tujuan
                            </button>
                        </div> -->
        {{-- </div>   --}}
        {{-- </div>        --}}
        {{-- </div>     --}}
    </section>
    <!--  Hero Section End -->

    <!--  Hero Section Start -->
    <section id="about" class="pt-12 dark:text-neutral-100 ">
        <div
            class="container px-4 mx-auto lg:py-16 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg  md:p-12 mb-8">
            <div class="flex flex-wrap">
                <div class="w-full self-center px-4 lg:w-1/2">
                    <h1 class="text-base font-semibold text-primary md:text-xl lg:text-2xl">
                        <span class="block font-bold text-dark text-4xl mt-1 lg:text-5xl ">PT. Moria Unedo Jaya</span>
                    </h1>
                    <h2 class="font-medium text-slate-600 text-lg mb-5 lg:text-2xl dark:text-neutral-100">Transportasi
                    </h2>
                    <p class="font-medium text-justify text-secondary mb-10 leading-relaxed ">Bus moria adalah
                        perusahaan yang bergerak dibidang jasa transportasi di kota Medan. Kini bus moria telah
                        berbentuk perusahaan dengan nama PT. Moria Unedo Jaya.
                    </p>
                    <p class="font-medium text-justify text-secondary mb-10 leading-relaxed">
                        Secara umum, trayek bus moria adalah dari Medan ke daerah Toba sekitarnya seperti Sipahutar,
                        Pangaribuan, Garoga, Sigotom, Lumbansinaga, dan Simangimbar.
                        Tarif ongkos bus moria dari Medan ke Pangaribuan adalah Rp. 100.000. Tarif ongkos bervariasi
                        tergantung daerah tujuan Anda.
                        Mayoritas bus-bus moria telah terpasang AC. Sehingga membuat penumpang merasa sejuk berada
                        didalam bus sepanjang perjalanan.
                        Jika anda mau beli tiket Moria dapat pulang kampung bersama bus Moria, silahkan datang
                        langsung
                        ke alamat Loket Moria yang beralamat di: Jl. Sisingamangaraja KM 7,5 No. 61B, Harjosari II,
                        Kec.
                        Medan Amplas, Kota Medan.

                        Untuk info lebih lanjut silahkan telp nomor berikut: 0811-6323-262.


                        Loket bus Moria di Medan keberadaanya cukup besar. Dilengkapi toilet yang cukup baik, parkir
                        luas dan gratis serta ada tempat makan/minum. Pada umumnya, fasilitas gantungan tas, tong
                        sampah
                        sepertinya harus ditambah di kamar mandi.

                        Banyak para taksi online dan ojek online yang mendapat orderan di loket Moria medan.

                        Para supir bus moria sudah berpengalaman dalam mengantar penumpang dan barang sampai
                        ketujuan.

                        Selain bus penumpang, bus moria juga melayani pengiriman paket/barang dengan ongkos yang
                        relatif
                        terjangkau dan aman.

                        Dari Medan ke daerah Toba, akan beristirahat di loket Siantar. Disanalah penumpang bisa
                        makan
                        siang dan beristirahat sejenak.

                        Jadwal keberangkatan bus Moria Medan ke toba mulai dari jam 7.00 pagi hingga jam 11.00 Wib.
                        Untuk keberangkatan sore dan malam hari tersedia jam keberangkatan mulai jam 16.00 hingga
                        jam
                        20.00Wib.
                    </p>
                    <button
                        class="text-base font-semibold text-white bg-black py-3 px-8 rounded-full hover:shadow-lg hover:bg-blue-800 transition duration-300 ease-in-out data-drawer-target="
                        drawer-contact" data-drawer-show="drawer-contact" aria-controls="drawer-contact">Hubungi Saya
                </div>
                <div class="w-full self-end px-4 lg:w-1/2">
                    <div class="relative mt-10 lg:mt-9 lg:right-0">
                        <img src="{{asset('picture/bus/2022-05-31.jpg')}}" alt="gambar"
                            class="max-w-full mx-auto justify-items-center">
                        <span class="absolute bottom-1 -z-10 left-1/2 -translate-x-1/2 md:scale-125">
                            <svg width="400" height="400" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#0F172A"
                                    d="M55,-17C62.8,6.1,54.8,35.2,37.4,46.8C20,58.3,-6.7,52.2,-28.6,36.9C-50.4,21.6,-67.3,-2.9,-61.8,-23C-56.2,-43.1,-28.1,-58.9,-2.2,-58.2C23.6,-57.4,47.2,-40.2,55,-17Z"
                                    transform="translate(100 100) scale (1.1)" />
                            </svg>
                        </span>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  Hero Section End -->



    <!-- about sesction start -->
    <!-- <section id="about" class="pt-36 pb-32 dark:text-neutral-200">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full px-4 mb-10 lg:w-1/2">
                    <h4 class="font-bold uppercase text-primary text-lg mb-3">Tentang Saya</h4>
                    <h2 class="font-bold text-dark text-3xl mb-5 max-w-md">Sekilas Tentang Saya</h2>
                    <p class="font-medium text-base text-justify text-secondary max-w-xl">Lorem ipsum dolor, sit amet
                        consectetur adipisicing elit. Molestiae labore rem nesciunt porro, ut provident ex! Dicta
                        officia officiis nobis quae numquam. Tempore illo consequuntur adipisci. Explicabo dolore in
                        earum!</p>
                </div>
                <div class="w-full px-4 mb-10 lg:w-1/2">
                    <h3 class="font-semibold text-dark text-2xl mb-4">Sosial Media</h3>
                    <p class="font-medium text-base text-secondary">Mari Berteman</p>
                    <div class="flex item-center">
                        <!-- intagram -->
    <!-- <a href="https://www.instagram.com/indra_saryoni/?hl=en" target="_blank"
                            class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-400 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <title>Instagram</title>
                                <path
                                    d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                            </svg>
                        </a> -->
    <!-- twitter -->
    <!--<a href="https://twitter.com/Isaryoni" target="_blank"
                            class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-400 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <title>Twitter</title>
                                <path
                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </a> -->
    <!--  <a href="https://web.facebook.com/indrasaryoni23/" target="_blank"
                            class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-400 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <title>Facebook</title>
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a> -->
    <!--   <a href="https://www.youtube.com/channel/UCK0saQE1-FyfszGulbI6isw" target="_blank"
                            class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-400 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <title>YouTube</title>
                                <path
                                    d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                            </svg>
                        </a> -->
    <!-- <a href="https://github.com/saryoni23" target="_blank"
                            class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-400 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <title>GitHub</title>
                                <path
                                    d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                            </svg>
                        </a> -->
    <!--   <a href="mailto:indrasaryoni@gmail.com" target="_blank"
                            class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-400 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <title>Gmail</title>
                                <path
                                    d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-2.023 2.309-3.178 3.927-1.964L5.455 4.64 12 9.548l6.545-4.91 1.528-1.145C21.69 2.28 24 3.434 24 5.457z" />
                            </svg>
                        </a> -->
    <!-- </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- About Section End -->


    <section id="projects" class="pt-36 pb-32">
    </section>
    <section id="contact">
    </section>

    <section>
        <div id="drawer-contact"
            class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800"
            tabindex="-1" aria-labelledby="drawer-contact-label">
            <h5 id="drawer-label"
                class="inline-flex items-center mb-6 text-base font-semibold text-gray-500 uppercase dark:text-gray-400">
                <svg class="w-4 h-4 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 16">
                    <path
                        d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                    <path
                        d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                </svg>Contact us</h5>
            <button type="button" data-drawer-hide="drawer-contact" aria-controls="drawer-contact"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 right-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <form action="#" class="mb-6">
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        email</label>
                    <input type="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="name@company.com" required>
                </div>
                <div class="mb-6">
                    <label for="subject"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subject</label>
                    <input type="text" id="subject"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Let us know how we can help you" required>
                </div>
                <div class="mb-6">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        message</label>
                    <textarea id="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your message..."></textarea>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 block">Send
                    message</button>
            </form>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                <a href="#" class="hover:underline">info@company.com</a>
            </p>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                <a href="#" class="hover:underline">212-456-7890</a>
            </p>
        </div>
    </section>


    <footer
        class="fixed bottom-0 left-0 z-20 w-full p-4 bg-white border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 dark:border-gray-600">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© {{ date('Y') }} <a href=""
                class="hover:underline">PT.Moria Unedo Jaya</a>. All Rights Reserved.
        </span>
        <ul class="flex flex-wrap items-center md-6 mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6">About</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6">Licensing</a>
            </li>
            <li>
                <button class="mr-4 hover:underline md:mr-6" type="button" data-drawer-target="drawer-contact"
                    data-drawer-show="drawer-contact" aria-controls="drawer-contact">Contact</button>
            </li>
            <li>
                <a href="#home"
                    class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-400 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
                    <svg class="animate-bounce" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                        width="24px" fill="#000000">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z" /></svg>
                </a>
            </li>
        </ul>
    </footer>


</body>

</html>
