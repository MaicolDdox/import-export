<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class PdfController extends Controller
{
    public function generarPdf()
    {
        $products = Product::all();
        $html = view('livewire.view.pdf.list-pdf-Product', compact('products'))->render();


        $pdfPath  = storage_path('app/public/pdf/reporte.pdf');
        Browsershot::html($html)
            ->setOption('args', ['--no-sandbox'])
            ->format('A4')
            ->margins(10, 10, 10, 10)
            ->save($pdfPath);

        return response()->download($pdfPath)->deleteFileAfterSend(false);
    }
}
