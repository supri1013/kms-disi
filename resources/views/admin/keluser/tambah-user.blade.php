@extends('layouts.master1')
@section('tittle',"Tambah Data User")
@section('conten')

<div class="row">
    <div class="col-md-12">

        <form action="{{route('user.simpan')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Tambah Data User<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
                                <label>Nama:</label>
                                <input type="text" class="form-control" name="name">
                                @if ($errors->has('name'))
                                    <span class="help-block">{{$errors->first('name')}}</span>
                                @endif
                            </div>
        
                            <div class="form-group {{$errors->has('password') ? ' has-error' : ''}}">
                                <label>Password:</label>
                                <input type="password" class="form-control" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">{{$errors->first('password')}}</span>
                                @endif
                            </div>
        
                            <div class="form-group {{$errors->has('role') ? ' has-error' : ''}}">
                                <label>Role:</label>
                                <select class="select form-control" id="statuscek" name="role" required value="{{old('role')}}">
                                    <option value="admin">Admin</option>
                                    {{-- <option value="si">Divisi SI</option> --}}
                                    <option value="visitor">Visitor</option>
                                </select>
                                @if ($errors->has('role'))
                                <span class="help-block">{{$errors->first('role')}}</span>
                                @endif
                            </div>
        
                            <div class="form-group {{$errors->has('email') ? ' has-error' : ''}}">
                                <label>Email:</label>
                                <input type="email" class="form-control" name="email">
                                @if ($errors->has('email'))
                                <span class="help-block">{{$errors->first('email')}}</span>
                                @endif
                            </div>
                        </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group {{$errors->has('jabatan') ? ' has-error' : ''}}">
                                <label>Jabatan:</label>
                                <input type="text" class="form-control" name="jabatan">
                                @if ($errors->has('jabatan'))
                                <span class="help-block">{{$errors->first('jabatan')}}</span>
                                @endif
                            </div>
        
                            <div class="form-group {{$errors->has('telepon') ? ' has-error' : ''}}">
                                <label>Telepon:</label>
                                <input type="text" class="form-control" name="telepon">
                                @if ($errors->has('telepon'))
                                <span class="help-block">{{$errors->first('telepon')}}</span>
                                @endif
                            </div>
        
                            <div class="form-group {{$errors->has('alamat') ? ' has-error' : ''}}">
                                <label>Alamat:</label>
                                <input type="text" class="form-control" name="alamat">
                                @if ($errors->has('alamat'))
                                <span class="help-block">{{$errors->first('alamat')}}</span>
                                @endif
                            </div>
        
                            <div class="form-group {{$errors->has('gambar') ? ' has-error' : ''}}">
                                <label>Foto:</label>
                                <div class="uploader"><input type="file" class="file-styled" name="gambar"><span class="filename" style="user-select: none;">Tidak Ada File</span><span class="action btn bg-pink-400" style="user-select: none;">Choose File</span></div>
                                <span class="help-block">Format: png, jpg.</span>
                                @if ($errors->has('gambar'))
                                <span class="help-block">{{$errors->first('gambar')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    


                    <div class="text-right">
                        <a href="{{route('user')}}" class="btn btn-danger btn-sm"><i class=" icon-cross3"></i>Batal</a> 
                        <button type="submit" class="btn btn-primary btn-sm"><i class=" icon-checkmark3"></i>Simpan</button> 
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection