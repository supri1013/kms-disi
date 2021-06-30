@extends('layouts.master1')
@section('tittle',"Isu Saya")
@section('conten')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Isu Saya</h5>
        <div class="heading-elements">
            <div class="heading-elements">
                <a href="{{route('isu.lapor')}}" class="btn btn-primary btn-sm">Tambah Isu</a>
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
            <th>Pic Piket</th>
            <th>Kategori</th>
            <th>Pelapor</th>
            <th>Waktu Kejadian</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach ($data_newisu as $isu)
        @if ($isu->user->id == Auth::user()->id)
        <tr>
            <td>{{$isu->id}}</td>
            <td>{{$isu->user->name}}</td>
            <td>{{$isu->jenis->nama}}</td>
            <td>{{$isu->pelapor}}</td>
            <td>{{$isu->created_at}}</td>
            <td>
                <ul class="icons-list">
                    <li class="text-warning-600"><a href="/isu/saya/edit/{{$isu->id}}"><i class="icon-pencil7"></i></a></li>
                    
                    <li class="text-teal-600"><a href="/isu/lihat/{{$isu->id}}"><i class="icon-eye"></i></a></li>
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