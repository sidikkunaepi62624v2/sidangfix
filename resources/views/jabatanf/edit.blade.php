@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Data</div>

                <div class="panel-body">
                    <a href="{{url('/Jabatan')}}" class="btn btn-success btn-block">Kembali</a><br>
                    {!! Form::model($jabatanv,['method'=>'PATCH','route'=>['Jabatan.update',$jabatanv->id]])!!}
                    <div class="form-group">
                        {!! Form::label('Kode Jabatan','Kode Jabatan')!!}
                        {!! Form::text('kode_jabatan',null,['class'=>'form-control','required'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Nama Jabatan','Nama Jabatan')!!}
                        {!! Form::text('nama_jabatan',null,['class'=>'form-control','required'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Besaran Uang','Besaran Uang')!!}
                        {!! Form::number('besaran_uang',null,['class'=>'form-control','required'])!!}
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
