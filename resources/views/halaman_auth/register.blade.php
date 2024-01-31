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
        <!-- Hero Section / Body -->
        <div class="relative isolate px-6 pt-14 lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
                <!-- bg warna -->
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#2ccb59] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="
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

            <div class="mx-auto max-w-2xl">
                <div class="container flex flex-col items-center mb-2 ">
                    <div class="w-full max-w-xl p-8 scroll-pb-16 space-y-8 sm:p-8 bg-slate-100 rounded-lg shadow-2xl dark:bg-gray-800">
                        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                            <a href="{{ route("auth") }}" class="w-5 h-5 mr-3 flex justify-center items-center  text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
                                </svg>
                            </a>

                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                                Daftar Akun
                            </h2>
                            <button id="theme-toggle" type="button" class=" text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1 ">
                                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z">
                                    </path>
                                </svg>
                                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>

                        <form action="{{ route('registrasi') }}" class="mt-8 space-y-6" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @if (Session::get('success'))
                            <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                                <ul>
                                    <li>{{ Session::get('success') }}</li>
                                </ul>
                            </div>
                            @endif

                            <div>
                                <label for="fullname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Lengkap</label>
                                <input type="text" name="fullname" id="fullname" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('fullname') }}" placeholder="Nama Lengkap" required>
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                    email</label>
                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('email') }}" placeholder="name@company.com" required>
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                    password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                            </div>
                            <div>
                                <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                    password</label>
                                <input type="password" name="confirm-password" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                            </div>
                            <div>
                                <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor telepon /
                                    Wa</label>
                                <input type="number" name="nomor" id="number" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 form-input [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" value="{{ old('nomor') }}" placeholder="08123456789" required>

                            </div>
                            <div>
                                <label for="gambar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
                                <input type="file" name="gambar" id="gambar" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                            </div>
                            {{-- <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="remember" aria-describedby="remember" name="remember" type="checkbox" class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" required>
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="remember" class="font-medium text-gray-900 dark:text-white">I accept the <a href="#" class="text-primary-700 hover:underline dark:text-primary-500">Terms and Conditions</a></label>
                                    </div>
                                </div> --}}
                            <div class="container items-center flex flex-col">
                                <button type="submit" class="w-full px-5 py-3 text-base font-medium text-center text-white bg-black rounded-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-white dark:text-black dark:hover:bg-primary-700 dark:focus:ring-primary-800">Daftar</button>
                                <div class="text-sm font-medium text-gray-500 dark:text-gray-400 pt-4">
                                    Akun Sudah Siap ? <a href="{{ Route('auth') }}" class="text-primary-700 hover:underline dark:text-primary-500">Login Disini</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="relative inset-x-0 top-[calc(100%-1rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-1rem)]" aria-hidden="true">
                    <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#61d066] to-[#9089fc] opacity-30 sm:left-0[calc(90%+7rem)] sm:max-w-lg" style="
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
</body>

</html>