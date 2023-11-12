<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PorductController extends Controller
{
    public function getProduct(){
        $data = Product::paginate(20);
        return \response()->json([
            "success" => true,
            "data" => $data,
        ]);
    }

    public function createProduct(Request $request) {
        $validate = $request->validate([
            // 'name' => 'required|unique:products|'
            'nama' => 'required',
            'jumlah' => 'required'
        ]);

        Product::create([
            'nama' => $request->nama,
            'jumlah' => $request->jumlah
        ]);
        return \response()->json([
            "success" => true
        ]);
    }

    public function updatePorduct(Request $request, $id){
        $data = Product::findorfail($id);

        $validate = $request->valdate([
            // 'name' => 'required|unique:products|'
            'nama' => 'required',
            'stock' => 'required'
        ]);

        Product::create([
            'nama' => $validate->nama,
            'stock' => $validate->stock
        ]);
        return \response()->json([
            "success" => true
        ]);
    }
}
