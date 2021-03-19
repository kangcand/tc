<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Provinsi;
use DB;
use Http;

class FrontController extends Controller
{
    public function index()
    {
        $global = Http::get('https://api.kawalcorona.com/')->json();
        $positif = DB::table('kasuses')
            ->sum('kasuses.positif');

        $sembuh = DB::table('kasuses')
            ->sum('kasuses.sembuh');

        $meninggal = DB::table('kasuses')
            ->sum('kasuses.meninggal');

        $provinsi = DB::table('provinsis')
            ->select('provinsis.id', 'provinsis.nama_provinsi', 'provinsis.kode_provinsi',
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

        // chart
        $casesSembuh = DB::table('kasuses')
            ->select(
                DB::raw('sum(kasuses.sembuh) as sembuh'), )
            ->orderBy('kasuses.tanggal')
            ->groupBy('kasuses.tanggal')->pluck('sembuh');
        $casesPositif = DB::table('kasuses')
            ->select(
                DB::raw('sum(kasuses.positif) as positif'), )
            ->orderBy('kasuses.tanggal')
            ->groupBy('kasuses.tanggal')->pluck('positif');

        $casesMeninggal = DB::table('kasuses')
            ->select(
                DB::raw('sum(kasuses.meninggal) as meninggal'), )
            ->orderBy('kasuses.tanggal')
            ->groupBy('kasuses.tanggal')->pluck('meninggal');
        $casesTanggal = DB::table('kasuses')
            ->select(
                DB::raw('kasuses.tanggal'), )
            ->orderBy('kasuses.tanggal')
            ->groupBy('kasuses.tanggal')->pluck('tanggal');

        // ->get();
        // $casesChart = json_decode($casesChart);
        // dd(($casesTanggal));

        return view('index', compact('provinsi', 'sembuh', 'meninggal', 'positif', 'global', 'casesSembuh', 'casesPositif', 'casesMeninggal', 'casesTanggal'));
    }

    public function about()
    {

    }

    public function getKotaProvinsi($id)
    {

        $positif = DB::table('kotas')
            ->select('kotas.nama_kota', 'kotas.kode_kota',
                DB::raw('sum(kasuses.positif) as positif'),
                DB::raw('sum(kasuses.sembuh) as sembuh'),
                DB::raw('sum(kasuses.meninggal) as meninggal'))
            ->join('provinsis', 'provinsis.id', '=', 'kotas.id_provinsi')
            ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
            ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
            ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
            ->where('provinsis.id', $id)
            ->groupBy('kotas.id')
            ->sum('kasuses.positif');

        $sembuh = DB::table('kotas')
            ->select('kotas.nama_kota', 'kotas.kode_kota',
                DB::raw('sum(kasuses.positif) as positif'),
                DB::raw('sum(kasuses.sembuh) as sembuh'),
                DB::raw('sum(kasuses.meninggal) as meninggal'))
            ->join('provinsis', 'provinsis.id', '=', 'kotas.id_provinsi')
            ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
            ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
            ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
            ->where('provinsis.id', $id)
            ->groupBy('kotas.id')
            ->sum('kasuses.sembuh');

        $meninggal = DB::table('kotas')
            ->select('kotas.nama_kota', 'kotas.kode_kota',
                DB::raw('sum(kasuses.positif) as positif'),
                DB::raw('sum(kasuses.sembuh) as sembuh'),
                DB::raw('sum(kasuses.meninggal) as meninggal'))
            ->join('provinsis', 'provinsis.id', '=', 'kotas.id_provinsi')
            ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
            ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
            ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
            ->where('provinsis.id', $id)
            ->groupBy('kotas.id')
            ->sum('kasuses.meninggal');

        $datas = DB::table('kotas')
            ->select('kotas.id', 'kotas.nama_kota', 'kotas.kode_kota',
                DB::raw('sum(kasuses.positif) as positif'),
                DB::raw('sum(kasuses.sembuh) as sembuh'),
                DB::raw('sum(kasuses.meninggal) as meninggal'))
            ->join('provinsis', 'provinsis.id', '=', 'kotas.id_provinsi')
            ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
            ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
            ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
            ->where('provinsis.id', $id)
            ->groupBy('kotas.id')
            ->get();
        // dd($positif);
        $provinsi = Provinsi::findOrFail($id);
        return view('singleProvinsi', compact('datas', 'sembuh', 'meninggal', 'positif', 'provinsi'));
    }

    public function getKecamatanKota($id)
    {

        $positif = DB::table('kecamatans')
            ->select('kecamatans.nama_kecamatan',
                DB::raw('sum(kasuses.positif) as positif'),
                DB::raw('sum(kasuses.sembuh) as sembuh'),
                DB::raw('sum(kasuses.meninggal) as meninggal'))
            ->join('kotas', 'kotas.id', '=', 'kecamatans.id_kota')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
            ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
            ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
            ->where('kotas.id', $id)
            ->groupBy('kecamatans.id')
            ->sum('kasuses.positif');

        $sembuh = DB::table('kotas')
            ->select('kecamatans.nama_kecamatan',
                DB::raw('sum(kasuses.positif) as positif'),
                DB::raw('sum(kasuses.sembuh) as sembuh'),
                DB::raw('sum(kasuses.meninggal) as meninggal'))
        // ->join('provinsis','provinsis.id','=','kotas.id_provinsi')
            ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
            ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
            ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
            ->where('kotas.id', $id)
            ->groupBy('kecamatans.id')
            ->sum('kasuses.sembuh');

        $meninggal = DB::table('kotas')
            ->select('kecamatans.nama_kecamatan',
                DB::raw('sum(kasuses.positif) as positif'),
                DB::raw('sum(kasuses.sembuh) as sembuh'),
                DB::raw('sum(kasuses.meninggal) as meninggal'))
        // ->join('provinsis','provinsis.id','=','kotas.id_provinsi')
            ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
            ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
            ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
            ->where('kotas.id', $id)
            ->groupBy('kecamatans.id')
            ->sum('kasuses.meninggal');

        $datas = DB::table('kecamatans')
            ->select('kecamatans.nama_kecamatan',
                DB::raw('sum(kasuses.positif) as positif'),
                DB::raw('sum(kasuses.sembuh) as sembuh'),
                DB::raw('sum(kasuses.meninggal) as meninggal'))
            ->join('kotas', 'kotas.id', '=', 'kecamatans.id_kota')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
            ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
            ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
            ->where('kotas.id', $id)
            ->groupBy('kecamatans.id')
            ->get();
        // dd($positif);
        $kota = Kota::findOrFail($id);
        return view('singleKota', compact('datas', 'sembuh', 'meninggal', 'positif', 'kota'));
    }
}
