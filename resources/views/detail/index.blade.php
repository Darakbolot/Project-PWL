<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kelola Detail Tutorial</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { padding: 8px 12px; border: 1px solid #ddd; }
        th { background-color: #f3f3f3; }
        img { max-height: 80px; }
        .btn { display: inline-block; padding: 6px 12px; background-color: #4CAF50; color: white; border-radius: 4px; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container mx-auto px-4 py-6">
        <a href="{{ route('MasterTutorial.index') }}" class="text-blue-600 hover:underline mb-6 inline-block">← Kembali</a>
        <h2 class="text-2xl font-bold mb-4">Kelola Detail Tutorial: {{ $MasterTutorial->judul }}</h2>

        <a href="{{ route('MasterTutorial.DetailTutorial.create', ['MasterTutorial' => $MasterTutorial]) }}" class="btn">+ Tambah Detail</a>

        <table class="mt-4">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Text</th>
                    <th>Gambar</th>
                    <th>Code</th>
                    <th>URL</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $detail)
                <tr>
                    <td>{{ $detail->order }}</td>
                    <td>{{ Str::limit($detail->text, 50) }}</td>
                    <td>
                        @if($detail->gambar)
                            <img src="{{ asset('storage/'.$detail->gambar) }}" alt="Gambar">
                        @endif
                    </td>
                    <td><pre>{{ Str::limit($detail->code, 50) }}</pre></td>
                    <td>{{ $detail->url }}</td>
                    <td>{{ $detail->status }}</td>
                    <td class="space-x-2">
                        <!-- Tombol Edit -->
                        <a href="{{ route('MasterTutorial.DetailTutorial.edit', ['MasterTutorial' => $MasterTutorial, 'DetailTutorial' => $detail->id]) }}"
                           class="text-blue-600 hover:underline">Edit</a>
                      
                        <!-- Tombol Hapus -->
                        <form action="{{ route('MasterTutorial.DetailTutorial.destroy', ['DetailTutorial' => $detail->id, 'MasterTutorial' => $MasterTutorial->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus detail ini?')" class="text-red-600 hover:underline">Hapus</button>
                        </form>                        
                      </td>                      
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
