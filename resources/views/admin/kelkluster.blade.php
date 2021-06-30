@extends('layouts.master1')
@section('tittle',"Data Kluster")
@section('conten')

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">DATA KLUSTER</h5>
        <div class="heading-elements">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambah-forumdiskusi"><i class="icon-plus3 position-left"></i> Tambah </button>
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
                <th>Nama Kluster</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        
        <tbody>
           @foreach ($data_kluster as $kluster)
           <tr>
               <td>{{$kluster->id}}</td>
               <td>{{$kluster->nama_kluster}}</td>
               <td>
                <ul class="icons-list">
                    <li class="text-primary-600"><a href="#" data-toggle="modal" data-target="#modal-edit-forumdiskusi{{$kluster->id}}"><i class="icon-pencil7"></i></a></li>
                    <li class="text-danger-600"><a href="#" class="delete" kluster-id="{{$kluster->id}}"><i class="icon-trash"></i></a></li>
                </ul>
            
                <div id="modal-edit-forumdiskusi{{$kluster->id}}" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Form Edit Kluster</h5>
                            </div>
                
                            <form action="kluster/{{$kluster->id}}/edit" method="POST" class="form-controller">
                                @csrf
                                <div class="modal-body">
              
                                 <div class="form-group {{$errors->has('nama_kluster') ? ' has-error' : ''}}">
                                     <div class="row">
                                         <div class="col-sm-12">
                                             <label>Nama Kluster</label>
                                            <input type="text" class="form-control" name="nama_kluster" value="{{$kluster->nama_kluster}}">
                                            @if ($errors->has('nama_kluster'))
                                                <span class="help-block" style="color: red">{{$errors->first('nama_kluster')}}</span>
                                            @endif
                                         </div>
                                     </div>
                                 </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class=" icon-cross3"></i>Batal</button> 
                                    <button type="submit" class="btn btn-primary btn-sm"><i class=" icon-checkmark3"></i>Simpan</button> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
               </td>
           </tr>   
           @endforeach
        </tbody>
       </table>
</div>

@push('detail')
    <!-- Theme JS files -->
	<script type="text/javascript" src="asset/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="asset/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="asset/js/pages/datatables_basic.js"></script>
	<!-- /theme JS files -->
@endpush

<!--Modal Tambah Forumdiskusi-->
<div id="modal-tambah-forumdiskusi" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Tambah Kluster</h5>
            </div>

            <form action="{{route('kluster.simpan')}}" method="POST" class="form-controller">
               @csrf
               <div class="modal-body">
                   <div class="form-group {{$errors->has('nama_kluster') ? ' has-error' : ''}}">
                       <div class="row">
                           <div class="col-sm-12">
                               <label>Nama Kluster</label>
                               <input type="text" class="form-control" name="nama_kluster">
                                @if ($errors->has('nama_kluster'))
                                    <span class="help-block" style="color: red">{{$errors->first('nama_kluster')}}</span>
                                @endif
                           </div>
                       </div>
                   </div>
               </div>

               <div class="modal-footer">
                   <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class=" icon-cross3"></i>Batal</button> 
                   <button type="submit" class="btn btn-primary btn-sm"><i class=" icon-checkmark3"></i>Simpan</button> 
               </div>
           </form>
        </div>
    </div>
</div>

<script>
    $('.delete').click(function(){
        var isu_id = $(this).attr('kluster-id');
        swal({
                title: "Yakin?",
                text: "Mau dihapus data kluster ini ??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                if (willDelete) {
                   window.location = "/kluster/"+isu_id+"/hapus";
                   
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