<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>TicBus</title>
    <link rel="icon" href="{{asset('picture/logo/logo1.png')}}">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-200 dark:bg-abutua">

    <header class="bg-gray-200 dark:bg-abutua">
        <div class="container mt-8">
            <div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto  pt:mt-0 dark:bg-abutua">
                <a href=""
                    class="flex items-center justify-center mb-8 text-2xl font-semibold lg:mb-10 dark:text-white">
                    <!-- <img src="/images/logo.svg" class="mr-4 h-11" alt="FlowBite Logo"> -->
                    <span>TicBus</span>
                </a>
            </div>
    </header>
    <!-- Card -->
    <div class="container dark:bg-abutua flex flex-col items-center ">
        <div class="w-full max-w-xl p-6 pb-12 space-y-8 sm:p-8 bg-white rounded-lg shadow dark:bg-gray-800">
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <a href="/"
                    class="w-5 h-5 mr-3 flex justify-center items-center  text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
                    </svg>
                </a>

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                    Login
                </h2>
                <button id="theme-toggle" type="button"
                    class=" text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1 ">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z">
                        </path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <form class="mt-8 space-y-6" action="{{ route('auth') }}" method="POST">
                @csrf
                @if ($errors->any())
                <div class="p-4 mb-4 text-sm items-center text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <ul>
                        @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (Session::get('success'))
                <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg items-center bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                    role="alert">
                    <ul>
                        <li>{{ Session::get('success') }}</li>
                    </ul>
                </div>
                @endif
                <div>
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="abcd@gmail.com" value="{{ old('email') }}" required>
                </div>
                <div>
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required>
                </div>
                <div class="container flex flex-col items-center">
                    <button type="submit"
                        class="w-full px-5 py-3 text-base font-medium text-center text-white bg-black dark:bg-slate-200 dark:text-black rounded-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Login</button>
                    <div class="text-sm font-medium items-center mt-4 text-gray-500 dark:text-gray-400">Belum Ada Akun ?
                        <a href="{{ route('registrasi') }}"
                            class="text-primary-700 hover:underline dark:text-primary-500">Buat Disini</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>

</body>

</html>
