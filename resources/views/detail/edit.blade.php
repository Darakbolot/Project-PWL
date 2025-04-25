<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Detail Tutorial</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
        <a href="{{ route('MasterTutorial.DetailTutorial.index', ['masterTutorial' => $detail->masterTutorial->id]) }}" class="text-blue-600 hover:underline mb-6 inline-block">← Kembali</a>
        
        <h2>Edit Detail Tutorial untuk: {{ $detail->masterTutorial->judul ?? 'Tidak diketahui' }}</h2>

        <form action="{{ route('MasterTutorial.DetailTutorial.update', ['masterTutorial' => $detail->masterTutorial->id, 'detailTutorial' => $detail->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="text">Text</label>
                <textarea name="text" class="form-control" required>{{ old('text', $detail->text) }}</textarea>
            </div>

            <div class="form-group">
                <label for="gambar">Gambar (opsional)</label>
                <input type="file" name="gambar" class="form-control-file">
                @if($detail->gambar)
                    <p>Gambar saat ini: <img src="{{ asset('storage/' . $detail->gambar) }}" width="100" alt="Gambar saat ini"></p>
                @endif
            </div>

            <div class="form-group">
                <label for="code">Code</label>
                <textarea name="code" class="form-control" required>{{ old('code', $detail->code) }}</textarea>
            </div>

            <div class="form-group">
                <label for="url">URL (opsional)</label>
                <input type="url" name="url" class="form-control" value="{{ old('url', $detail->url) }}">
            </div>

            <div class="form-group">
                <label for="order">Urutan</label>
                <input type="number" name="order" class="form-control" value="{{ old('order', $detail->order) }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option value="show" {{ $detail->status == 'show' ? 'selected' : '' }}>Tampilkan</option>
                    <option value="hide" {{ $detail->status == 'hide' ? 'selected' : '' }}>Sembunyikan</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Detail</button>
            <a href="{{ route('MasterTutorial.DetailTutorial.index', ['masterTutorial' => $detail->masterTutorial->id]) }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>