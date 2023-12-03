<?php

namespace App\Http\Controllers\PDF;

use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class Receipt extends Controller
{
    //
    public function render()
    {
        $dompdf = new Dompdf();

        $dompdf->loadHtml(View::make('pdf.receipt')->render());

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}
