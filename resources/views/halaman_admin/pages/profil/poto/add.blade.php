@extends('halaman_admin.index')@if(Auth::user()->role === 'admin')

@section('main')
<main class="p-4 md:ml-64  pt-20 bg-gray-200 dark:bg-gray-900 h-screen">
    <div class="p-4 rounded mb-4 shadow bg-white dark:bg-gray-800">
        <nav class="flex mb-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="{{ Auth::user()->role}}"
                        class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                        <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <a href="/profilusaha"
                            class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Profil</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">Tambah
                            Poto</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

            <form action="{{ route('addgambar') }}" class="mt-8 space-y-6" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="grid md:grid-cols-2 md:gap-6 mt-4">
                    @error('image')
                    <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                        role="alert">
                        <span class="font-medium">Info alert!</span> {{ $message }}
                    </div>
                    @enderror
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="image"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
                        <input type="file" name="image" onchange="previewImage(this)" class=" @error('image') is-invalid @enderror block py-2.5 px-0 w-full text-sm
                            text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none
                            dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none
                            focus:ring-0 focus:border-blue-600 peer" />
                    </div>
                    <div id="image-preview" class="mt-2">
                        <img src="{{ asset('picture/accounts/blank.jpg') }}" alt="">
                    </div>
                </div>
                <div class="flex flex-row gap-2">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    <a href="/profilusaha"
                        class="text-white bg-warning-700 hover:bg-warning-800 focus:ring-4 focus:outline-none focus:ring-warning-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-warning-600 dark:hover:bg-warning-700 dark:focus:ring-warning-800">Kembali</a>
                </div>
                @error('profil_id')
                <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                    role="alert">
                    <span class="font-medium">Info alert!</span> {{ $message }}
                </div>
                @enderror


                <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                    role="alert">


                </div>
            </form>
        </div>
    </div>
</main>

<script>
    function previewImage(input) {
        const preview = document.getElementById('image-preview');
        preview.innerHTML = '';
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('w-full', 'h-full', 'object-cover', 'rounded-lg', 'mt-2');
                preview.appendChild(img);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
@endif
