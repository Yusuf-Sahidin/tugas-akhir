@extends('layouts.main_admin')
@section('title', 'Tambah Data Jurusan')
@section('container')
    <div class="container">
        <form action="{{ route('tambah_jurusan') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Jurusan</label>
                <input type="text" class="form-control" name="nama_jurusan" placeholder="Nama Jurusan">
            </div>
            <div class="form-group">
                <label for="jenjang">Jenjang</label>
                <input type="text" class="form-control" name="jenjang" placeholder="jenjang">
            </div>
            <button type="submit" class="btn btn-dark btn-md">Simpan</button>
        </form>
    </div>
@endsection