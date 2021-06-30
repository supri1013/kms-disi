@extends('layouts.master1')
@section('tittle',"Wiki")
@section('conten')

<div class="row">
    <div class="col-md-9">
        @if (session('sukses'))
    <div class="alert alert-info alert-bordered alert-rounded">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
        {{session('sukses')}}
    </div> 
    @endif
        @foreach ($data_newwiki as $wiki)
        <div class="panel panel-flat blog-horizontal blog-horizontal-1">
            <div class="panel-heading">
                <h5 class="panel-title text-semibold">
                    <a href="#">{{$wiki->judul}}</a>
                </h5>
            </div>
        
            <div class="panel-body">
                <div class="thumb">
                    <img src="{{$wiki->getGambar()}}" alt="" style="width: 400px">
                    <div class="caption-overflow">
                        <span>
                            <a href="blog_single.html" class="btn btn-flat border-white text-white btn-rounded btn-icon"><i class="icon-arrow-right8"></i></a>
                        </span>
                    </div>
                </div>
        
                <div class="blog-preview">
                    <p>{{$wiki->deskripsi}}
                </div>
            </div>
        
            <div class="panel-footer panel-footer-transparent">
                <div class="heading-elements">
                    <ul class="list-inline list-inline-separate heading-text text-muted">
                        <li>By <span class="label label-primary">{{$wiki->user->name}}</span><a href="#" class="text-blue"></a></li>
                        <li>{{$wiki->created_at}}</li>
                    </ul>
                        <a href="{{ route('wiki.baca', $wiki->id) }}" class="heading-text pull-right"><span class="label label-success">Lihat</span></a>
                        <a href="/wiki/{{$wiki->id}}/edit" class="heading-text pull-right"><span class="label label-warning">Edit</span> </a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <div class="col-md-3">
        <div class="sidebar-detached">
            <div class="sidebar sidebar-default sidebar-separate">
                <div class="sidebar-content">

                    <!-- Sidebar search -->
                    <div class="sidebar-category">
                        <div class="category-title">
                            <span>Cari</span>
                            <ul class="icons-list">
                                <li><a href="#" data-action="collapse" class=""></a></li>
                            </ul>
                        </div>

                        <div class="category-content" style="display: block;">
                            <form action="{{route('wiki')}}" method="GET">
                                <div class="has-feedback has-feedback-left">
                                    <input type="text" class="form-control" name="cari" placeholder="By Judul" value="{{Request::get('cari')}}">
                                    <div class="form-control-feedback">
                                        <i class="icon-search4 text-size-base text-muted"></i>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /sidebar search -->


                    <!-- Categories -->
                    {{-- <div class="sidebar-category">
                        <div class="category-title">
                            <span>Categories</span>
                            <ul class="icons-list">
                                <li><a href="#" data-action="collapse"></a></li>
                            </ul>
                        </div>

                        <div class="category-content no-padding">
                            <ul class="navigation">
                                @foreach ($jenis as $item)
                                <li>
                                    <a href="{{route('jenis', $item->id)}}">
                                        <span class="text-muted text-size-small text-regular pull-right">12</span>
                                        <i class="icon-wordpress"></i>
                                        {{$item->nama}}
                                    </a>
                                </li>  
                                @endforeach
                            </ul>
                        </div>
                    </div> --}}
                    <!-- /categories -->

                   
                   <!-- Recent comments -->
                    <div class="sidebar-category">
                        <div class="category-title">
                            <span>Artikel Terbaru</span>
                            <ul class="icons-list">
                                <li><a href="#" data-action="collapse" class=""></a></li>
                            </ul>
                        </div>
                        @foreach ($data_wiki as $item)
                        <div class="category-content" style="display: block;">
                            <ul class="media-list">
                                <li class="media">
                                    <div class="media-left">
                                        <img src="{{$item->user->getGambar()}}" class="img-circle img-sm" alt="">
                                    </div>

                                    <div class="media-body">
                                        <a href="{{ route('wiki.baca', $item->id) }}" class="media-heading">
                                            <span class="text-semibold">{{$item->user->name}}</span>
                                        </a>

                                        <span class="text-muted">{{$item->judul}}</span>
                                        <ul class="list-inline list-inline-separate">
                                            <li>{{$item->getCreatedAtAttribute()}}</li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        @endforeach
                        
                    </div>
                    <!-- /recent comments -->
                </div>
            </div>
        </div>       
    </div>
</div>



@endsection

