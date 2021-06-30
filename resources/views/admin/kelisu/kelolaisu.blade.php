@extends('layouts.master1')
@section('tittle',"Data Isu")
@section('conten')

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">DATA ISU</h5>
        <div class="heading-elements">
            <a href="{{route('isutambah')}}" class="btn btn-primary btn-sm"><i class="icon-plus3 position-left"></i> Tambah</a>
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
                <th>Pic Piket</th>
                <th>Pelapor</th>
                <th>Permasalahan</th>
                <th>Kluster</th>
                <th>Penyelesaian</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($data_newisu as $isu)

            <tr>
                <td>{{$isu->user->name}}</td>
                <td>{{$isu->pelapor}}</td>
                <td>{{$isu->nama_permasalahan}}</td>
                <td>{{$isu->kluster->nama_kluster}}</td>
                <td>{{$isu->penyelesaian}}</td>
                <td>
                    <ul class="icons-list">
                        <li class="text-primary-600"><a href="/isu/{{$isu->id}}/editisu"><i class="icon-pencil7"></i></a></li>
                        <li class="text-danger-600"><a href="#" class="delete" isu-id="{{$isu->id}}"><i class="icon-trash"></i></a></li>
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
        var isu_id = $(this).attr('isu-id');
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
                   window.location = "/isu/"+isu_id+"/delete";
                   
                }
                });
    });
</script>

@endsection