<div>
    <div class="form-group">
        <label for="state" class="">Provinsi</label>
        <select wire:model="selectedProvinsi" class="form-control">
            <option value="" selected>Pilih Provinsi</option>
            @foreach($provinsis as $provinsi)
                <option value="{{ $provinsi->id }}">{{ $provinsi->nama_provinsi }}</option>
            @endforeach
        </select>
    </div>

    {{-- @if (!is_null($selectedProvinsi)) --}}
        <div class="form-group">
            <label for="city" class="">Kota</label>
            <select wire:model="selectedKota" class="form-control" name="kota">
                <option value="" selected>Pilih Kota</option>
                @foreach($kotas as $kota)
                    <option value="{{ $kota->id }}">{{ $kota->nama_kota }}</option>
                @endforeach
            </select>
        </div>
    {{-- @endif --}}
    {{-- @if (!is_null($selectedKota)) --}}
        <div class="form-group">
            <label for="city" class="">Kecamatan</label>
            <select wire:model="selectedKecamatan" class="form-control" name="kota">
                <option value="" selected>Pilih Kecamatan</option>
                @foreach($kecamatans as $kecamatan)
                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                @endforeach
            </select>
        </div>
    {{-- @endif --}}
    {{-- @if (!is_null($selectedKecamatan)) --}}
        <div class="form-group">
            <label for="city" class="">Kelurahan</label>
            <select wire:model="selectedKelurahan" class="form-control" name="kota">
                <option value="" selected>Pilih Kelurahan / Desa</option>
                @foreach($kelurahans as $kelurahan)
                    <option value="{{ $kelurahan->id }}">{{ $kelurahan->nama_kelurahan }}</option>
                @endforeach
            </select>
        </div>
    {{-- @endif --}}
    {{-- @if (!is_null($selectedKelurahan)) --}}
        <div class="form-group">
            <label for="city" class="">RW</label>
            <select class="form-control" wire:model="selectedRw" name="id_rw">
                <option value="" selected>Pilih RW</option>
                @foreach($rws as $rw)
                    <option value="{{ $rw->id }}">{{ $rw->nama_rw }}</option>
                @endforeach
            </select>
        </div>
    {{-- @endif --}}
</div>
