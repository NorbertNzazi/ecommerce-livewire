<?php

namespace App\Http\Controllers\PDF;

use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order as ModelsOrder;
use Illuminate\Support\Facades\View;

class Order extends Controller
{
    //
    public function render(Request $request)
    {
        $dompdf = new Dompdf();

        $order = ModelsOrder::find(intval($request->id));

        $dompdf->loadHtml(View::make('pdf.order', [
            'amount' => $order->amount,
            'customer' => $order->user,
            'date' => $order->created_at,
            'products' => $order->orderItems
        ])->render());

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        return $dompdf->stream();
    }
}
