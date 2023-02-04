<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use App\Http\Resources\StockResource;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Menampilkan semua data stocks sebanyak 5 data per halaman
        $stocks = Stock::with('product')->get();

        return response()->json([
            'stocks' => $stocks,
            'message' => 'Berhasil menampilkan semua data stock'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'stock' => 'required',
            'product_id' => 'required'
        ]);

        $stocks = new Stock();
        $stocks->stock = $request->stock;
        $stocks->product_id = $request->product_id;
        if($stocks->save())
        {
            return response()->json([
                'stocks' => $stocks,
                'message' => 'Stock berhasil ditambahkan'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stocks = Stock::with('product')->where('id', $id)->first();

        return response()->json([
            'stocks' => $stocks,
            'message' => 'Berhasil menampilkan satu data lengkap stock'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock, $id)
    {
        $validateData = $request->validate([
            'stock' => 'required',
            'product_id' => 'required'
        ]);

        $stocks = Stock::findOrFail($id);
        $stocks->stock = $request->stock;
        $stocks->product_id = $request->product_id;
        if($stocks->save())
        {
            return response()->json([
                'stocks' => $stocks,
                'message' => 'Stock berhasil diubah'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock, $id)
    {
        $stocks = Stock::findOrFail($id);
        if($stocks->delete())
        {
            return response()->json([
                'stocks' => $stocks,
                'message' => 'Stock berhasil dihapus'
            ]);
        }
    }
}
