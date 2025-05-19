<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kelola Detail Tutorial</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body class="bg-cyan-800">
<header>
    <nav class="bg-gray-700 relative">
        <div class="container mx-auto py-4 flex items-center justify-center relative">
            <!-- SVG Section (left) -->
        <div class="absolute left-4 flex space-x-10">
          <a href="{{ route('MasterTutorial.index') }}" class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-8 w-8 text-yellow-400" viewBox="0 0 16 16" stroke="currentColor">
              <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
            </svg>
          </a>
        </div>
            <div class="absolute left-13 flex space-x-10">
                <div class="flex items-center space-x-2">
                    <a href="{{ route('MasterTutorial.DetailTutorial.create', ['MasterTutorial' => $MasterTutorial]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-400" fill="none" viewBox="0 0 16 16" stroke="currentColor">
                            <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5"/>
                            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Title (center) -->
            <h1 class="text-2xl font-bold text-gray-50">{{ $MasterTutorial->judul }}</h1>

            {{-- <!-- Search (right) -->
            <div class="absolute right-4 lg:flex hidden items-center space-x-2 bg-white py-1 px-2 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input class="outline-none" type="text" placeholder="Search" />
            </div> --}}
        </div>
    </nav>
</header>

    <div class="container mx-auto px-4 py-6">
        <!-- Tabel -->
        <div class="relative overflow-x-auto mt-10 mx-10 shadow-lg sm:rounded-lg bg-white p-6">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-200 uppercase text-xs text-gray-700">
                    <tr>
                        <th class="px-4 py-2">Order</th>
                        <th class="px-4 py-2">Text</th>
                        <th class="px-4 py-2">Gambar</th>
                        <th class="px-4 py-2">Code</th>
                        <th class="px-4 py-2">URL</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($details as $detail)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $detail->order }}</td>
                        <td class="px-4 py-2">{{ Str::limit($detail->text, 50) }}</td>
                        <td class="px-4 py-2">
                            @if($detail->gambar)
                                <img src="{{ asset('storage/'.$detail->gambar) }}" alt="Gambar" class="h-20 object-contain">
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            <pre class="whitespace-pre-wrap break-words">{{ Str::limit($detail->code, 50) }}</pre>
                        </td>
                        <td class="px-4 py-2">{{ $detail->url }}</td>
                        <td class="px-4 py-2">{{ $detail->status }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('MasterTutorial.DetailTutorial.edit', ['MasterTutorial' => $MasterTutorial, 'DetailTutorial' => $detail->id]) }}"
                               class="text-blue-600 hover:underline">Edit</a>
                            
                            <form action="{{ route('MasterTutorial.DetailTutorial.destroy', ['DetailTutorial' => $detail->id, 'MasterTutorial' => $MasterTutorial->id]) }}"
                                  method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus detail ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
