@extends('layouts.master1')
@section('tittle',"DATA FAQ")
@section('conten')
<form action="/faq/{{$faq->id}}/update" method="POST" >
    @csrf
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Edit Data Faq<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <div class="form-group {{$errors->has('pertanyaan') ? ' has-error' : ''}}">
                <label>Pertanyaan:</label>
                <textarea name="pertanyaan" class="form-control" id="" cols="30" rows="10">{{$faq->pertanyaan}} </textarea>
                @if ($errors->has('pertanyaan'))
                    <span class="help-block">{{$errors->first('pertanyaan')}}</span>
                @endif
            </div>

            <div class="form-group {{$errors->has('jawaban') ? ' has-error' : ''}}">
                <label>Jawaban:</label>
                <textarea name="jawaban" class="form-control" id="" cols="30" rows="10">{{$faq->jawaban}}</textarea>
                @if ($errors->has('jawaban'))
                    <span class="help-block">{{$errors->first('jawaban')}}</span>
                @endif
            </div>

            <div class="form-group {{$errors->has('jenis_id') ? ' has-error' : ''}}">
                <label>Jenis:</label>
                <select data-placeholder="Select your country" name="jenis_id" class="form-control">
                    @foreach ($jenis as $jns)
                    <option value="{{$jns->id}}">{{$jns->nama}}</option>
                    @endforeach
                </select>
                @if ($errors->has('jenis_id'))
                    <span class="help-block">{{$errors->first('jenis_id')}}</span>
                @endif
            </div>

            <div class="text-right">
                <a href="/Kelola/Faq" class="btn btn-danger btn-sm"><i class=" icon-cross3"></i>Batal</a>
                <button type="submit" class="btn btn-primary btn-sm"><i class=" icon-checkmark3"></i>Simpan</button>
            </div>
        </div>
    </div>
</form>
@endsection