<?php

namespace App\Http\Controllers;

use App\Models\Rw;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class RwController extends Controller
{
    public function index()
    {
        $rw = rw::with('kelurahan')->get();
        return view('admin.rw.index',compact('rw'));
    }

    public function create()
    {
        $kelurahan = Kelurahan::all();
        return view('admin.rw.create',compact('kelurahan'));
    }

    public function store(Request $request)
    {
        $rw = new rw();
        $rw->id_kelurahan = $request->id_kelurahan;
        $rw->nama_rw = $request->nama_rw;
        $rw->save();
        return redirect()->route('rw.index')->with(['success'=>'data berhasil disimpan']);
    }

    public function show($id)
    {
        $rw = rw::findOrFail($id);
        return view('admin.rw.show',compact('rw'));
    }


    public function edit($id)
    {
        $kelurahan = Kelurahan::all();
        $rw = rw::findOrFail($id);
        return view('admin.rw.edit',compact('rw','kelurahan'));
    }


    public function update(Request $request, $id)
    {
        $rw = rw::findOrFail($id);
        $rw->id_kelurahan = $request->id_kelurahan;
        $rw->nama_rw = $request->nama_rw;
        $rw->save();
        return redirect()->route('rw.index')->with(['success'=>'data berhasil di edit']);
    }

    public function destroy($id)
    {
        $rw = rw::findOrFail($id);
        $rw->delete();
        return redirect()->route('rw.index')->with(['success'=>'data berhasil di hapus']);
    }
}

