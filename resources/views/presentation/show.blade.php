<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $tutorial->judul }}</title>
    <script>
        let shownSteps = 2; // Awalnya tampil 2 langkah pertama

        function showSteps() {
            let steps = document.querySelectorAll('.step');
            steps.forEach((step, index) => {
                if (index < shownSteps) {
                    step.style.display = 'block';
                } else {
                    step.style.display = 'none';
                }
            });
        }

        function addSteps() {
            shownSteps += 2;
            showSteps();
        }

        document.addEventListener('DOMContentLoaded', function() {
            showSteps();
            setInterval(addSteps, 10000); // Tambah 2 langkah setiap 10 detik
        });
    </script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        .step {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            display: none;
        }
    </style>
</head>
<body>

    <h1>{{ $tutorial->judul }}</h1>

    <div id="steps">
        @foreach ($details as $detail)
            <div class="step">
                <h2>Langkah {{ $loop->iteration }}</h2>
                <p>{!! nl2br(e($detail->text)) !!}</p>

                @if($detail->gambar)
                    <img src="{{ Storage::url($detail->gambar) }}" style="max-width: 100%; height: auto;">
                @endif

                @if($detail->code)
                    <pre><code>{{ $detail->code }}</code></pre>
                @endif

                @if($detail->url)
                    <p><a href="{{ $detail->url }}" target="_blank">Link Tambahan</a></p>
                @endif
            </div>
        @endforeach
    </div>

</body>
</html>
