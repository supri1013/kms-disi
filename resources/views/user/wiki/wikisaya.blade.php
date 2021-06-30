@extends('layouts.master1')
@section('tittle',"Wiki Saya")
@section('conten')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Wiki Saya</h5>
        <div class="heading-elements">
            <div class="heading-elements">
                <a href="{{route('tambahwiki')}}" class="btn btn-primary btn-sm">Tambah Wiki</a>
            </div>
        </div>
    </div>
    @if (session('sukses'))
    <div class="alert alert-info alert-bordered alert-rounded">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
        {{session('sukses')}}
    </div> 
    @endif

<table class="table datatable-basic">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Judul</th>
            <th>Editor</th>
            <th>Waktu Post</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach ($data_wiki as $wiki)
        @if ($wiki->user->id == Auth::user()->id)
        <tr>
            <td>{{$wiki->id}}</td>
            <td>{{$wiki->user->name}}</td>
            <td>{{$wiki->judul}}</td>
            <td>{{$wiki->deskripsi}}</td>
            <td>{{$wiki->created_at}}</td>
            <td>
                <ul class="icons-list">
                    <li class="text-warning-600"><a href="/wiki/{{$wiki->id}}/edit"><i class="icon-pencil7"></i></a></li>
                    
                    <li class="text-teal-600"><a href="{{ route('wiki.baca', $wiki->id) }}"><i class="icon-eye"></i></a></li>
                </ul>
            </td>
            
        </tr>
        @endif
  
        @endforeach 
    </tbody>    
</table>
</div>
@push('detail')
  <!-- Theme JS files -->
	<script type="text/javascript" src="{{asset('assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/plugins/forms/selects/select2.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/pages/datatables_basic.js')}}"></script>
	<!-- /theme JS files -->
@endpush


@endsection