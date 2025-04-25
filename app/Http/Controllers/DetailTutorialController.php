<?php

namespace App\Http\Controllers;

use App\Models\DetailTutorial;
use App\Models\MasterTutorial;
use Illuminate\Http\Request;
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


    public function edit($masterTutorialId, $detailTutorialId)
    {
        $detail = DetailTutorial::with('master')->findOrFail($detailTutorialId);
        return view('detail.edit', compact('detail'));
    }
    
    // Update DetailTutorial
    public function update(Request $request, $masterTutorialId, $detailTutorialId)
    {
        // Validasi input form
        $request->validate([
            'text' => 'required|string',
            'code' => 'required|string',
            'order' => 'required|integer',
            'status' => 'required|string|in:show,hide',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'url' => 'nullable|url',
        ]);
    
        // Cari DetailTutorial berdasarkan ID
        $detailTutorial = DetailTutorial::findOrFail($detailTutorialId);
    
        // Update DetailTutorial dengan data dari form
        $detailTutorial->text = $request->text;
        $detailTutorial->code = $request->code;
        $detailTutorial->order = $request->order;
        $detailTutorial->status = $request->status;
    
        // Jika ada gambar baru, simpan gambar
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('public/gambar');
            $detailTutorial->gambar = basename($path);
        }
    
        // Update URL jika ada
        if ($request->url) {
            $detailTutorial->url = $request->url;
        }
    
        // Simpan perubahan
        $detailTutorial->save();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('MasterTutorial.DetailTutorial.index', ['masterTutorial' => $masterTutorialId])
                         ->with('success', 'Detail Tutorial berhasil diperbarui!');
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
