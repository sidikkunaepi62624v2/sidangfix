@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Pegawai</div>

                <div class="panel-body">
                <a href="{{url('/Pegawai')}}" class="btn btn-success btn-block">Kembali</a><br>
                    {!!Form::open(['url'=>'/Pegawai', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data', 'files'=>true])!!}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nama Tidak Dapat Dirubah !!! HATI-HATI !!!" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Alamat E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Contoh: Example@mail.co.id" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Kata Sandi</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Minimal 6 Karakter" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Masukkan Lagi Kata Sandi</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Kata Sandi Harus Sama" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="permission" class="col-md-4 control-label">Hak Akses Pegawai</label>

                            <div class="col-md-6">
                                <select name="permission" class="form-control" required>
                                    <option value="">Pilih Hak Akses Pegawai</option>
                                    <option value="Admin">Admin</option>
                                    <option value="HRD">HRD</option>
                                    <option value="Bendahara">Bendahara</option>
                                    <option value="Pegawai">Pegawai</option>
                                </select><br>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">nip</label>

                        <div class="col-md-6">
                                <input id="nip" type="number" class="form-control" name="nip" value="{{ old('nip') }}" placeholder="Contoh: 12345" required autofocus>

                                @if ($errors->has('nip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                                @endif
                        </div>
                        </div>

                        <div class="form-group">
                            <label for="jabatan_id" class="col-md-4 control-label">Nama Jabatan</label>

                            <div class="col-md-6">
                                <select name="jabatan_id" class="form-control" required>
                                    <option value="">Pilih Jabatan Pegawai</option>
                                    @foreach($jabatanv as $data)
                                    <option value="{{$data->id}}">{{$data->nama_jabatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="golongan_id" class="col-md-4 control-label">Nama Golongan</label>

                            <div class="col-md-6">
                                <select name="golongan_id" class="form-control" required>
                                    <option value="">Pilih Golongan Pegawai</option>
                                    @foreach($golonganv as $data)
                                    <option value="{{$data->id}}">{{$data->nama_golongan}}</option>
                                    @endforeach
                                </select><br>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="photo" class="col-md-4 control-label">Photo</label>

                            <div class="col-md-6">
                            <input type="file" name="photo" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
