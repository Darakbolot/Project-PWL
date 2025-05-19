<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterTutorial;

class TutorialApiController extends Controller
{
    public function listByCourse($kode_matkul)
    {
        $tutorials = MasterTutorial::with('user')
            ->where('kode_matkul', $kode_matkul)
            ->orderBy('kode_matkul')
            ->get()
            ->map(function ($tutorial) {
                return [
                    'judul' => $tutorial->judul,
                    'kode_matkul' => $tutorial->kode_matkul,
                    'url_presentation' => $tutorial->url_presentation,
                    'url_finished' => $tutorial->url_finished,
                    'creator_email' => optional($tutorial->user)->email,
                    'created_at' => $tutorial->created_at->toDateTimeString(),
                    'updated_at' => $tutorial->updated_at->toDateTimeString(),
                ];
            });

        return response()->json([
            'status' => 'success',
            'kode_matkul' => $kode_matkul,
            'data' => $tutorials,
        ]);
    }
}
