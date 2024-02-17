@extends('halaman_admin.index')

@if(Auth::user()->role === 'admin')
@section('main')
<main class="p-4 md:ml-64 pt-20 bg-gray-200 dark:bg-gray-900 h-screen">
    <div class="p-4 rounded mb-4 shadow bg-white dark:bg-gray-800">
        <nav class="flex mb-5" aria-label="Breadcrumb">
            <!-- Tambahkan navigasi breadcrumb di sini jika diperlukan -->
        </nav>
        <div class="max-w-md mx-auto">
            <form action="{{ route('kelolatiket.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
        
                <div class="relative z-0 w-full mb-5 group">
                    @error('nama_tiket')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="text" name="nama_tiket" id="nama_tiket"
                        class="@error('nama_tiket') is-invalid @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ old('nama_tiket') }}" required />
                    <label for="nama_tiket"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                        Tiket</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    @error('nama_supir')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="text" name="nama_supir" id="nama_supir"
                        class="@error('nama_supir') is-invalid @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ old('nama_supir') }}" required />
                    <label for="nama_supir"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Supir</label>
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
                            placeholder=" " value="{{ old('harga_tiket') }}" required />
                
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
                        class="block py-2.5 px-0 w-full text-sm text-gray-900  dark:text-black dark:border-gray-600 font-bold"
                        required>
                        <option value="">Pilih Kategori</option>
                        @foreach($categories as $category)
                        <option class="text-gray-900 dark:text-black font-bold" value="{{ $category->id }}">
                           {{ $category->name_categori }}</option>
                        @endforeach
                    </select>
        
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    @error('rute_id')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Rute Tiket</label>
                    <select name="rute_id" id="rute_id"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900  dark:text-black dark:border-gray-600 font-bold"
                        required>
                        <option value="">Pilih Rute</option>
                        @foreach($rute as $rute)
                        <option class="text-gray-900 dark:text-black font-bold" value="{{ $rute->id }}">
                            {{ $rute->kota_asal }} Ke {{ $rute->kota_tujuan }}</option>
                        @endforeach
                    </select>
        
                </div>
        
                <div class="relative z-0 w-full mb-5 group">
                    @error('jumlah_tiket')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Jumlah Kursi/Tiket</label>
                    <input type="number" name="jumlah_tiket" id="jumlah_tiket"
                        class="@error('jumlah_tiket') is-invalid @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300  dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 form-input [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                        placeholder=" " value="{{ old('jumlah_tiket') }}" required />
                    
                </div>
        
                <div class="flex flex-row gap-2">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    <!-- Aktifkan tombol kembali jika diperlukan -->
                    <a href="{{ route('kelolatiket.index') }}"
                        class="text-white bg-warning-700 hover:bg-warning-800 focus:ring-4 focus:outline-none focus:ring-warning-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-warning-600 dark:hover:bg-warning-700 dark:focus:ring-warning-800">Kembali</a>
        
                </div>
        
                <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                    role="alert">
                    <!-- Pesan atau notifikasi berhasil disini jika diperlukan -->
        
                </div>
            </form>
        </div>
    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
@endif
