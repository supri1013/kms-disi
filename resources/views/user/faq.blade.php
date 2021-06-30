@extends('layouts.master1')
@section('tittle',"FAQ")
@section('conten')

<div class="row">
    <div class="col-md-9">
        @foreach ($data_newfaq as $faq)
        <div class="">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h6 class="panel-title">
                        <a>
                            <i class="icon-help position-left text-orange"></i>{{$faq->pertanyaan}}
                            <div class="panel-body" style="text-align: justify">
                             {{$faq->jawaban}}
                            </div>
                        </a>
                    </h6>
                </div>
            </div>
        </div>
        @endforeach
                                    
        {{-- {{$data_newfaq->links()}}    --}}
    </div>
    <div class="col-md-3">
        <div class="sidebar-detached">
            <div class="sidebar sidebar-default sidebar-separate">
                <div class="sidebar-content">

                    <!-- Sidebar search -->
                    <div class="sidebar-category">
                        <div class="category-title">
                            <span>Search</span>
                            <ul class="icons-list">
                                <li><a href="#" data-action="collapse"></a></li>
                            </ul>
                        </div>

                        <div class="category-content">
                            <form action="{{route('faq')}}" method="GET">
                                <div class="has-feedback has-feedback-left">
                                    <input type="text" class="form-control" placeholder="By Pertanyaan" name="cari" value="{{Request::get('cari')}}">
                                    <div class="form-control-feedback">
                                        <i class="icon-search4 text-size-base text-muted"></i>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /sidebar search -->


                    <!-- Categories -->
                    <div class="sidebar-category">
                        <div class="category-title">
                            <span>Kategori</span>
                            <ul class="icons-list">
                                <li><a href="#" data-action="collapse"></a></li>
                            </ul>
                        </div>

                        <div class="category-content no-padding">
                            <ul class="navigation">
                                @foreach ($jenis as $item)
                                <li>
                                    <a href="{{ route('faq.jenis', $item->id) }}" class="text-primary">
                                        <span class="text-muted text-size-small text-regular pull-right"></span>
                                        <i class="icon-pushpin"></i>
                                        {{$item->nama}}
                                    </a>
                                </li>  
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- /categories -->

                </div>
            </div>
        </div>      
    </div>
</div>                          
                 
@endsection