@extends('layouts.master1')
@section('tittle',"Profile")
@section('conten')
<div class="div row">
    <div class="col-lg-4 col-md-6">
        <div class="thumbnail">
            <div class="thumb thumb-rounded">
                <img src="{{auth()->user()->getGambar()}}" alt="">
                <div class="caption-overflow">
                </div>
            </div>
        
            <div class="caption text-center">
                <h6 class="text-semibold no-margin">{{auth()->user()->name}} <small class="display-block">{{auth()->user()->jabatan}}</small></h6>
            </div>
            
        </div> 
    </div>

    <div class="div col-md-8">
        @if (session('sukses'))
        <div class="alert alert-info alert-bordered alert-rounded">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
            {{session('sukses')}}
        </div> 
        @endif
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
                    
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary btn-sm"><i class=" icon-checkmark3"></i>Simpan</button>
                    </div>
                </div>
            </div>
        </form>

        <form action="/profile/{{auth()->user()->id}}/updatepassword" method="POST">
            @csrf
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Edit Data Password<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
                </div>
        
                <div class="panel-body">
                    
                    <input type="hidden" name="id" value="{{auth()->user()->id}}">
                    <input type="hidden" name="name" value="{{auth()->user()->name}}">
                    <input type="hidden" name="role" value="{{auth()->user()->role}}">
                    <input type="hidden" name="email" value="{{auth()->user()->email}}">
                    <input type="hidden" name="jabatan" value="{{auth()->user()->jabatan}}">
                    <input type="hidden" name="telepon" value="{{auth()->user()->telepon}}">
                    <input type="hidden" name="alamat" value="{{auth()->user()->alamat}}">
        
                    <div class="form-group {{$errors->has('password') ? ' has-error' : ''}}">
                        <label>Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukan Password Baru Anda">
                        @if ($errors->has('password'))
                            <span class="help-block">{{$errors->first('password')}}</span>
                        @endif
                    </div>
        
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary btn-sm"><i class=" icon-checkmark3"></i>Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>



@endsection
