@extends('halaman_karyawan.index')@if(Auth::user()->role === 'karyawan')

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
                        <a href="{{ route('beritakar.index') }}"
                            class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Berita</a>
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
                        <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">List</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">

                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <div class="w-full md:w-1/3 flex flex-col items-end ml-auto space-x-2 sm:space-x-3">
                                <a href="{{ route('beritakar.create') }}"
                                    class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 tombol-tambah">
                                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                    </svg>TAMBAH Berita</a>
                            </div>
                            <div class="flex flex-col h-auto  ">
                                <div class="sm:-mx-4 lg:-mx-6">
                                    <div class="inline-block min-w-full py-2 sm:px-4 lg:px-8">
                                        <table id="example" class="stripe hover"
                                            class="min-w-full text-left text-sm font-light">
                                            <thead class="border-b font-medium dark:border-gray-500">
                                                <tr>
                                                    <th data-priority="1" scope="col"
                                                        class="px-6 py-4 text-xs font-medium text-center text-gray-500 uppercase dark:text-gray-400">
                                                        No</th>
                                                    <th data-priority="2" scope="col"
                                                        class="p-4 text-xs font-medium text-center text-gray-500 uppercase dark:text-gray-400">
                                                        GAMBAR</th>
                                                    <th data-priority="2" scope="col"
                                                        class="p-4 text-xs font-medium text-center text-gray-500 uppercase dark:text-gray-400">
                                                        JUDUL</th>
                                                    <th data-priority="2" scope="col"
                                                        class="p-4 text-xs font-medium text-center text-gray-500 uppercase dark:text-gray-400">
                                                        CONTENT</th>
                                                    <th data-priority="2" scope="col"
                                                        class="p-4 text-xs font-medium text-center text-gray-500 uppercase dark:text-gray-400">
                                                        AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($posts as $post)
                                                <tr>
                                                    <td class="flex items-center p-4 mr-1 space-x-2 whitespace-nowrap">
                                                        <div
                                                            class="flex space-x-5  text-gray-500 dark:text-gray-400 text-base justify-items-center font-semibold ">
                                                            <div class="">
                                                                {{  $loop->iteration }}
                                                            </div>

                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <img src="{{ asset('/storage/posts/'.$post->image) }}"
                                                            class="rounded" style="width: 150px" />
                                                    </td>
                                                    <td
                                                        class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-white">
                                                        {{ $post->judul }}</td>
                                                    <td
                                                        class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-white">
                                                        {!! $post->isi !!}</td>
                                                    <td class="text-center">
                                                        <form onsubmit="return confirmHapus(event)"
                                                            action="{{ route('beritakar.destroy', $post->id) }}"
                                                            method="POST">
                                                            <a href="{{ route('beritakar.show', $post->id) }}"
                                                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-info-600 rounded-lg hover:bg-info-800 focus:ring-4 focus:ring-info-300 dark:focus:ring-red-900">SHOW</a>
                                                            <a href="{{ route('beritakar.edit', $post->id) }}"
                                                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                                <svg class="w-4 h-4 mr-2" fill="currentColor"
                                                                    viewBox="0 0 20 20"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                                    </path>
                                                                    <path fill-rule="evenodd"
                                                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>EDIT</a>
                                                            @csrf @method('DELETE')
                                                            <button type="submit"
                                                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                                                HAPUS
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @empty
                                                <div class="alert alert-danger">
                                                    Data Post belum Tersedia.
                                                </div>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        {{ $posts->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    function confirmHapus(event) {
        event.preventDefault(); // Menghentikan form dari pengiriman langsung

        Swal.fire({
            title: 'Yakin Hapus Data?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            theme: 'dark',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
        }).then((willDelete) => {
            if (willDelete.isConfirmed) {
                event.target.submit(); // Melanjutkan pengiriman form
            } else {
                swal('Your imaginary file is safe!');
            }
        });
    }
    //message with toastr
    @if(session() -> has('success'))

    toastr.success('{{ session('
        success ') }}', 'BERHASIL!');

    @elseif(session() -> has('error'))

    toastr.error('{{ session('
        error ') }}', 'GAGAL!');

    @endif

</script>
@endif
