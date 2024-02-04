<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Berita</title>


</head>
<body>
    @section('main')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($berita as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->judul }}</td>
                <td>{{ $data->isi }}</td>
                <td>
                
                    <td
                    class="max-2xl: p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-white">
                    <img src="{{ asset('picture/berita') }}/{{ $data->image }}" alt="image" />
                </td>
       
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>


</html>
