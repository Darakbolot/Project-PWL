<?php

namespace App\Http\Controllers;
use App\Models\MasterTutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MasterTutorialController extends Controller
{
    public function index()
    {
        $tutorials = MasterTutorial::all();
        $matkul = $this->getMatkul(); // Tambahkan ini untuk ambil dari webservice   
        return view('tutorial.index', compact('tutorials', 'matkul'));
    }

    public function create()
    {
        $matkul = $this->getMatkul();
        return view('tutorial.create', compact('matkul'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'kode_matkul' => 'required|string',
            'url_presentation' => 'required|url|unique:master_tutorials,url_presentation',
            'url_finished' => 'required|url|unique:master_tutorials,url_finished',
        ]);

        $slug = Str::slug($request->judul); // buat slug dari judul
        $random = Str::random(10); // random string
    
        // Membuat UUID untuk url_presentation
        $urlPresentation = "http://localhost:8080/presentation/{$slug}-{$random}";
        $urlFinished = "http://localhost:8080/finished/{$slug}-" . time() . Str::random(5);
    
        // Membuat dan menyimpan data tutorial
        MasterTutorial::create([
            'judul' => $request->judul,
            'kode_matkul' => $request->kode_matkul,
            'url_presentation' => $urlPresentation,
            'url_finished' => $urlFinished,
            'creator_email' => Session::get('user_email'),
        ]);
    
        return redirect()->route('MasterTutorial.index');
    }

    public function edit($id)
    {
        $tutorial = MasterTutorial::findOrFail($id);
        $matkul = $this->getMatkul();
        return view('tutorial.edit', compact('tutorial', 'matkul'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kode_matkul' => 'required|string|max:100',
            'url_presentation' => 'required|url',
            'url_finished' => 'required|url',
        ]);
    
        $tutorial = MasterTutorial::findOrFail($id);
    
        // Tambah identifier baru ke URL saat update
        $presentationFinal = $request->url_presentation . '-' . Str::uuid();
        $finishedFinal = $request->url_finished . '-' . time() . Str::random(5);
    
        $tutorial->update([
            'judul' => $request->judul,
            'kode_matkul' => $request->kode_matkul,
            'url_presentation' => $presentationFinal,
            'url_finished' => $finishedFinal,
        ]);
    
        return redirect()->route('MasterTutorial.index')->with('success', 'Tutorial berhasil diperbarui.');
    }
    

    public function destroy($id)
    {
        MasterTutorial::destroy($id);
        return redirect()->route('MasterTutorial.index');
    }

    private function getMatkul()
    {
        $token = Session::get('refreshToken');
        $response = Http::withToken($token)->get('https://jwt-auth-eight-neon.vercel.app/getMakul');

        if ($response->successful()) {
            return $response->json()['data'] ?? [];
        }

        return [];
    }
}
