@extends('halaman_dashboard.index')@if(Auth::user()->role === 'admin')
@section('sidbar')
<!-- Sidebar -->
<li>
    <a href="/{{ Auth::user()->role}}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group
        ">
        <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
        </svg>
        <span class="ml-3" sidebar-toggle-item>Dashboard</span>
    </a>
</li>

<li>
    <button type="button"
        class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
        aria-controls="dropdown-pages" data-collapse-toggle="dropdown-pages">
        <svg aria-hidden="true"
            class="flex-shrink-0 w-6 h-6 text-gray-400 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                clip-rule="evenodd"></path>
        </svg>
        <span class="flex-1 ml-3 text-left whitespace-nowrap">User</span>
        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
    </button>
    <ul id="dropdown-pages" class=" py-2 space-y-2">
        <li>
            <a href="{{ route('datauser') }}"
                class="text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-75  dark:text-gray-200 dark:hover:bg-gray-700  bg-gray-100 dark:bg-gray-700 ">
                <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                    fill="currentColor" viewBox="0 0 640 512" xmlns="http://www.w3.org/2000/svg">

                    <path
                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H322.8c-3.1-8.8-3.7-18.4-1.4-27.8l15-60.1c2.8-11.3 8.6-21.5 16.8-29.7l40.3-40.3c-32.1-31-75.7-50.1-123.9-50.1H178.3zm435.5-68.3c-15.6-15.6-40.9-15.6-56.6 0l-29.4 29.4 71 71 29.4-29.4c15.6-15.6 15.6-40.9 0-56.6l-14.4-14.4zM375.9 417c-4.1 4.1-7 9.2-8.4 14.9l-15 60.1c-1.4 5.5 .2 11.2 4.2 15.2s9.7 5.6 15.2 4.2l60.1-15c5.6-1.4 10.8-4.3 14.9-8.4L576.1 358.7l-71-71L375.9 417z">
                    </path>

                </svg>
                <span class="ml-3" sidebar-toggle-item> User Control</span>
            </a>
        </li>
        <li>
            <a href="#"
                class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Kanban</a>
        </li>
        <li>
            <a href="#"
                class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Calendar</a>
        </li>
    </ul>
</li>
<li>
    <a href="{{ route('databerita') }}"
        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group ">
        <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd"
                d="M5 3a2 2 0 0 0-2 2v14c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2V7c0-.6-.4-1-1-1h-1a1 1 0 1 0 0 2v11h-2V5a2 2 0 0 0-2-2H5Zm7 4c0-.6.4-1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm0 3c0-.6.4-1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm-6 4c0-.6.4-1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1Zm0 3c0-.6.4-1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1ZM7 6a1 1 0 0 0-1 1v3c0 .6.4 1 1 1h3c.6 0 1-.4 1-1V7c0-.6-.4-1-1-1H7Zm1 3V8h1v1H8Z"
                clip-rule="evenodd" />
        </svg>

        <span class="ml-3" sidebar-toggle-item>Kelola Berita</span>
    </a>
</li>
</ul>
<ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
    <li>
        <a href="#"
            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
            <svg aria-hidden="true"
                class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                <path fill-rule="evenodd"
                    d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="ml-3">Docs</span>
        </a>
    </li>
    <li>
        <a href="{{ route('kelolaprofil') }}"
            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group ">

            <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 13v-2a1 1 0 0 0-1-1h-.8l-.7-1.7.6-.5a1 1 0 0 0 0-1.5L17.7 5a1 1 0 0 0-1.5 0l-.5.6-1.7-.7V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.8l-1.7.7-.5-.6a1 1 0 0 0-1.5 0L5 6.3a1 1 0 0 0 0 1.5l.6.5-.7 1.7H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.8l.7 1.7-.6.5a1 1 0 0 0 0 1.5L6.3 19a1 1 0 0 0 1.5 0l.5-.6 1.7.7v.8a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.8l1.7-.7.5.6a1 1 0 0 0 1.5 0l1.4-1.4a1 1 0 0 0 0-1.5l-.6-.5.7-1.7h.8a1 1 0 0 0 1-1Z" />
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
            </svg>

            <span class="ml-3" sidebar-toggle-item>Kelola Profil Usaha</span>
        </a>
    </li>
</ul>
</div>
</aside>
<!-- end sidebar -->




@endsection()

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
                        <a href="/datauser"
                            class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">User</a>
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
                        <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">Edit User</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            @foreach ($uc as $item)
            <form action="/edituser" class="max-w-md mx-auto" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="relative z-0 w-full mb-5 group">
                    <input disabled type="text" name="fullname" id="fullname"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        value="{{ $item->id }}" />
                    <label for="fullname"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ID
                        User</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="fullname" id="fullname"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ $item->fullname }}" />
                    <label for="fullname"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                        Lengkap</label>
                </div>
                <div class="relative max-w-sm mb-5 group">

                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input datepicker datepicker-autohide type="text" name="tgllahir"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Tanggal Lahir" value="{{ date('m/d/Y', strtotime($item->tgllahir)) }}">
                </div>
                <div class="relative z-0 w-full mb-5 group">

                    <input type="number" name="nomor" id="nomor"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300  dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer form-input [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                        placeholder=" " value="{{ $item->nomor }}" />

                    <label for="nomor"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">No
                        HP</label>

                </div>
                <div class="grid md:grid-cols-2 md:gap-6 mt-4">
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="gambar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto
                            Profil</label>
                        <input type="file" name="gambar" id="gambar" onchange="previewImage(this)"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                    </div>
                    <div id="image-preview" class="mt-2">
                        <img src="{{ asset('picture/accounts/') }}/{{ $item->gambar }}" alt="">
                    </div>
                </div>
                <input type="hidden" name="password" value="{{ $item->password }}">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                <a href="/datauser "
                    class="text-white bg-warning-700 hover:bg-warning-800 focus:ring-4 focus:outline-none focus:ring-warning-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-warning-600 dark:hover:bg-warning-700 dark:focus:ring-warning-800">Kembali</a>
            </form>
            @endforeach
        </div>
    </div>

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


</main>

    @endif
