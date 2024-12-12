<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswas',
            'jurusan' => 'required',
        ]);

        $mahasiswa = Mahasiswa::create($data);
        return response()->json(['message' => 'Mahasiswa created', 'data' => $mahasiswa]);
    }

    public function read()
    {
        $mahasiswas = Mahasiswa::all();
        return response()->json($mahasiswas);
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());
        return response()->json(['message' => 'Mahasiswa updated', 'data' => $mahasiswa]);
    }

    public function delete($id)
    {
        Mahasiswa::destroy($id);
        return response()->json(['message' => 'Mahasiswa deleted']);
    }
}
