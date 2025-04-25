<?php

namespace App\Http\Controllers;

use App\Models\MasterTutorial;
use App\Models\DetailTutorial;

class PresentationController extends Controller
{
    public function show($slug)
    {
        // Cari tutorial berdasarkan slug pada URL presentation
        $tutorial = MasterTutorial::where('url_presentation', 'like', "%$slug")->firstOrFail();

        // Ambil detail tutorial dengan status "show" dan urutan yang benar
        $details = DetailTutorial::where('master_tutorial_id', $tutorial->id)
                    ->where('status', 'show')
                    ->orderBy('order')
                    ->get();

        return view('presentation.show', compact('tutorial', 'details'));
    }
}
