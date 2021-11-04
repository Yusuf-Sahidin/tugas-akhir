@extends('layouts.main_admin')
@section('title', 'Edit Data Jurusan')
@section('container')
    <div class="container">
        <form action="{{ route('edit_jurusan',  $jurusan->id) }}" method="POST">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="nama">Nama Jurusan</label>
                <input type="text" class="form-control" name="nama_jurusan" placeholder="Nama Jurusan" 
                @if (old('nama'))
                    {{ old('nama') }}
                @else
                    value="{{ $jurusan->nama_jurusan }}"
                @endif>
            </div>
            <div class="form-group">
                <label for="jenjang">Jenjang</label>
                <input type="text" class="form-control" name="jenjang" placeholder="Jenjang"
                @if (old('jenjang'))
                    {{ old('jenjang') }}
                @else
                    value="{{ $jurusan->jenjang }}"
                @endif>
            </div>
            <button type="submit" class="btn btn-dark btn-md">Simpan</button>
        </form>
    </div>
@endsection