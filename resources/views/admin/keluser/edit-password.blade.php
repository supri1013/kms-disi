@extends('layouts.master1')
@section('tittle',"Edit Password User")
@section('conten')
<form action="/user/{{$user->id}}/simpan/password" method="POST">
    @csrf
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Edit Data Password<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            
            <input type="hidden" name="id" value="{{$user->id}}">
            <input type="hidden" name="name" value="{{$user->name}}">
            <input type="hidden" name="role" value="{{$user->role}}">
            <input type="hidden" name="email" value="{{$user->email}}">
            <input type="hidden" name="jabatan" value="{{$user->jabatan}}">
            <input type="hidden" name="telepon" value="{{$user->telepon}}">
            <input type="hidden" name="alamat" value="{{$user->alamat}}">

            <div class="form-group {{$errors->has('password') ? ' has-error' : ''}}">
                <label>Password:</label>
                <input type="password" class="form-control" name="password" placeholder="Masukan Password Baru Anda">
                @if ($errors->has('password'))
                <span class="help-block">{{$errors->first('password')}}</span>
                @endif
            </div>

            <div class="text-right">
                <a href="{{route('user')}}" class="btn btn-danger btn-sm"><i class=" icon-cross3"></i>Batal</a>
                <button type="submit" class="btn btn-primary btn-sm"><i class=" icon-checkmark3"></i>Simpan</button>
            </div>
        </div>
    </div>
</form>
@endsection