@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tunjangan Pegawai</div>

                <div class="panel-body">
                    <a href="{{url('/Tunjangan_Pegawai/create')}}" class="btn btn-success btn-block">Tambah Tunjangan Pegawai</a><br>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Kode Tunjangan</td>
                                <td>Nama Pegawai</td>
                                <td colspan="2">Pilihan:</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($tunpegv as $data)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $data->tunjangan->kode_tunjangan }}</td>
                                    <td>{{ $data->pegawai->user->name }}</td>
                                    <td><a href="{{route('Tunjangan_Pegawai.edit',$data->id)}}" class="btn btn-warning">Ubah</a></td>
                                    <td>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['Tunjangan_Pegawai.destroy', $data->id]]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
