@extends('layouts.master')
@section('tittle',"Daftar Forum")
    
@section('konten')

<!-- Search field -->
<div class="panel">
    <div class="panel-body">
        <h5 class="text-center content-group-xsm">
            Welcome to our knowledge base
            <small class="display-block">Panther egret cut a more this bound one much yikes more less because hello alas while unbridled seal</small>
        </h5>
        <div class="div row">
            <div class="div col-md-4">
                    <form action="#">
                        <div class="has-feedback has-feedback-left">
                            <input type="search" class="form-control border-blue " placeholder="Search">
                            <div class="form-control-feedback">
                                <i class="icon-search4 text-size-base text-muted"></i>
                            </div>
                            
                        </div>
                    </form>
            </div>
            <div class="col-md-4">
                {{-- <select class="select form-control border-teal" id="statuscek" name="status">
                    <option value="selesai">Selesai</option>
                    <option value="belum">Belum Selesai</option>
                </select> --}}
             </div>
            <div class="col-md-4">
                    <select class="select form-control border-blue" id="statuscek" name="status">
                        <option value="selesai">Selesai</option>
                        <option value="belum">Belum Selesai</option>
                    </select>
            </div>
        </div>
        
    </div>
</div>
<!-- /search field -->
@foreach ($data_forum as $forum)
<div class="panel panel-flat border-top-info border-bottom-info">
    
    <div class="panel-heading">
        <h6 class="panel-title text-bold">{{$forum->judul}}</h6>
    </div>
    
    <div class="panel-body">
        {{$forum->konten}}
    </div>
    <div class="panel-footer panel-footer-transparent">
        <div class="heading-elements">
            <ul class="list-inline list-inline-separate heading-text text-muted">
                <li><img src="{{$forum->user->getGambar()}}" width="30" alt="Gambar"></li>
                <li>By <a href="#" class="text-muted">{{$forum->user->name}}</a></li>
                <li>{{$forum->created_at}}</li>
                <li>{{$forum->komentar->count()}} comments</li>
            </ul>

            <a href="/forumdiskusi/{{$forum->id}}/lihatdiskusi" class="btn btn-primary btn-sm heading-text pull-right">Diskusi<i class="icon-arrow-right14 position-right"></i></a>
        </div>
    </div>
</div> 
@endforeach

{{-- {{$data_forum->links()}} --}}




@endsection