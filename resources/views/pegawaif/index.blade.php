@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Pegawai</div>

                <div class="panel-body">
                    <a href="{{url('/Pegawai/create')}}" class="btn btn-success btn-block">Tambah Pegawai</a><br>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Foto</td>
                                <td>NIP</td>
                                <td>Nama</td>
                                <td>Jabatan</td>
                                <td>Golongan</td>
                                <td colspan="3">Pilihan:</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($pegawaiv as $Data)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><img src="{{asset('img/'.$Data->photo.'')}}" width="75" height="75" class="img-rounded img-responsive" alt="Responsive image"></td>
                                    <td>{{ $Data->nip }}</td>
                                    <td>{{ $Data->User->name }}</td>
                                    <td>{{ $Data->jabatan->nama_jabatan }}</td>
                                    <td>{{ $Data->golongan->nama_golongan }}</td>
                                    <td><a href="{{route('Pegawai.show',$Data->id)}}" class="btn btn-default">Lihat</a></td>
                                    <td><a href="{{route('Pegawai.edit',$Data->id)}}" class="btn btn-warning">Ubah</a></td>
                                    <td>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['Pegawai.destroy', $Data->id]]) !!}
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
@endsection
