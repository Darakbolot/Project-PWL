<?php

namespace App\Http\Controllers;

use App\Models\MasterTutorial;
use App\Models\DetailTutorial;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PresentationController extends Controller
{
    // Tampilkan presentasi biasa dalam HTML (hanya "show")
    public function show($slug)
    {
        $tutorial = MasterTutorial::where('url_presentation', 'like', "%$slug")->firstOrFail();

        $details = DetailTutorial::where('master_tutorial_id', $tutorial->id)
                    ->where('status', 'show')
                    ->orderBy('order')
                    ->get();

        return view('presentation.show', compact('tutorial', 'details'));
    }

    public function finished($slug)
    {
        $tutorial = MasterTutorial::where('url_finished', 'like', "%$slug")->firstOrFail();

        $details = DetailTutorial::where('master_tutorial_id', $tutorial->id)
                    ->orderBy('order')
                    ->get();

        return view('presentation.finished', compact('tutorial', 'details'));
    }

    public function downloadPdf($slug)
    {
        $tutorial = MasterTutorial::where('url_finished', 'like', "%$slug")->firstOrFail();

        $details = DetailTutorial::where('master_tutorial_id', $tutorial->id)
                    ->orderBy('order')
                    ->get();

        $pdf = Pdf::loadView('presentation.downloadPdf', compact('tutorial', 'details'));

        return $pdf->download('tutorial_' . $tutorial->id . '.pdf');
    }

}
