@extends('layouts.master1')
@section('tittle',"Data Dokumen")
@section('conten')

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">DATA DOKUMEN</h5>
        <div class="heading-elements">
            <a href="{{route('dokumen.tambah')}}" class="btn btn-primary btn-sm"><i class="icon-plus3 position-left"></i>Tambah</a>
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
                <th>Judul Dokumen</th>
                <th>Abstrak</th>
                <th>Penulis</th>
                <th>Kata Kunci</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        @foreach ($data_newdokumen as $dokumen)
        <tbody>
           
            <tr>
                <td>{{$dokumen->id}}</td>
                <td>{{$dokumen->judul_umum}}</td>
                <td>{{$dokumen->abstrak}}</td>
                <td>{{$dokumen->penulis}}</td>
                <td>{{$dokumen->kata_kunci}}</td>
                <td>
                    <ul class="icons-list">
                        <li class="text-primary-600"><a href="/dokumen/edit/{{$dokumen->id}}"><i class="icon-pencil7"></i></a></li>
                        <li class="text-teal-600"><a href="/dokumen/lihat/{{$dokumen->id}}"><i class="icon-eye"></i></a></li>
                        <li class="text-danger-600"><a href="#" class="delete" dokumen-id="{{$dokumen->id}}"><i class="icon-trash"></i></a></li>
                    </ul>
                </td>
            </tr>  
          
        </tbody>
        @endforeach
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
        var isu_id = $(this).attr('dokumen-id');
        swal({
                title: "Yakin?",
                text: "Mau dihapus data dokumen ini ??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                if (willDelete) {
                   window.location = "/dokumen/"+isu_id+"/delete";
                   
                }
                });
    });
</script>

{{-- <script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script> --}}
@endsection