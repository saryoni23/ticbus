<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="{{asset('picture/logo/logo1.png')}}">
    <title>Project Laravel10</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-200 dark:bg-abutua">
    <header class="bg-gray-200 dark:bg-black">
        <div class="container">
            @include('shared.header')
            <div class="main-content">
                @yield('content')
            </div>
            @include('shared.footer')
        </div>
</body>

</html>