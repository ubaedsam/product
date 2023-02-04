<?php

namespace App\Http\Controllers;

use App\Http\Resources\KategorisResource;
use App\Models\Kategoris;
use Illuminate\Http\Request;

class KategorisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategoris::paginate(5);

        return response()->json([
            'kategoris' => $kategoris,
            'message' => 'Berhasil menampilkan semua data kategori'
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
            'nama' => 'required',
            'deskripsi' => 'required'
        ]);

        $kategoris = new Kategoris();
        $kategoris->nama = $request->nama;
        $kategoris->deskripsi = $request->deskripsi;
        if($kategoris->save())
        {
            return response()->json([
                'kategoris' => $kategoris,
                'message' => 'Kategori berhasil ditambahkan'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategoris  $kategoris
     * @return \Illuminate\Http\Response
     */
    public function show(Kategoris $kategoris, $id)
    {
        $kategoris = Kategoris::findOrFail($id);
        
        return response()->json([
            'kategoris' => $kategoris,
            'message' => 'Berhasil menampilkan satu data lengkap kategori'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategoris  $kategoris
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategoris $kategoris)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategoris  $kategoris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategoris $kategoris, $id)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required'
        ]);

        $kategoris = Kategoris::findOrFail($id);
        $kategoris->nama = $request->nama;
        $kategoris->deskripsi = $request->deskripsi;
        if($kategoris->save())
        {
            return response()->json([
                'kategoris' => $kategoris,
                'message' => 'Kategori berhasil diubah'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategoris  $kategoris
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategoris $kategoris, $id)
    {
        $kategoris = Kategoris::findOrFail($id);
        if($kategoris->delete())
        {
            return response()->json([
                'kategoris' => $kategoris,
                'message' => 'Kategori berhasil dihapus'
            ]);
        }
    }
}
