<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Http;

class ApiController extends Controller
{
    public $data = [];

    function global () {

        $response = Http::get('https://api.kawalcorona.com/')->json();
        // dd($response);
        foreach ($response as $data => $val) {
            $raw = $val['attributes'];
            $res = [
                'Negara' => $raw['Country_Region'],
                'Positif' => $raw['Confirmed'],
                'Sembuh' => $raw['Recovered'],
                'Meninggal' => $raw['Deaths'],

            ];
            array_push($this->data, $res);
        }

        $data = [
            'success' => true,
            'data' => $this->data,
            'message' => 'Berhasil',
        ];

        return response()->json($data, 200);

    }

    public function indonesia()
    {
        $positif = DB::table('kasuses')
            ->sum('kasuses.positif');

        $sembuh = DB::table('kasuses')
            ->sum('kasuses.sembuh');

        $meninggal = DB::table('kasuses')
            ->sum('kasuses.meninggal');

        $this->data = [
            'name' => 'Indonesia',
            'positif' => $positif,
            'sembuh' => $sembuh,
            'meninggal' => $meninggal,
        ];

        $data = [
            'success' => true,
            'data' => $this->data,
            'message' => 'berhasil',
        ];
        return response()->json($data, 200);
    }

    public function allProvinsi()
    {
        $allDay = DB::table('provinsis')
            ->select('provinsis.nama_provinsi', 'provinsis.kode_provinsi',
                DB::raw('sum(kasuses.positif) as positif'),
                DB::raw('sum(kasuses.sembuh) as sembuh'),
                DB::raw('sum(kasuses.meninggal) as meninggal'))
            ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')
            ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
            ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
            ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
            ->groupBy('provinsis.id')
            ->get();

        $today = DB::table('provinsis')
            ->select('provinsis.nama_provinsi', 'provinsis.kode_provinsi',
                DB::raw('sum(kasuses.positif) as positif'),
                DB::raw('sum(kasuses.sembuh) as sembuh'),
                DB::raw('sum(kasuses.meninggal) as meninggal'))
            ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')
            ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
            ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
            ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
            ->whereDate('kasuses.tanggal', Carbon::today())
            ->groupBy('provinsis.id')
            ->get();
        $data = [
            'success' => true,
            'data' => [
                ['hari_ini' => $today,
                    'total' => $allDay],
            ],
            'message' => 'berhasil',
        ];
        return response()->json($data, 200);
    }

    public function getProvinsi($id)
    {
        $allDay = DB::table('provinsis')
            ->select('provinsis.nama_provinsi', 'provinsis.kode_provinsi', DB::raw('sum(kasuses.positif) as positif'),
                DB::raw('sum(kasuses.sembuh) as sembuh'), DB::raw('sum(kasuses.meninggal) as meninggal'))
            ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')
            ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
            ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
            ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
            ->where('provinsis.id', $id)
            ->first();

        $today = DB::table('provinsis')
            ->select('provinsis.nama_provinsi', 'provinsis.kode_provinsi', DB::raw('sum(kasuses.positif) as positif'),
                DB::raw('sum(kasuses.sembuh) as sembuh'), DB::raw('sum(kasuses.meninggal) as meninggal'))
            ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')
            ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
            ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
            ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
            ->where('provinsis.id', $id)->whereDate('kasuses.tanggal', Carbon::today())
            ->first();
        $data = [
            'success' => true,
            'data' => [
                ['hari_ini' => $today,
                    'total' => $allDay],
            ],
            'message' => 'berhasil',
        ];
        return response()->json($data, 200);
    }

    public function kota()
    {
        $allDay = DB::table('kotas')
            ->select('kotas.nama_kota', 'kotas.kode_kota',
                DB::raw('sum(kasuses.positif) as positif'),
                DB::raw('sum(kasuses.sembuh) as sembuh'),
                DB::raw('sum(kasuses.meninggal) as meninggal'))
        // ->join('kotas','provinsis.id','=','kotas.id_provinsi')
            ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
            ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
            ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
            ->groupBy('kotas.id')
            ->get();

        $today = DB::table('kotas')
            ->select('kotas.nama_kota', 'kotas.kode_kota',
                DB::raw('sum(kasuses.positif) as positif'),
                DB::raw('sum(kasuses.sembuh) as sembuh'),
                DB::raw('sum(kasuses.meninggal) as meninggal'))
        // ->join('kotas','provinsis.id','=','kotas.id_provinsi')
            ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
            ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
            ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
            ->whereDate('kasuses.tanggal', Carbon::today())
            ->groupBy('kotas.id')
            ->get();
        $data = [
            'success' => true,
            'data' => [
                ['hari_ini' => $today,
                    'total' => $allDay],
            ],
            'message' => 'berhasil',
        ];
        return response()->json($data, 200);
    }

    public function singleKota($id)
    {
        $allDay = DB::table('kotas')
            ->select('kotas.nama_kota', 'kotas.kode_kota', DB::raw('sum(kasuses.positif) as positif'),
                DB::raw('sum(kasuses.sembuh) as sembuh'), DB::raw('sum(kasuses.meninggal) as meninggal'))
        // ->join('kotas','kotas.id','=','kotas.id_kota')
            ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
            ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
            ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
            ->where('kotas.id', $id)
            ->first();

        $today = DB::table('kotas')
            ->select('kotas.nama_kota', 'kotas.kode_kota', DB::raw('sum(kasuses.positif) as positif'),
                DB::raw('sum(kasuses.sembuh) as sembuh'), DB::raw('sum(kasuses.meninggal) as meninggal'))
        // ->join('kotas','kotas.id','=','kotas.id_kota')
            ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
            ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
            ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
            ->where('kotas.id', $id)->whereDate('kasuses.tanggal', Carbon::today())
            ->first();
        $data = [
            'success' => true,
            'data' => [
                ['hari_ini' => $today,
                    'total' => $allDay],
            ],
            'message' => 'berhasil',
        ];
        return response()->json($data, 200);
    }

    public function positif()
    {
        $positif = DB::table('kasuses')
            ->select('kasuses.positif')
            ->sum('kasuses.positif');
        // dd($positif);
        $this->data = [
            'name' => 'Total Positif',
            'value' => $positif,
        ];

        $data = [
            'success' => true,
            'data' => $this->data,
            'message' => 'berhasil',
        ];
        return response()->json($data, 200);
    }

    public function sembuh()
    {
        $sembuh = DB::table('kasuses')
            ->select('kasuses.sembuh')
            ->sum('kasuses.sembuh');
        // dd($sembuh);
        $this->data = [
            'name' => 'Total Sembuh',
            'value' => $sembuh,
        ];

        $data = [
            'success' => true,
            'data' => $this->data,
            'message' => 'berhasil',
        ];
        return response()->json($data, 200);
    }

    public function meninggal()
    {
        $meninggal = DB::table('kasuses')
        // ->select('kasuses.meninggal')
            ->sum('kasuses.meninggal');
        // dd($meninggal);
        $this->data = [
            'name' => 'Total Meninggal',
            'value' => $meninggal,
        ];

        $data = [
            'success' => true,
            'data' => $this->data,
            'message' => 'berhasil',
        ];
        return response()->json($data, 200);
    }
}
