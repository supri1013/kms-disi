@extends('layouts.master1')
@section('tittle',"Data Isu Hardware")
@section('conten')

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">DATA ISU HARDWARE</h5>
        <div class="heading-elements">
            <a href="{{route('isuhard.tambah')}}" class="btn btn-primary btn-sm"><i class="icon-plus3 position-left"></i> Tambah</a>
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
                <th>Pelapor</th>
                <th>Status</th>
                <th>Nomor Tiket</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($data_isuhard as $isuhard)

            <tr>
                <td>{{$isuhard->id}}</td>
                <td>{{$isuhard->jenis->nama}}</td>
                <td>{{$isuhard->pelapor}}</td>
                <td>{{$isuhard->status}}</td>
                <td>{{$isuhard->no_tiket}}</td>
                <td>
                    <ul class="icons-list">
                        <li class="text-primary-600"><a href="/isuhard/{{$isuhard->id}}/edit"><i class="icon-pencil7"></i></a></li>
                        <li class="text-danger-600"><a href="#" class="delete" isuhard-id="{{$isuhard->id}}"><i class="icon-trash"></i></a></li>
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
        var isuhard_id = $(this).attr('isuhard-id');
        swal({
                title: "Yakin?",
                text: "Mau dihapus data isu ini ??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                if (willDelete) {
                   window.location = "/isuhard/"+isuhard_id+"/delete";
                   
                }
                });
    });
</script>

@endsection