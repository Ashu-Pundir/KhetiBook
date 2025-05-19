<?php

namespace App\Http\Controllers;


use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    public function createPDF(){
        $user = Auth::user();
        if (!$user) {
            return back()->with('message', 'Authenticated user not found. Please log in.');
        }
        $crops = $user->crops;

        $pdf = Pdf::loadView('pdf.crops', compact(['crops', 'user']));
        // return view('pdf.crops', compact('crops'));
        return $pdf->download('crop_report.pdf');
    }
}
