@extends('layouts.master1')
@section('tittle',"Daftar Forum")  
@section('conten')


<div class="row">
    <div class="col-md-9">
        @foreach ($data_list as $item)
        <!-- Blog layout #1 with image -->
        <div class="panel panel-flat">
            <div class="panel-body">
                <div class="content-group">
                    <h5 class="blog-title text-semibold" style="margin-top: 0; margin-bottom: 5px;">
                        <a href="#" class="text-default">{{$item->judul}}</a>
                    </h5>
                   
                </div>

                <p>{{$item->konten}}</p>
            </div>

            <div class="panel-footer panel-footer-transparent"><a class="heading-elements-toggle"><i class="icon-more"></i></a>
                <div class="heading-elements">
                    <ul class="heading-thumbnails">
                        <li>
                            <img src="{{$item->user->getGambar()}}" alt="">
                        </li>
                        
                            <li>By <a href="#">{{$item->user->name}}</a></li>
                            <li>{{$item->getCreatedAtAttribute()}}</li>
                            <li><a href="#">{{$item->komentar->count()}} comments</a></li>
                        
                    </ul>
                    <a href="/forumdiskusi/{{$item->id}}/lihatdiskusi" class="btn btn-primary btn-sm heading-text pull-right">Komentar</a>
                </div>
            </div>
        </div>
        <!-- /blog layout #1 with image -->
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
                            <form action="{{route('list')}}" method="GET">
                                <div class="has-feedback has-feedback-left">
                                    <input type="text" class="form-control" name="cari" placeholder="By Topik" value="{{Request::get('cari')}}">
                                    <div class="form-control-feedback">
                                        <i class="icon-search4 text-size-base text-muted"></i>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /sidebar search -->

                   
                   <!-- Recent comments -->
                    <div class="sidebar-category">
                        <div class="category-title">
                            <span>Forum Terbaru</span>
                            <ul class="icons-list">
                                <li><a href="#" data-action="collapse" class=""></a></li>
                            </ul>
                        </div>
                        @foreach ($data_forum as $item)
                        <div class="category-content" style="display: block;">
                            <ul class="media-list">
                                <li class="media">
                                    <div class="media-left">
                                        <img src="{{$item->user->getGambar()}}" class="img-circle img-sm" alt="">
                                    </div>

                                    <div class="media-body">
                                        <a href="/forumdiskusi/{{$item->id}}/lihatdiskusi" class="media-heading">
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