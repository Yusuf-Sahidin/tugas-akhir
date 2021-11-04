@extends('layouts.main_admin')
@section('title', 'Data Jurusan')
@section('container')
    <a type="button" class="btn btn-dark btn-md btn_loc" href="{{ route('hal_tambah_jurusan') }}">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Tambah Data</span>
    </a>
    <div class="container tabel_container">
        <table class="table">
            <tr>
                <td class="col-md-1">No</td>
                <td class="col-md-2">Nama Jurusan</td>
                <td class="col-md-2">Jenjang</td>
                <td class="col-md-2 center">Action</td>
            </tr>
            @foreach ($data_jurusan as $no => $data)
                <tr>
                    <td>{{ $no+1 }}</td>
                    <td>{{ $data -> nama_jurusan }}</td>
                    <td>{{ $data -> jenjang }}</td>
                    <td class="center">
                        <a href="{{ route('hal_edit_jurusan', $data->id) }}" type="submit" class="btn btn-warning">Edit</a>
                        <form action="{{ route('hapus_jurusan', $data->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection