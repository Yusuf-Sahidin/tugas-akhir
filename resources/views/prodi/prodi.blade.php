@extends('layouts.main_admin')
@section('title', 'Data Prodi')
@section('container')
    <a type="button" class="btn btn-dark btn-md btn_loc" href="{{ route('hal_tambah_prodi') }}">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Tambah Data</span>
    </a>
    <div class="container tabel_container">
        <table class="table">
            <tr>
                <td class="col-md-1">No</td>
                <td class="col-md-2">Nama</td>
                <td class="col-md-2">Jurusan</td>
                <td class="col-md-2">Username</td>
                <td class="col-md-2 center">Action</td>
            </tr>
            @foreach ($data_prodi as $no => $data)
                <tr>
                    <td>{{ $data_prodi->firstItem()+$no }}</td>
                    <td>{{ $data -> nama }}</td>
                    <td>{{ $data -> nama_jurusan }}</td>
                    <td>{{ $data -> username }}</td>
                    <td class="center">
                        <a href="{{ route('hal_edit_prodi', $data->user_id) }}" type="submit" class="btn btn-warning">Edit</a>
                        <form action="{{ route('hapus_prodi', $data->user_id) }}" method="POST" class="d-inline">
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
        {{ $data_prodi->links() }}
    </div>
@endsection