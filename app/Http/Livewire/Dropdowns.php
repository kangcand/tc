<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Rw;
use App\Models\Kasus;

class Dropdowns extends Component
{
    public $provinsis;
    public $kotas;
    public $kecamatans;
    public $kelurahans;
    public $rws;

    public $selectedProvinsi = null;
    public $selectedKota = null;
    public $selectedKecamatan = null;
    public $selectedKelurahan = null;
    public $selectedRw = null;

    public function mount($selectedRw = null)
    {
        $this->provinsis = Provinsi::all();
        $this->kotas = collect();
        $this->kecamatans = collect();
        $this->kelurahans = collect();
        $this->rws = collect();
        $this->selectedRw = $selectedRw;

        if(!is_null($selectedRw))
        {
            $rw = Rw::with('kelurahan.kecamatan.kota.provinsi')->find($selectedRw);
            if($rw)
            {
                $this->rws = RW::where('id_kelurahan', $rw->id_kelurahan)->get();
                $this->kelurahans = Kelurahan::where('id_kecamatan',$rw->kelurahan->id_kecamatan)->get();
                $this->kecamatans = Kecamatan::where('id_kota',$rw->kelurahan->kecamatan->id_kota)->get();
                $this->kotas = Kota::where('id_provinsi',$rw->kelurahan->kecamatan->kota->id_provinsi)->get();
                $this->SelectedProvinsi = $rw->kelurahan->kecamatan->kota->id_provinsi;
                $this->SelectedKota = $rw->kelurahan->kecamatan->id_kota;
                $this->SelectedKecamatan = $rw->kelurahan->id_kecamatan;
                $this->SelectedKelurahan = $rw->id_kelurahan;
            }
        }
    }

    public function render()
    {
        return view('livewire.dropdowns');
    }

    public function updatedSelectedProvinsi($provinsi)
    {
        $this->kotas = Kota::where('id_provinsi', $provinsi)->get();
        // $this->selectedKota = null;
        // $this->selectedKecamatan = null;
        // $this->selectedKelurahan = null;
        // $this->selectedRw = null;
    }

    public function updatedSelectedKota($kota)
    {
        $this->kecamatans = Kecamatan::where('id_kota', $kota)->get();
        // $this->selectedKecamatan = null;
        // $this->selectedKelurahan = null;
        // $this->selectedRw = null;
    }

    public function updatedSelectedKecamatan($kecamatan)
    {
        $this->kelurahans = Kelurahan::where('id_kecamatan', $kecamatan)->get();
        // $this->selectedKelurahan = null;
        // $this->selectedRw = null;

    }

    public function updatedSelectedKelurahan($kelurahan)
    {
        if (!is_null($kelurahan)) {
            $this->rws = Rw::where('id_kelurahan', $kelurahan)->get();
        } else {
            $this->selectedRw = null;
        }
    }

}
