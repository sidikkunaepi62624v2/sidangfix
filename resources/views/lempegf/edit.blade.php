@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Lembur Pegawai</div>

                <div class="panel-body">
                    <a href="{{url('/Lembur_Pegawai')}}" class="btn btn-success btn-block">Kembali</a><br>
                    {!! Form::model($lempegv,['method'=>'PATCH','route'=>['Lembur_Pegawai.update',$lempegv->id]])!!}
                        <div class="form-group">
                            <label for="kode_lembur_id" class="form-group">Kode Lembur</label>
                            <div class="form-group">
                                <select name="kode_lembur_id" class="form-control">
                                    <option value="{{ $lempegv->id }}">kode Lembur -- {{ $lempegv->kategori_lembur->kode_lembur }}</option>
                                    @foreach($kalemv as $data)
                                    <option value="{{$data->id}}">{{$data->kode_lembur}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pegawai_id" class="form-group">Nama Pegawai</label>
                            <div class="form-group">
                                <select name="pegawai_id" class="form-control">
                                    <option value="{{ $lempegv->id }}">Nama Pegawai -- {{ $lempegv->pegawai->User->name }}</option>
                                    @foreach($pegawaiv as $data)
                                    <option value="{{$data->id}}">{{$data->user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Jumlah Jam','Jumlah Jam')!!}
                            {!! Form::number('jumlah_jam',null,['class'=>'form-control'])!!}
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
