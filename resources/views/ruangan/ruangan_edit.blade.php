@extends('layouts.main_admin')
@section('title', 'Edit Data Ruangan')
@section('container')
    <div class="container">
        <form action="{{ route('edit_ruangan',  $ruangan->id) }}" method="POST">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="lantai">Lantai</label>
                <input type="text" class="form-control" name="lantai" placeholder="Lantai" 
                @if (old('lantai'))
                    {{ old('lantai') }}
                @else
                    value="{{ $ruangan->lantai }}"
                @endif>
            </div>
            <div class="form-group">
                <label for="nama">Ruangan</label>
                <input type="text" class="form-control" name="nama" placeholder="Ruangan"
                @if (old('nama'))
                    {{ old('nama') }}
                @else
                    value="{{ $ruangan->nama }}"
                @endif>
            </div>
            <button type="submit" class="btn btn-dark btn-md">Simpan</button>
        </form>
    </div>
@endsection