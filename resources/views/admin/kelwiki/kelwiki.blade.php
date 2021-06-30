@extends('layouts.master1')
@section('tittle',"Data Wiki")
@section('conten')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">DATA WIKI</h5>
        <div class="heading-elements">
            <a href="{{route('tambahdata.wiki')}}" class="btn btn-primary btn-sm"><i class="icon-plus3 position-left"></i>Tambah</a>
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
                <th>Post By</th>
                <th>Judul Wiki</th>
                <th>Deskripsi Wiki</th>
                <th>Post</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        
        <tbody>
           @foreach ($data_newwiki as $wiki)
           <tr>
            <td>{{$wiki->id}}</td>
            <td>{{$wiki->user->name}}</td>
            <td>{{$wiki->judul}}</td>
            <td>{{$wiki->deskripsi}}</td>
            <td>{{$wiki->created_at}}</td>
            <td>
                <ul class="icons-list">
                    <li class="text-primary-600"><a href="/wiki/{{$wiki->id}}/haledit"><i class="icon-pencil7"></i></a></li>
                    <li class="text-danger-600"><a href="#" class="delete" wiki-id="{{$wiki->id}}"><i class="icon-trash"></i></a></li>
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
</div>


<script>
    $('.delete').click(function(){
        var isu_id = $(this).attr('wiki-id');
        swal({
                title: "Yakin?",
                text: "Mau dihapus data wiki ini ??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                if (willDelete) {
                   window.location = "/wiki/"+isu_id+"/delete";
                   
                }
                });
    });
</script>

@endsection