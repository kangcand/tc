<?php

namespace App\Http\Controllers;

use DB;
use Http;

class AdminController extends Controller
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

        return view('admin.index', compact('provinsi', 'sembuh', 'meninggal', 'global', 'positif', 'casesSembuh', 'casesPositif', 'casesMeninggal', 'casesTanggal'));
    }
}
