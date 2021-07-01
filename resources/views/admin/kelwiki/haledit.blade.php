@extends('layouts.master1')
@section('tittle',"Edit Wiki")
@section('conten')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h6 class="panel-title">Edit Data Wiki</h6>
    </div>
    
    <div class="panel-body">
        <form method="post" class="form form-horizontal" action="/wiki/{{$data_wiki->id}}/updatewiki" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{auth()->user()->id}}"> 

            <div class="form-group {{$errors->has('judul') ? ' has-error' : ''}}">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" value="{{$data_wiki->judul}}" required>
                @if ($errors->has('judul'))
                    <span class="help-block">{{$errors->first('judul')}}</span>
                @endif
            </div>

            <div class="form-group  {{$errors->has('deskripsi') ? ' has-error' : ''}}">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required>{{$data_wiki->deskripsi}}</textarea>
                @if ($errors->has('deskripsi'))
                    <span class="help-block">{{$errors->first('deskripsi')}}</span>
                @endif
            </div>  

            <div class="form-group {{$errors->has('isi_artikel') ? ' has-error' : ''}}">
                <label>Isi Artikel</label>
                <textarea name="isi_artikel" rows="5" cols="40" class="form-control summernote" required>{{$data_wiki->isi_artikel}}</textarea>
                @if ($errors->has('isi_artikel'))
                    <span class="help-block">{{$errors->first('isi_artikel')}}</span>
                @endif
            </div>

            <div class="form-group {{$errors->has('editor') ? ' has-error' : ''}}">
                <label>Editors</label>
                <textarea name="editor" rows="4" cols="40" class="form-control" required>{{$data_wiki->editor}}</textarea>
                @if ($errors->has('editor'))
                    <span class="help-block">{{$errors->first('editor')}}</span>
                @endif
            </div>
            
            <div class="form-group {{$errors->has('sumber') ? ' has-error' : ''}}">
                <label>Sumber</label>
                <textarea name="sumber" cols="40" rows="4" class="form-control" required>{{$data_wiki->sumber}}</textarea>
                @if ($errors->has('sumber'))
                    <span class="help-block">{{$errors->first('sumber')}}</span>
                @endif
            </div>

            <div class="form-group {{$errors->has('gambar') ? ' has-error' : ''}}">
                <label>File:</label>
                <div class="uploader"><input type="file" class="file-styled" name="gambar"><span class="filename">File Anda</span><span class="action btn bg-pink-400" style="user-select: none;">Choose File</span></div>
                <span class="help-block">Format: png,jpg.</span>
                @if ($errors->has('gambar'))
                <span class="help-block">{{$errors->first('gambar')}}</span>
                @endif
            </div>  

            <div class="text-right">
                <a href="/Kelola-Wiki" class="btn btn-danger btn-sm"><i class=" icon-cross3"></i>Batal</a>
                <button type="submit" class="btn btn-primary btn-sm"><i class=" icon-checkmark3"></i>Simpan</button>
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
