@extends('layouts.main_admin')
@section('title', 'Edit Data mahasiswa')
@section('container')
    <div class="container">
        <form action="{{ route('edit_mahasiswa',  $mahasiswa->user_id) }}" method="POST">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama" 
                @if (old('nama'))
                    {{ old('nama') }}
                @else
                    value="{{ $mahasiswa->nama }}"
                @endif>
            </div>
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" name="nim" placeholder="NIM" 
                @if (old('nim'))
                    {{ old('nim') }}
                @else
                    value="{{ $mahasiswa->nim }}"
                @endif>
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select name="nama_jurusan" id="nama_jurusan" class="form-control" style="width: 350px" required >
                    <option value="" selected hidden disabled>-- PILIH JURUSAN --</option>
                    @foreach ($data_jurusan as $item)
                        <option value="{{ $item->id }}" {{ $mahasiswa->jurusan_id == $item->id ? 'selected' : null  }}>{{ $item->jenjang.' '.$item->nama_jurusan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="angkatan">Angkatan</label>
                <input type="text" class="form-control" name="angkatan" placeholder="Angkatan" 
                @if (old('angkatan'))
                    {{ old('angkatan') }}
                @else
                    value="{{ $mahasiswa->angkatan }}"
                @endif>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username"
                @if (old('username'))
                    {{ old('username') }}
                @else
                    value="{{ $mahasiswa->username }}"
                @endif>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-dark btn-md">Simpan</button>
        </form>
    </div>
@endsection