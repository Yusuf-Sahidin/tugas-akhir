@extends('layouts.main_admin')
@section('title', 'Data Ruangan')
@section('container')
    <a type="button" class="btn btn-dark btn-md btn_loc" href="{{ route('hal_tambah_ruangan') }}">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Tambah Data</span>
    </a>
    <div class="container tabel_container">
        <table class="table">
            <tr>
                <td class="col-md-1">No</td>
                <td class="col-md-1">Lantai</td>
                <td class="col-md-2">Nama Ruangan</td>
                <td class="col-md-2 center">Action</td>
            </tr>
            @foreach ($data_ruangan as $no => $data)
                <tr>
                    <td>{{ $data_ruangan->firstItem()+$no }}</td>
                    <td>{{ $data -> lantai }}</td>
                    <td>{{ $data -> nama }}</td>
                    <td class="center">
                        <a href="{{ route('hal_edit_ruangan', $data->id) }}" type="submit" class="btn btn-warning">Edit</a>
                        <form action="{{ route('hapus_ruangan', $data->id) }}" method="POST" class="d-inline">
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

        {{ $data_ruangan->links() }}
    </div>
@endsection