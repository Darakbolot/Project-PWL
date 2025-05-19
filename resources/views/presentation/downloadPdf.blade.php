<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PDF - {{ $tutorial->judul }}</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .section { margin-bottom: 20px; page-break-inside: avoid; }
        .title { font-weight: bold; font-size: 14px; }
        .code { background: #eee; padding: 5px; font-family: monospace; white-space: pre-wrap; }
        .url { color: blue; text-decoration: underline; }
        .status { font-style: italic; color: gray; }
        img { max-width: 100%; height: auto; margin-top: 10px; }
    </style>
</head>
<body>
    <h1>{{ $tutorial->judul }}</h1>

    @foreach ($details as $item)
        <div class="section">
            <p class="title">{{ $item->order }}. {{ $item->text }}</p>

            @if ($item->gambar)
            @php
                $gambarPath = 'storage/' . $item->gambar;
                $gambarFullPath = public_path($gambarPath);
                $ext = pathinfo($gambarFullPath, PATHINFO_EXTENSION);
            @endphp

            @if (file_exists($gambarFullPath) && in_array(strtolower($ext), ['jpg', 'jpeg', 'png']))
                <img src="{{ $gambarFullPath }}" alt="Gambar">
            @else
                <p><em>[Gambar tidak dapat ditampilkan (format tidak didukung)]</em></p>
            @endif
            @endif

            @if ($item->code)
                <pre class="code">{{ $item->code }}</pre>
            @endif

            @if ($item->url)
                <p class="url">{{ $item->url }}</p>
            @endif

            <p class="status">Status: {{ $item->status }}</p>
        </div>
    @endforeach
</body>
</html>
