<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        return response()->json(Produk::with('kategori')->get(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'nama_produk' => 'required|string',
            'harga'       => 'required|integer',
            'stok'        => 'required|integer',
        ]);

        $produk = Produk::create($request->all());
        return response()->json($produk, 201);
    }

    public function show($id)
    {
        $produk = Produk::with('kategori')->findOrFail($id);
        return response()->json($produk, 200);
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $request->validate([
            'kategori_id' => 'sometimes|required|exists:kategoris,id',
            'nama_produk' => 'sometimes|required|string',
            'harga'       => 'sometimes|required|integer',
            'stok'        => 'sometimes|required|integer',
        ]);

        $produk->update($request->all());
        return response()->json($produk, 200);
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return response()->json(null, 204);
    }
}