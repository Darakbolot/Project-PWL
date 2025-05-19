<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tambah Detail Tutorial</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-cyan-800">
  <!-- Navbar -->
  <header>
    <nav class="bg-gray-700 relative">
      <div class="container mx-auto py-4 flex items-center justify-center relative">
        <!-- Back Button -->
        <div class="absolute left-4 flex space-x-10">
          <a href="{{ route('MasterTutorial.DetailTutorial.index', ['MasterTutorial' => $MasterTutorial->id]) }}" class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-8 w-8 text-yellow-400" viewBox="0 0 16 16" stroke="currentColor">
              <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
            </svg>
          </a>
        </div>

        <!-- Title -->
        <h1 class="text-2xl font-bold text-gray-50">Tambah Detail Tutorial</h1>

        <!-- Optional Search -->
        {{-- <div class="absolute right-4 lg:flex hidden items-center space-x-2 bg-white py-1 px-2 rounded-full">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
          <input class="outline-none bg-transparent text-sm" type="text" placeholder="Search" />
        </div>
      </div> --}}
    </nav>
  </header>

  <!-- Form -->
  <div class="bg-gray-700 mt-10 p-6 max-w-2xl mx-auto rounded-lg shadow-2xl text-white">
    <form action="{{ route('MasterTutorial.DetailTutorial.store', ['MasterTutorial' => $MasterTutorial->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf

      <!-- Master Tutorial -->
      <div>
        <label for="">Master Tutorial</label><br>
        <label for="">{{ $MasterTutorial->judul }}</label>
        <input type="hidden" name="master_tutorial_id" value="{{ $MasterTutorial->id }}">
      </div>

      <!-- Text -->
      <div>
        <label for="text" class="block text-white mb-2">Text</label>
        <textarea name="text" id="text" class="w-full p-2 rounded-lg bg-gray-700 text-white border border-gray-600" required></textarea>
      </div>

      <!-- Gambar -->
      <div>
        <label for="gambar" class="block text-white mb-2">Gambar</label>
        <input type="file" name="gambar" id="gambar" class="w-full p-2 rounded-lg bg-gray-50 border border-gray-300 text-black">
      </div>

      <!-- Code -->
      <div>
        <label for="code" class="block text-white mb-2">Code</label>
        <textarea name="code" id="code" class="w-full p-2 rounded-lg bg-gray-700 text-white border border-gray-600"></textarea>
      </div>

      <!-- URL -->
      <div>
        <label for="url" class="block text-white mb-2">URL</label>
        <input type="url" name="url" id="url" class="w-full p-2 rounded-lg bg-gray-700 text-white border border-gray-600">
      </div>

      <!-- Order -->
      <div>
        <label for="order" class="block text-white mb-2">Order</label>
        <input type="number" name="order" id="order" class="w-full p-2 rounded-lg bg-gray-700 text-white border border-gray-600" required>
      </div>

      <!-- Status -->
      <div>
        <label for="status" class="block text-white mb-2">Status</label>
        <select name="status" id="status" class="w-full p-2 rounded-lg bg-gray-700 text-white border border-gray-600">
          <option value="show">Show</option>
          <option value="hide">Hide</option>
        </select>
      </div>

      <!-- Submit -->
      <div class="text-center">
        <button type="submit" class="bg-yellow-400 text-black px-4 py-2 rounded hover:bg-yellow-300">Simpan</button>
      </div>
    </form>
  </div>
</body>
</html>
