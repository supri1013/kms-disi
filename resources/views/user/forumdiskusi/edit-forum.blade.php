@extends('layouts.master1')
@section('tittle',"Edit Forum Diskusi")
@section('conten')
<form action="/forum/saya/simpanedit/{{$forumdiskusi->id}}" method="POST" class="form-horizontal">
    {{csrf_field()}}
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Edit Forum Diskusi</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <div class="form-group ">
                <label class="col-lg-2 control-label">Judul</label>
                <div class="col-lg-10 {{$errors->has('judul') ? ' has-error' : ''}}">
                    <input type="text" name="judul" class=" form-control" value="{{$forumdiskusi->judul}}">
                    @if ($errors->has('judul'))
                        <span class="help-block">{{$errors->first('judul')}}</span>
                    @endif
                </div>
            </div>

            <div class="form-group ">
                <label class="col-lg-2 control-label">Desksripsi</label>
                <div class="col-lg-10 {{$errors->has('konten') ? ' has-error' : ''}}">
                    <textarea name="konten" id=""  rows="4" class=" form-control ">{{$forumdiskusi->konten}}</textarea>
                    @if ($errors->has('konten'))
                        <span class="help-block">{{$errors->first('konten')}}</span>
                    @endif
                </div>
            </div>

            <div class="text-right">
               <a href="{{route('forum.saya')}}" class="btn btn-danger btn-sm">Batal<i class=" icon-cross2 position-right"></i></a>
                <button type="submit" class="btn btn-primary btn-sm">Simpan<i class="icon-check position-right"></i></button>
            </div>
        </div>
    </div>
</form>
@endsection