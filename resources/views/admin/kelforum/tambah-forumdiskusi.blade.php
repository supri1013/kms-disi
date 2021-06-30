@extends('layouts.master1')
@section('tittle',"Tambah Data Forum Diskusi")
@section('conten')

<div class="row">
    <div class="col-md-12">

        <form action="{{route('forumdiskusi.simpan')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Tambah Data Forum Diskusi<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="form-group {{$errors->has('judul') ? ' has-error' : ''}}">
                        <label>Topik Forum Diskusi:</label>
                        <input type="text" class="form-control" name="judul">
                        @if ($errors->has('judul'))
                            <span class="help-block">{{$errors->first('judul')}}</span>
                        @endif
                    </div>

                    <div class="form-group {{$errors->has('konten') ? ' has-error' : ''}}">
                        <label>Deskripsi Forum Diskusi:</label>
                        <textarea name="konten" id="" cols="30" rows="10" class="form-control"></textarea>
                        @if ($errors->has('konten'))
                            <span class="help-block">{{$errors->first('konten')}}</span>
                        @endif
                    </div>

                    <div class="text-right">
                        <a href="{{route('tampildata.forum')}}" class="btn btn-danger btn-sm"><i class=" icon-cross3"></i>Batal</a> 
                        <button type="submit" class="btn btn-primary btn-sm"><i class=" icon-checkmark3"></i>Simpan</button> 
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection