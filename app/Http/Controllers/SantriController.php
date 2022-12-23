<?php

namespace App\Http\Controllers;

use App\DataTables\AuthenticationLogDataTable;
use App\DataTables\SantriDataTable;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SantriController extends Controller
{
    public function index(SantriDataTable $datatable)
    {
        $breadcrumbs = [['url' => '', 'title' => 'Santri']];

        return $datatable->render('santri.index', compact('breadcrumbs'));
    }

    public function create()
    {
        $breadcrumbs = [['url' => route('santri.index'), 'title' => 'Santri'], ['title' => 'Tambah']];

        return view('santri.create', compact('breadcrumbs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:santris',
            'nama' => 'required|max:50',
            'alamat' => 'required',
        ]);

        Santri::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect()->route('santri.index');
    }

    public function show(Santri $santri)
    {
        $breadcrumbs = [['url' => route('santri.index'), 'title' => 'Santri'], ['title' => 'Detail '.$santri->nama]];

        return view('santri.show', compact('user', 'breadcrumbs'));
    }

    public function edit(Santri $santri)
    {
        $breadcrumbs = [['url' => route('santri.index'), 'title' => 'Santri'], ['title' => 'Edit '.$santri->nama]];

        return view('santri.edit', compact('santri', 'breadcrumbs'));
    }

    public function update(Request $request, Santri $santri)
    {
        $validated = $request->validate([
            'nik' => 'required|unique:santris,nik,'.$santri->id,
            'nama' => 'required|max:50',
            'alamat' => 'required',
        ]);

        $santri->update($validated);

        return redirect()->route('santri.index');
    }

    public function destroy(Santri $santri)
    {
        if ($santri->delete()) {
            return response()->json(['success' => true, 'redirect' => route('santri.index')]);
        }

        return response()->json(['message' => 'Data sedang digunakan'], 400);
    }

}
