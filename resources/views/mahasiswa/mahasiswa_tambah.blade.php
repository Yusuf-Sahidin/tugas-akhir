@extends('layouts.main_admin')
@section('title', 'Tambah Data Mahasiswa')
@section('container')
    <div class="container">
        <form action="{{ route('tambah_mahasiswa') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama">
            </div>
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" name="nim" placeholder="NIM">
            </div>
            <div class="form-group">
                <label for="nama_jurusan">Jurusan</label>
                <select name="nama_jurusan" id="nama_jurusan" class="form-control" style="width: 350px" required>
                    <option value="" selected hidden disabled>-- PILIH JURUSAN --</option>
                    @foreach ($data_jurusan as $item)
                        <option value="{{ $item->id }}" {{ old('jurusan_id') == $item->id ? 'selected' : null  }}>{{ $item->jenjang.' '.$item->nama_jurusan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="angkatan">Angkatan</label>
                <input type="text" class="form-control" name="angkatan" placeholder="Angkatan">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="password">password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-dark btn-md">Simpan</button>
        </form>
    </div>
@endsection