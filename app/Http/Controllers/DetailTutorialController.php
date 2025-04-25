<?php

namespace App\Http\Controllers;

use App\Models\DetailTutorial;
use App\Models\MasterTutorial;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class DetailTutorialController extends Controller
{
    public function index(MasterTutorial $MasterTutorial)
    {
        $details = $MasterTutorial->details()->orderBy('order')->get();
        return view('detail.index', compact('MasterTutorial', 'details'));
    }

    public function create(MasterTutorial $MasterTutorial)
    {
        $details = $MasterTutorial->details()->orderBy('order')->get();
        return view('detail.create', compact('MasterTutorial', 'details'));
    }

    public function store(Request $request, MasterTutorial $MasterTutorial)
    {
        $request->validate([
            'text' => 'required',
            'order' => 'required|numeric',
            'status' => 'required|in:show,hide',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $detail = new DetailTutorial($request->except('gambar'));
        $detail->master_tutorial_id = $MasterTutorial->id;

        if ($request->hasFile('gambar')) {
            $detail->gambar = $request->file('gambar')->store('tutorial-images', 'public');
        }

        $detail->save();

        return redirect()->route('MasterTutorial.DetailTutorial.index', $MasterTutorial->id)
                         ->with('success', 'Detail tutorial berhasil ditambahkan.');
    }

    
public function edit(MasterTutorial $MasterTutorial, DetailTutorial $DetailTutorial)
{
    // Menampilkan halaman edit untuk detail tutorial
    return view('detail.edit', compact('MasterTutorial', 'DetailTutorial'));
}

public function update(Request $request, MasterTutorial $MasterTutorial, DetailTutorial $DetailTutorial)
{
    // Validasi input
    $request->validate([
        'text' => 'required',
        'order' => 'required|numeric',
        'status' => 'required|in:show,hide',
        'gambar' => 'nullable|image|max:2048',
    ]);

    // Mengupdate data detail tutorial
    $DetailTutorial->fill($request->except('gambar'));

    if ($request->hasFile('gambar')) {
        // Menghapus gambar lama jika ada dan menggantinya
        if ($DetailTutorial->gambar) {
            \Storage::delete('public/'.$DetailTutorial->gambar);
        }
        // Menyimpan gambar baru
        $DetailTutorial->gambar = $request->file('gambar')->store('tutorial-images', 'public');
    }

    // Simpan perubahan
    $DetailTutorial->save();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('MasterTutorial.DetailTutorial.index', $MasterTutorial->id)
                     ->with('success', 'Detail tutorial berhasil diperbarui.');
}

    public function destroy($id, MasterTutorial $MasterTutorial)
    {
        // Mengambil detail berdasarkan ID
        $detail = DetailTutorial::findOrFail($id);
    
        // Hapus detail
        $detail->delete();
    
        // Redirect ke halaman index dengan parameter MasterTutorial ID
        return redirect()->route('MasterTutorial.DetailTutorial.index', $MasterTutorial->id)
                         ->with('success', 'Detail tutorial berhasil diperbarui.');
    }
    
}
