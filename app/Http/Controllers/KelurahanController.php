<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function index()
    {
        $kelurahan = Kelurahan::with('kecamatan')->get();
        return view('admin.kelurahan.index',compact('kelurahan'));
    }

    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('admin.kelurahan.create',compact('kecamatan'));
    }

    public function store(Request $request)
    {
        $kelurahan = new kelurahan();
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->save();
        return redirect()->route('kelurahan.index')->with(['success'=>'data berhasil disimpan']);
    }

    public function show($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        return view('admin.kelurahan.show',compact('kelurahan'));
    }


    public function edit($id)
    {
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::findOrFail($id);
        return view('admin.kelurahan.edit',compact('kelurahan','kecamatan'));
    }


    public function update(Request $request, $id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->save();
        return redirect()->route('kelurahan.index')->with(['success'=>'data berhasil di edit']);
    }

    public function destroy($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->delete();
        return redirect()->route('kelurahan.index')->with(['success'=>'data berhasil di hapus']);
    }
}
