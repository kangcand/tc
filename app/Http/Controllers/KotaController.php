<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KotaController extends Controller
{

    public function index()
    {
        $kota = Kota::with('provinsi')->get();
        return view('admin.kota.index',compact('kota'));
    }

    public function create()
    {
        $provinsi = Provinsi::all();
        return view('admin.kota.create',compact('provinsi'));
    }

    public function store(Request $request)
    {
        $kota = new Kota();
        $kota->id_provinsi = $request->id_provinsi;
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->save();
        return redirect()->route('kota.index')->with(['success'=>'data berhasil disimpan']);
    }

    public function show($id)
    {
        $kota = Kota::findOrFail($id);
        return view('admin.kota.show',compact('kota'));
    }


    public function edit($id)
    {
        $provinsi = Provinsi::all();
        $kota = Kota::findOrFail($id);
        return view('admin.kota.edit',compact('kota','provinsi'));
    }


    public function update(Request $request, $id)
    {
        $kota = Kota::findOrFail($id);
        $kota->id_provinsi = $request->id_provinsi;
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->save();
        return redirect()->route('kota.index')->with(['success'=>'data berhasil di edit']);
    }

    public function destroy($id)
    {
        $kota = Kota::findOrFail($id);
        $kota->delete();
        return redirect()->route('kota.index')->with(['success'=>'data berhasil di hapus']);
    }
}
