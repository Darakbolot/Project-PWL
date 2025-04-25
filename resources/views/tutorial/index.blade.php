<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Master Tutorial</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body class="bg-cyan-800">

<!-- Navbar -->
<header>
    <nav class="bg-gray-700 relative">
        <div class="container mx-auto py-4 flex items-center justify-center relative">
            <!-- SVG Section (left) -->
            <div class="absolute left-4 flex space-x-10">
                <div class="flex items-center space-x-2">
                    <a href="{{ route('MasterTutorial.create') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-400" fill="none" viewBox="0 0 16 16" stroke="currentColor">
                            <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5"/>
                            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Title (center) -->
            <h1 class="text-2xl font-bold text-gray-50">Master Tutorial</h1>

            <!-- Search (right) -->
            <div class="absolute right-4 lg:flex hidden items-center space-x-2 bg-white py-1 px-2 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input class="outline-none" type="text" placeholder="Search" />
            </div>
        </div>
    </nav>
</header>

<!-- Table Section -->
<div class="relative overflow-x-auto mt-10 mx-10 shadow-lg sm:rounded-lg bg-white p-6">
    <table id="tutorialTable" class="w-full text-sm text-left text-gray-700">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200">
            <tr>
                <th class="px-4 py-3">Judul</th>
                <th class="px-4 py-3">Kode Mata Kuliah</th>
                <th class="px-4 py-3">Presentasi</th>
                <th class="px-4 py-3">PDF</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3">Dibuat</th>
                <th class="px-4 py-3">Diperbarui</th>
                <th class="px-4 py-3">Aksi</th>
                <th class="px-4 py-3">Presentasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tutorials as $tutorial)
            <tr class="border-b bg-gray-50 hover:bg-gray-100">
                <td class="px-4 py-2">{{ $tutorial->judul }}</td>
                <td class="px-4 py-2">
                    @php
                        $nama = collect($matkul)->firstWhere('kdmk', $tutorial->kode_matkul)['nama'] ?? 'Makul tidak ditemukan';
                    @endphp
                    {{ $tutorial->kode_matkul }} - {{ $nama }}
                </td>
                <td class="px-4 py-2">
                    @if($tutorial->url_presentation)
                        <a href="{{ $tutorial->url_presentation }}" target="_blank" class="text-blue-600 hover:underline">Buka Presentasi</a>
                    @endif
                </td>
                <td class="px-4 py-2">
                    @if($tutorial->url_finished)
                        <a href="{{ $tutorial->url_finished }}" target="_blank" class="text-blue-600 hover:underline">Buka PDF</a>
                    @endif
                </td>
                <td class="px-4 py-2">{{ $tutorial->creator_email }}</td>
                <td class="px-4 py-2">{{ $tutorial->created_at }}</td>
                <td class="px-4 py-2">{{ $tutorial->updated_at }}</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('MasterTutorial.edit', $tutorial->id) }}" class="text-yellow-600 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square hover:text-cyan-800" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                          </svg>
                    </a>
                    <form action="{{ route('MasterTutorial.destroy', $tutorial->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                            @method('DELETE')
                            <button type="submit">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3 hover:text-cyan-800" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                              </svg>
                            </button>
                    </form>
                </td>
                <td class="px-4 py-2">
                    <a href="{{ route('MasterTutorial.DetailTutorial.index',  $tutorial->id) }}" class="text-cyan-600 hover:underline">Kelola</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Logout -->
<div class="text-center mt-6">
    <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Yakin mau logout?')">
        @csrf
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            Logout
        </button>
    </form>
</div>



<script>
    $(document).ready(function () {
        $('#tutorialTable').DataTable();
    });
</script>
</body>
</html>
