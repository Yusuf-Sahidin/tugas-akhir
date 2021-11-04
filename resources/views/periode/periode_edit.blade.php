@extends('layouts.main_admin')
@section('title', 'Edit Data Periode')
@section('container')
    <div class="container">
        <form action="{{ route('edit_periode',  $periode->id) }}" method="POST">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="periode">Periode Ke-</label>
                <input type="text" class="form-control" name="periode" placeholder="Periode Ke-" 
                @if (old('periode'))
                    {{ old('periode') }}
                @else
                    value="{{ $periode->periode }}"
                @endif>
            </div>
            <div class="form-group">
                <label for="tanggal_awal">Tanggal Awal</label>
                <input type="date" class="form-control" name="tanggal_awal" 
                @if (old('tanggal_awal'))
                    {{ old('tanggal_awal') }}
                @else
                    value="{{ $periode->tanggal_awal }}"
                @endif>
            </div>
            <div class="form-group">
                <label for="akhir">Tanggal Akhir</label>
                <input type="date" class="form-control" name="tanggal_akhir" 
                @if (old('tanggal_akhir'))
                    {{ old('tanggal_akhir') }}
                @else
                    value="{{ $periode->tanggal_akhir }}"
                @endif>
            </div>
            <div class="form-group">
                <label for="yudisium">Yudisium</label>
                <input type="text" class="form-control" name="yudisium" placeholder="yudisium"
                @if (old('yudisium'))
                    {{ old('yudisium') }}
                @else
                    value="{{ $periode->yudisium }}"
                @endif>
            </div>
            <div class="form-group">
                <label for="tanggal_yudisium">Tanggal Yudisium</label>
                <input type="date" class="form-control" name="tanggal_yudisium" 
                @if (old('tanggal_yudisium'))
                    {{ old('tanggal_yudisium') }}
                @else
                    value="{{ $periode->tanggal_yudisium }}"
                @endif>
            </div>
            <button type="submit" class="btn btn-dark btn-md">Simpan</button>
        </form>
    </div>
@endsection