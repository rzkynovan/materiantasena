<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lomba;

class LombaController extends Controller
{
    public function index()
    {
        $data = Lomba::paginate(20);
        return \response()->json([
            "success" => true,
            "data" => $data,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'categories' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,png'
        ]);

        Lomba::create([
            'name' => $request->name,
            'categories' => $request->categories,
            'description' => $request->description,
            'image' => $request->image,
            'is_favorite' => $request->is_favorite,
            'is_remind'=>$request->is_remind
        ]);

        return \response()->json([
            "success" => true,
        ]);


    }
    public function destroy(string $id)
    {
        $delete = Lomba::findorfail($id);
        $image = $delete-> image;
        if (file_exists($image)) {
            @unlink($image);
        }
        $delete->delete($image);
        return \response()->json([
            "success" => true,
        ]);
    }
}
