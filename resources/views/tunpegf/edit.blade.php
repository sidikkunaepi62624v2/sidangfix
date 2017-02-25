@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Tunjangan Pegawai</div>

                <div class="panel-body">
                    <a href="{{url('/Tunjangan_Pegawai')}}" class="btn btn-success btn-block">Kembali</a><br>
                    {!! Form::model($tunpegv,['method'=>'PATCH','route'=>['Tunjangan_Pegawai.update',$tunpegv->id]])!!}
                        <div class="form-group">
                            <label for="kode_tunjangan_id" class="form-group">Kode Tunjangan</label>
                            <div class="form-group">
                                <select name="kode_tunjangan_id" class="form-control">
                                    <option value="{{ $tunpegv->tunjangan->id }}">Kode Tunjangan -- {{ $tunpegv->tunjangan->kode_tunjangan }}</option>
                                    @foreach($tunjanganv as $data)
                                    <option value="{{$data->id}}">{{$data->kode_tunjangan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pegawai_id" class="form-group">Nama Pegawai</label>
                            <div class="form-group">
                                <select name="pegawai_id" class="form-control" disabled>
                                    <option value="{{ $tunpegv->pegawai->User->name }}">Nama Pegawai -- {{ $tunpegv->pegawai->User->name }}</option>
                                    @foreach($pegawaiv as $data)
                                    <option value="{{$data->id}}">{{$data->User->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::submit('update',['class'=>'btn btn-success form-control'])!!}
                        </div>
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
