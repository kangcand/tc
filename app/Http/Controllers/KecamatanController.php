<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kota;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index()
    {
        $kecamatan = Kecamatan::with('kota')->get();
        return view('admin.kecamatan.index',compact('kecamatan'));
    }

    public function create()
    {
        $kota = Kota::all();
        return view('admin.kecamatan.create',compact('kota'));
    }

    public function store(Request $request)
    {
        $kecamatan = new kecamatan();
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')->with(['success'=>'data berhasil disimpan']);
    }

    public function show($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        return view('admin.kecamatan.show',compact('kecamatan'));
    }


    public function edit($id)
    {
        $kota = Kota::all();
        $kecamatan = Kecamatan::findOrFail($id);
        return view('admin.kecamatan.edit',compact('kecamatan','kota'));
    }


    public function update(Request $request, $id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')->with(['success'=>'data berhasil di edit']);
    }

    public function destroy($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->delete();
        return redirect()->route('kecamatan.index')->with(['success'=>'data berhasil di hapus']);
    }
}
