<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use App\Models\Rw;
use Illuminate\Http\Request;

class KasusController extends Controller
{
    public function index()
    {
        $kasus = Kasus::with('rw.kelurahan.kecamatan.kota.provinsi')->orderBy('id','DESC')->get();
        // dd($kasus);
        return view('admin.kasus.index',compact('kasus'));
    }

    public function create()
    {
        $rw = Rw::all();
        return view('admin.kasus.create',compact('rw'));
    }

    public function store(Request $request)
    {
        $kasus = new kasus();
        $kasus->id_rw = $request->id_rw;
        $kasus->reaktif = $request->reaktif;
        $kasus->positif = $request->positif;
        $kasus->sembuh = $request->sembuh;
        $kasus->meninggal = $request->meninggal;
        $kasus->tanggal = $request->tanggal;
        $kasus->save();
        return redirect()->route('kasus.index')->with(['success'=>'data berhasil disimpan']);
    }

    public function show($id)
    {
        $kasus = Kasus::findOrFail($id);
        return view('admin.kasus.show',compact('kasus'));
    }


    public function edit($id)
    {
        $rw = Rw::all();
        $kasus = Kasus::findOrFail($id);
        return view('admin.kasus.edit',compact('kasus','rw'));
    }


    public function update(Request $request, $id)
    {
        $kasus = Kasus::findOrFail($id);
        $kasus->id_rw = $request->id_rw;
        $kasus->reaktif = $request->reaktif;
        $kasus->positif = $request->positif;
        $kasus->sembuh = $request->sembuh;
        $kasus->meninggal = $request->meninggal;
        $kasus->tanggal = $request->tanggal;
        $kasus->save();
        return redirect()->route('kasus.index')->with(['success'=>'data berhasil di edit']);
    }

    public function destroy($id)
    {
        $kasus = Kasus::findOrFail($id);
        $kasus->delete();
        return redirect()->route('kasus.index')->with(['success'=>'data berhasil di hapus']);
    }
}
