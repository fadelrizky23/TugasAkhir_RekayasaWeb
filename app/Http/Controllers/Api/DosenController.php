<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    // CREATE
    public function create(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'nidn' => 'required|unique:dosens',
            'prodi' => 'required',
        ]);

        $dosen = Dosen::create($data);
        return response()->json(['message' => 'Dosen created', 'data' => $dosen]);
    }

    // READ
    public function read()
    {
        $dosens = Dosen::all();
        return response()->json($dosens);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->update($request->all());
        return response()->json(['message' => 'Dosen updated', 'data' => $dosen]);
    }

    // DELETE
    public function delete($id)
    {
        Dosen::destroy($id);
        return response()->json(['message' => 'Dosen deleted']);
    }
}
