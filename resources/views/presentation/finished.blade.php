<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $tutorial->judul }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        .step {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            display: block; /* Pastikan semua langkah ditampilkan */
        }

        .step.hide {
            background-color: #f9f9f9; /* Beda warna jika ingin menandai langkah hide */
            opacity: 0.8;
        }

        pre {
            background-color: #f3f3f3;
            padding: 10px;
            overflow-x: auto;
        }
    </style>
</head>
<body>

    <h1>{{ $tutorial->judul }}</h1>

    <div id="steps">
        @foreach ($details as $detail)
            <div class="step {{ $detail->status === 'hide' ? 'hide' : '' }}">
                <h2>Langkah {{ $loop->iteration }}</h2>
                <p>{!! nl2br(e($detail->text)) !!}</p>

                @if($detail->gambar)
                    <img src="{{ Storage::url($detail->gambar) }}" style="max-width: 100%; height: auto;">
                @endif

                @if($detail->code)
                    <pre><code>{{ $detail->code }}</code></pre>
                @endif

                @if($detail->url)
                    <p>{{$detail->url}}</p>
                @endif

                @if($detail->status === 'hide')
                    <small><em>(Langkah ini disembunyikan dari presentasi utama)</em></small>
                @endif
            </div>
        @endforeach

        @if($tutorial->url_finished)
            <a href="{{ route('presentation.downloadPdf', basename($tutorial->url_finished)) }}" target="_blank">Buka PDF</a>
        @endif
    </div>

</body>
</html>
