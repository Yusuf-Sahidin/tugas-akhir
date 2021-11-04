@extends('layouts.main_admin')
@section('title', 'Tambah Data Ruangan')
@section('container')
    <div class="container">
        <form action="{{ route('tambah_ruangan') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="lantai">Lantai</label>
                <input type="text" class="form-control" name="lantai" placeholder="Lantai">
            </div>
            <div class="form-group">
                <label for="nama">Ruangan</label>
                <input type="text" class="form-control" name="nama" placeholder="Ruangan">
            </div>
            <button type="submit" class="btn btn-dark btn-md">Simpan</button>
        </form>
    </div>
@endsection