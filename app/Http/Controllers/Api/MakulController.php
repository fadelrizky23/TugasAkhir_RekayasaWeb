<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Makul;
use Illuminate\Http\Request;

class MakulController extends Controller
{
    // CREATE
    public function create(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'kode' => 'required|unique:makuls',
            'sks' => 'required|integer',
        ]);

        $makul = Makul::create($data);
        return response()->json(['message' => 'Makul created', 'data' => $makul]);
    }

    // READ
    public function read()
    {
        $makuls = Makul::all();
        return response()->json($makuls);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $makul = Makul::findOrFail($id);
        $makul->update($request->all());
        return response()->json(['message' => 'Makul updated', 'data' => $makul]);
    }

    // DELETE
    public function delete($id)
    {
        Makul::destroy($id);
        return response()->json(['message' => 'Makul deleted']);
    }
}
