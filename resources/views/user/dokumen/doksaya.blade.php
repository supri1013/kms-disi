@extends('layouts.master1')
@section('tittle',"Dokumen Saya")
@section('conten')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Dokumen Saya</h5>
        <div class="heading-elements">
            <div class="heading-elements">
                <a href="{{route('tambahdokumen')}}" class="btn btn-primary btn-sm">Tambah Dokumen</a>
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
            <th>Penulis</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Waktu Post</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach ($data_dokumen as $dok)
        @if ($dok->user->id == Auth::user()->id)
        <tr>
            <td>{{$dok->id}}</td>
            <td>{{$dok->penulis}}</td>
            <td>{{$dok->judul_umum}}</td>
            <td>{{$dok->kategori->nama}}</td>
            <td>{{$dok->created_at}}</td>
            <td>
                <ul class="icons-list">
                    <li class="text-warning-600"><a href="/dokumensaya/edit/{{$dok->id}}"><i class="icon-pencil7"></i></a></li>
                    
                    <li class="text-teal-600"><a href="/lihat/{{$dok->id}}/dokumen"><i class="icon-eye"></i></a></li>
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

<script>
    $('.delete').click(function(){
        var isu_id = $(this).attr('faq-id');
        swal({
                title: "Yakin?",
                text: "Mau dihapus data komentar ini ??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                if (willDelete) {
                   window.location = "/faq/"+isu_id+"/delete";
                   
                }
                });
    });
</script>
@endsection