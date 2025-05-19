<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Master Tutorial</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-cyan-800 min-h-screen py-10 px-4">

    <div class="bg-gray-700 p-8 rounded-lg shadow-lg w-full max-w-2xl mx-auto text-white">
        <h2 class="text-2xl font-bold mb-4 text-center">Edit Master Tutorial</h2>

        <a href="{{ route('MasterTutorial.index') }}" class="text-yellow-400 hover:text-yellow-300 transition mb-6 inline-block">
            ← Kembali
        </a>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('MasterTutorial.update', $tutorial->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-white mb-1">Judul:</label>
                <input type="text" name="judul" value="{{ old('judul', $tutorial->judul) }}" 
                       class="w-full border border-gray-600 bg-gray-800 text-white rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
            </div>

            <div>
                <label class="block text-white mb-1">Kode Mata Kuliah:</label>
                <select name="kode_matkul" required
                        class="w-full border border-gray-600 bg-gray-800 text-white rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    @foreach ($matkul as $mk)
                        <option value="{{ $mk['kdmk'] }}" @if($mk['kdmk'] == $tutorial->kode_matkul) selected @endif>
                            {{ $mk['kdmk'] }} - {{ $mk['nama'] }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-white mb-1">URL Presentation:</label>
                <input type="text" name="url_presentation" id="url_presentation" value="{{ old('url_presentation', $tutorial->url_presentation) }}"
                       class="w-full border border-gray-600 bg-gray-800 text-white rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>
            
            <div>
                <label class="block text-white mb-1">URL Finished:</label>
                <input type="text" name="url_finished" id="url_finished" value="{{ old('url_finished', $tutorial->url_finished) }}"
                       class="w-full border border-gray-600 bg-gray-800 text-white rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>

            <div class="text-right">
                <button type="submit" 
                        class="bg-yellow-400 hover:bg-yellow-300 text-black font-semibold py-2 px-4 rounded-lg transition duration-200">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</body>
</html>
