@extends('layouts.master1')
@section('tittle',"Edit Profile")
@section('conten')
<div class="div row">
    <div class="div col-md-12">
        <form action="/profile/{{auth()->user()->id}}/postupdate" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="password" value="{{auth()->user()->password}}">
            <input type="hidden" name="role" value="{{auth()->user()->role}}">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Edit Data Profile</h5>
                    <div class="heading-elements">
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
                        <label class="col-lg-3 control-label">Nama:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control border-slate" name="name" value="{{auth()->user()->name}}">
                            @if ($errors->has('name'))
                                <span class="help-block">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{$errors->has('jabatan') ? ' has-error' : ''}}">
                        <label class="col-lg-3 control-label">Jabatan:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control border-slate" name="jabatan" value="{{auth()->user()->jabatan}}">
                            @if ($errors->has('jabatan'))
                                <span class="help-block">{{$errors->first('jabatan')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{$errors->has('email') ? ' has-error' : ''}}">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control border-slate" name="email" value="{{auth()->user()->email}}">
                            @if ($errors->has('email'))
                                <span class="help-block">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{$errors->has('alamat') ? ' has-error' : ''}}">
                        <label class="col-lg-3 control-label">Alamat:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control border-slate" name="alamat" value="{{auth()->user()->alamat}}">
                        @if ($errors->has('alamat'))
                            <span class="help-block">{{$errors->first('alamat')}}</span>
                        @endif
                        </div>
                    </div>
                    <div class="form-group {{$errors->has('telepon') ? ' has-error' : ''}}">
                        <label class="col-lg-3 control-label">Nomor Telepon:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control border-slate" name="telepon" value="{{auth()->user()->telepon}}">
                        @if ($errors->has('telepon'))
                            <span class="help-block">{{$errors->first('telepon')}}</span>
                        @endif
                        </div>
                    </div>
                    <div class="form-group {{$errors->has('gambar') ? ' has-error' : ''}}">
                        <label class="col-lg-3 control-label">Foto:</label>
                        <div class="col-lg-9">
                        <input type="file" class="form-control border-slate" name="gambar">
                        @if ($errors->has('gambar'))
                            <span class="help-block">{{$errors->first('gambar')}}</span>
                        @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="profile" class="btn btn-danger">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                
            </div>
        </form> 
    </div>
</div>
@endsection