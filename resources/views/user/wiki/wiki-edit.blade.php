@extends('layouts.master1')
@section('tittle',"Edit Wiki")
@section('conten')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h6 class="panel-title">Edit Wiki</h6>
    </div>
    
    <div class="panel-body">
        <form method="post" class="form form-horizontal" action="/wiki/{{$wiki->id}}/posteditwiki" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">    

            <div class="form-group {{$errors->has('judul') ? ' has-error' : ''}}">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" value="{{$wiki->judul}}"/>
                @if ($errors->has('judul'))
                    <span class="help-block">{{$errors->first('judul')}}</span>
                @endif
            </div>

            <div class="form-group {{$errors->has('deskripsi') ? ' has-error' : ''}}">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control">{{$wiki->deskripsi}}</textarea>
                @if ($errors->has('deskripsi'))
                    <span class="help-block">{{$errors->first('deskripsi')}}</span>
                @endif
            </div>

            <div class="form-group {{$errors->has('isi_artikel') ? ' has-error' : ''}}">
                <label>Isi Artikel</label>
                <textarea name="isi_artikel" rows="5" cols="40" class="form-control summernote">{{$wiki->isi_artikel}}</textarea>
                @if ($errors->has('isi_artikel'))
                    <span class="help-block">{{$errors->first('isi_artikel')}}</span>
                @endif
            </div>

            <div class="form-group {{$errors->has('editor') ? ' has-error' : ''}}">
                <label>Editors</label>
                <textarea name="editor" rows="4" cols="40" class="form-control"> {{$wiki->editor}}</textarea>
                @if ($errors->has('editor'))
                    <span class="help-block">{{$errors->first('editor')}}</span>
                @endif
                <span class="help-block">Format: Nama || Hari, Tanggal-Bulan-Tahun</span>
            </div>

            <div class="form-group {{$errors->has('sumber') ? ' has-error' : ''}}">
                <label>Sumber</label>
                <textarea name="sumber" cols="40" rows="4" class="form-control">{{$wiki->sumber}}</textarea>
                @if ($errors->has('sumber'))
                    <span class="help-block">{{$errors->first('sumber')}}</span>
                @endif
            </div> 
            
            <div class="form-group {{$errors->has('gambar') ? ' has-error' : ''}}">
                <label>Sampul:</label>
               <input type="file" name="gambar" id="">
                @if ($errors->has('gambar'))
                    <span class="help-block">{{$errors->first('gambar')}}</span>
                @endif
                <span class="help-block">Format: PNG|JPG</span>
            </div>  

            <div class="text-right">
                <a href="/wiki" class="btn btn-danger btn-sm">Batal<i class=" icon-cross2 position-right"></i></a>
                 <button type="submit" class="btn btn-primary btn-sm">Simpan<i class="icon-check position-right"></i></button>
             </div> 
        </form> 
    </div>
</div>
@push('detail')
<script type="text/javascript" src="{{asset('assets/js/plugins/editors/summernote/summernote.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/pages/editor_summernote.js')}}"></script>
@endpush
@endsection
