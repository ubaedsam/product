<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('kategoris')->get();

        return response()->json([
            'products' => $products,
            'message' => 'Berhasil menampilkan semua data product'
        ]);
    }

    public function allKategori($id)
    {
        $products = Product::with('kategoris')->where('kategori_id', $id)->paginate(5);

        return response()->json([
            'products' => $products,
            'message' => 'Berhasil menampilkan semua data product berdasarkan kategori idnya'
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
            'tahun_keluaran' => 'required',
            'warna' => 'required',
            'harga' => 'required|numeric',
            'kategori_id' => 'required'
        ]);

        $products = new Product();
        $products->tahun_keluaran = $request->tahun_keluaran;
        $products->warna = $request->warna;
        $products->harga = $request->harga;
        $products->kategori_id = $request->kategori_id;
        if($products->save())
        {
            return response()->json([
                'products' => $products,
                'message' => 'Product berhasil ditambahkan'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::with('kategoris')->where('id', $id)->first();

        return response()->json([
            'products' => $products,
            'message' => 'Berhasil menampilkan satu data lengkap product'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $products, $id)
    {
        $validateData = $request->validate([
            'tahun_keluaran' => 'required',
            'warna' => 'required',
            'harga' => 'required|numeric',
            'kategori_id' => 'required'
        ]);

        $products = Product::findOrFail($id);
        $products->tahun_keluaran = $request->tahun_keluaran;
        $products->warna = $request->warna;
        $products->harga = $request->harga;
        $products->kategori_id = $request->kategori_id;
        if($products->save())
        {
            return response()->json([
                'products' => $products,
                'message' => 'Product berhasil diubah'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        $products = Product::findOrFail($id);
        if($products->delete())
        {
            return response()->json([
                'products' => $products,
                'message' => 'Product berhasil dihapus'
            ]);
        }
    }
}
