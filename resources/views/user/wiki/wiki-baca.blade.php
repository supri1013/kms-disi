@extends('layouts.master1')
@section('tittle',"Wiki")
@section('conten')

<div class="panel">
    <div class="panel-body">
        <div class="content-group-lg">
            <div class="content-group text-center">
                <a href="#" class="display-inline-block">
                    <img src="{{$newwiki->getGambar()}}" style="width: 850px; height: 300px" alt="">
                </a>
            </div>

            <h3 class="text-semibold mb-5">
                <a href="#" class="text-default">{{$newwiki->judul}}</a>
            </h3>

            <ul class="list-inline list-inline-separate text-muted content-group">
                <li>By <a href="#" class="text-muted">Eugene</a></li>
                <li>{{$newwiki->created_at}}</li>
            </ul>

            <div class="content-group">
                <p>{!! $newwiki->isi_artikel !!}</p>
            </div>
            <hr>
            <ul class="list list-icons">
                <li>
                    <h5>Sumber</h5>
                    <i class="icon-earth text-success position-left"></i>
                    {{$newwiki->sumber}}
                </li>
            </ul>

            <hr>
            <ul class="list list-icons">
                <li>
                    <h5>Editors</h5>
                    <i class="icon-people text-success position-left"></i>
                    {{$newwiki->editor}}
                </li>
            </ul>

            <hr>
            <ul class="list list-icons">
                <a href="/wiki" class="btn btn-danger btn-sm">Kembali</a>
            </ul>

           
        </div>

       
    </div>
</div>



@endsection

