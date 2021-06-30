@extends('layouts.master1')
@section('tittle',"DATA FAQ")
@section('conten')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">DATA FAQ</h5>
        <div class="heading-elements">
            <div class="heading-elements">
                <a href="{{route('faq.tambah')}}" class="btn btn-primary btn-sm"> <i class="icon-plus3 position-left"></i>Tambah</a>
            </div>
        </div>
    </div>
    @if (session('sukses'))
    <div class="alert bg-success alert-styled-left">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
        {{session('sukses')}}
    </div> 
    @endif

<table class="table datatable-basic">
    <thead>
        <tr>
            <th>Id</th>
            <th>Kategori</th>
            <th>Pertanyaan</th>
            <th>Jawaban</th>
            <th>Waktu Post</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach ($data_newfaq as $faq)
        <tr>
            <td>{{$faq->id}}</td>
            <td>{{$faq->jenis->nama}}</td>
            <td>{{$faq->pertanyaan}}</td>
            <td>{{$faq->jawaban}}</td>
            <td>{{$faq->created_at}}</td>
            <td>
                <ul class="icons-list">
                    <li class="text-primary-600"><a href="/faq/{{$faq->id}}/edit"><i class="icon-pencil7"></i></a></li>
                    <li class="text-danger-600"><a href="#" class="delete" faq-id="{{$faq->id}}"><i class="icon-trash"></i></a></li>
                </ul>
            </td>
        </tr>  
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