<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Rap2hpoutre\FastExcel\FastExcel;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('livewire.view.list-Products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('livewire.view.create-Product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'stock_max' => 'required|string',
            'stock_min' => 'required|string',
            'date' => 'required|date',
        ]);

        Product::create($validate);

        return redirect()->route('products.index')->with('success', 'Producto creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('livewire.view.edit-Product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validate = $request->validate([
            'name' => 'nullable|string',
            'cateogory' => 'nullable|string',
            'stock_max' => 'nullable|string',
            'stock_min' => 'nullable|string',
            'date' => 'nullable|date',
        ]);

        $product->update($validate);

        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente');
    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function voyAllorar()
    {
        $products = Product::all();

        $fileName = 'products.xlsx';
        $filePath = storage_path('app/public/excel/'.$fileName);

        // Exportar los datos
        (new FastExcel($products))->export($filePath);

        // Descargar el archivo
        return response()->download($filePath)->deleteFileAfterSend(false);
    }
}
