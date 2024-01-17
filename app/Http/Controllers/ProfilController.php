<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        return view('profil.index');
    }
    public function update($id, Request $request)
    {
        Profil::where('id', $id)->update([
            'nama' => $request->nama,
            'github' => $request->github,
            'foto' => $request->foto,
            'profesi' => $request->profesi,
            'profesi_detail' => $request->profesi_detail
        ]);
        return response()->json(['message' => 'Berhasil mengubah foto'], 200);
    }

    public function getData()
    {
        $data = Profil::first();
        return response()->json($data);
    }
}
