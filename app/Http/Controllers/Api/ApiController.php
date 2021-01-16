<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provinsi;

class ApiController extends Controller
{
    public function provinsi()
    {
        $provinsi = Provinsi::all();
        $data = [
            'status' => 200,
            'data'  => $provinsi,
            'message' => 'berhasil'
        ];
        return response()->json($data);
    }

    public function provinsixkota($id)
    {
        $provinsi = Provinsi::with('kota')->where('id',$id)->get();
        $data = [
            'status' => 200,
            'data'  => $provinsi,
            'message' => 'berhasil'
        ];
        return response()->json($data);
    }
}
