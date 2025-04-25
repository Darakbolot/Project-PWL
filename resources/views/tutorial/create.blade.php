<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Master Tutorial</title>
    @vite('resources/css/app.css') 
</head>
<body class="bg-cyan-800 min-h-screen flex items-center justify-center px-4">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Tambah Master Tutorial</h2>
        <a href="{{ route('MasterTutorial.index') }}" class="text-blue-600 hover:underline mb-6 inline-block">← Kembali</a>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('MasterTutorial.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block font-medium text-gray-700">Judul:</label>
                <input type="text" name="judul" value="{{ old('judul') }}"
                       class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500" required>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Kode Mata Kuliah:</label>
                <select name="kode_matkul" required
                        class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                    @foreach ($matkul as $mk)
                        <option value="{{ $mk['kdmk'] }}">{{ $mk['kdmk'] }} - {{ $mk['nama'] }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-medium text-gray-700">URL Presentation:</label>
                <input type="text" name="url_presentation" id="url_presentation" value="{{ old('url_presentation') }}"
                       class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500">
            </div>
            
            <div>
                <label class="block font-medium text-gray-700">URL Finished:</label>
                <input type="text" name="url_finished" id="url_finished" value="{{ old('url_finished') }}"
                       class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500">
            </div>

            <div class="text-right">
                <button type="submit"
                        class="bg-cyan-600 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</body>
</html>
