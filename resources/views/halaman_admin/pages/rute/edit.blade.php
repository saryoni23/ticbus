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
                            <a href="{{ route('kelolatiket.index') }}"
                            class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Tiket</a>
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
                        <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">Edit Tiket</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

            <form action="{{ route('kelolatiket.update', $post->id) }}" method="POST" enctype="multipart/form-data"
                class="max-w-lg mx-auto">
                @csrf @method('PUT')

                <div class="relative z-0 w-full mb-5 group">
                    @error('nama_tiket')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="text" name="nama_tiket" id="nama_tiket"
                        class="@error('nama_tiket') is-invalid @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ old('nama_tiket', $post->name_tiket) }}" required />
                    <label for="nama_tiket"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                        Tiket</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    @error('jenis_tiket')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="text" name="jenis_tiket" id="jenis_tiket"
                        class="@error('jenis_tiket') is-invalid @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ old('jenis_tiket', $post->jenis_tiket) }}" required />
                    <label for="jenis_tiket"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Jenis
                        Tiket</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    @error('harga_tiket')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                
                    <div class="relative">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Harga Tiket</label>
                        <span class="absolute inset-y-11 -left-1 pl-3 flex items-center pointer-events-none dark:text-gray-200">
                            Rp
                        </span>
                        <input type="text" name="harga_tiket" id="harga_tiket"
                            class="@error('harga_tiket') is-invalid @enderror block py-2.5 px-8 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300  dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 form-input [appearance:textfield]"
                            placeholder=" " value="{{ old('harga_tiket', $post->harga_tiket) }}" required />
                
                    </div>
                </div>
                
                <div class="relative z-0 w-full mb-5 group">
                    @error('categori_id')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Kategori Tiket</label>
                    <select name="categori_id" id="categori_id"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900  dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        required>
                        <option value="">Pilih Kategori</option>
                        @foreach($categories as $category)
                        <option class="text-gray-900 dark:text-black" value="{{ $category->id }}">
                            {{ $category->id }}->{{ $category->name_categori }}</option>
                        @endforeach
                    </select>
        
                </div>
        
                <div class="relative z-0 w-full mb-5 group">
                    @error('jumlah_tiket')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="number" name="jumlah_tiket" id="jumlah_tiket"
                        class="@error('jumlah_tiket') is-invalid @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300  dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 form-input [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                        placeholder=" " value="{{ old('jumlah_tiket', $post->jumlah_tiket) }}" required />
                    <label for="jumlah_tiket"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Jumlah
                        Tiket</label>
                </div>
               
                <div class="flex flex-row gap-2">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    <a href="{{ route('kelolatiket.index') }}"
                        class="text-white bg-warning-700 hover:bg-warning-800 focus:ring-4 focus:outline-none focus:ring-warning-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-warning-600 dark:hover:bg-warning-700 dark:focus:ring-warning-800">Kembali</a>
                </div>


                <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                    role="alert">


                </div>


            </form>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
           document.addEventListener("DOMContentLoaded", function () {
        var hargaInput = document.getElementById('harga_tiket');

        // Event listener untuk setiap kali input berubah
        hargaInput.addEventListener('input', function () {
            // Menghapus semua karakter non-digit
            var nilai = this.value.replace(/\D/g, '');
            // Menambahkan titik setiap 3 digit dari belakang
            nilai = nilai.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            // Menampilkan kembali nilai yang telah diubah
            this.value = nilai;
        });

        // Event listener untuk form submit
        document.querySelector('form').addEventListener('submit', function () {
            // Menghapus titik dari nilai harga sebelum mengirimkan form
            var hargaInput = document.getElementById('harga_tiket');
            hargaInput.value = hargaInput.value.replace(/\./g, '');
        });
    });

    </script>
    </body>
    @endif
