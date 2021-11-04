@extends('layouts.main_mahasiswa')
@section('title', 'Berita Acara Bimbingan TA')
@section('container')
    <a type="button" class="btn btn-dark btn-md btn_loc" href="{{ route('hal_tambah_bimbingan') }}">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Tambah Data</span>
    </a>
    <div class="container tabel_container">
        @if ()
            
        @endif
        <div class="sebelum_bimbingan">
            <form action="{{ route('simpan_ta') }}" method="POST" class="row" style="margin-bottom: 30px">
                @csrf
                <div class="form-group col-md-4">
                    <label for="judul_ta">Judul Tugas Akhir</label><br/>
                    <input type="text" name="judul_ta" placeholder="Judul Tugas Akhir">
                </div>
                <div class="form-group col-md-4">
                    <label for="dosen">Pembimbing</label><br/>
                    <select name="dosen" id="dosen">
                        <option value="" selected hidden disabled>-- pilih pembimbing --</option>
                        @foreach ($dosen as $item)
                            <option value="{{ $item ->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="submit"> </label><br/>
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </div>
            </form>
        </div>
        <table class="table">
            <tr>
                <td class="col-md-1">No</td>
                <td class="col-md-2">Tanggal Bimbingan</td>
                <td class="col-md-2">Status</td>
                <td class="col-md-2 center">Action</td>
            </tr>
            @foreach ($bimbingan as $no => $data)
                <tr>
                    <td>{{ $bimbingan->firstItem()+$no }}</td>
                    <td>{{ $data -> tanggal_bimbingan }}</td>
                    <td>{{ $data -> Isi_bimbingan }}</td>
                    <td>{{ $data -> status }}</td>
                    <td class="center">
                        <a href="{{ route('detail_bimbingan', $data->id) }}" type="submit" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>

        {{ $bimbingan->links() }}
    </div>
@endsection