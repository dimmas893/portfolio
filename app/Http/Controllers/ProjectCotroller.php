<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectCotroller extends Controller
{
    public function index()
    {
        return view('project.index');
    }
    public function update(Request $request)
    {
        // return $request->all();
        Project::where('id', $request->id)->update([
            'nama' => $request->nama,
            'stack' => $request->stack,
            'foto' => $request->foto,
            'link' => $request->link,
        ]);
        return response()->json(['message' => 'Berhasil mengubah data'], 200);
    }
    public function getData(Request $request)
    {
        $userData = Project::query();
        if (!empty($request['search'])) {
            $search = "%" . $request['search'] . "%";
            $userData->orWhere('nama', 'like', $search);
        }
        $userData->orderBy('id', 'DESC');
        $user = $userData->paginate($request['perPage']);
        return response()->json($user);
    }
    public function create(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'stack' => 'required',
            'foto' => 'required',
            'link' => 'required',
        ];
        $customMessages = [
            'nama.required' => 'Nama harus diisi.',
            'stack.required' => 'Stack harus diisi.',
            'foto.required' => 'Foto harus diisi.',
            'link.required' => 'link harus diisi.',
        ];

        $request->validate($rules, $customMessages);

        Project::create([
            'nama' => $request->nama,
            'stack' => $request->stack,
            'foto' => $request->foto,
            'link' => $request->link,
        ]);
        return response()->json(['message' => 'Berhasil menambah foto'], 200);
    }
    public function delete($id)
    {
        Project::where('id', $id)->delete();
        return response()->json(['message' => 'Berhasil menghapus data'], 200);
    }
}
