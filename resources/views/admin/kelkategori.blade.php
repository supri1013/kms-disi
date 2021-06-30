@extends('layouts.master1')
@section('tittle',"Data Kategori")
@section('conten')

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">DATA KATEGORI DOKUMEN</h5>
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
                <th>Nama Kategori</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        
        <tbody>
           @foreach ($data_kategori as $kategori)
           <tr>
               <td>{{$kategori->id}}</td>
               <td>{{$kategori->nama}}</td>
               <td>
                <ul class="icons-list">
                    <li class="text-primary-600"><a href="#" data-toggle="modal" data-target="#modal-edit-forumdiskusi{{$kategori->id}}"><i class="icon-pencil7"></i></a></li>
                    <li class="text-danger-600"><a href="#" class="delete" kategori-id="{{$kategori->id}}"><i class="icon-trash"></i></a></li>
                </ul>

                   <div id="modal-edit-forumdiskusi{{$kategori->id}}" class="modal fade">
                       <div class="modal-dialog">
                           <div class="modal-content">
                               <div class="modal-header">
                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                                   <h5 class="modal-title"> Edit Kategori Dokumen</h5>
                               </div>
                   
                               <form action="kategori/{{$kategori->id}}/update" method="POST" class="form-controller">
                                   @csrf
                                   <div class="modal-body">
                                    <div class="form-group {{$errors->has('nama') ? ' has-error' : ''}}" >
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label>Nama Kategori</label>
                                               <input type="text" class="form-control" name="nama" value="{{$kategori->nama}}">
                                                @if ($errors->has('nama'))
                                                <span class="help-block">{{$errors->first('nama')}}</span>
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
                <h5 class="modal-title">Tambah Kategori Dokumen</h5>
            </div>

            <form action="{{route('kategori.simpan')}}" method="POST" class="form-controller">
               @csrf
               <div class="modal-body">
                   <div class="form-group {{$errors->has('nama') ? ' has-error' : ''}}">
                       <div class="row">
                           <div class="col-sm-12">
                               <label>Nama Kategori</label>
                              <input type="text" class="form-control" name="nama">
                              @if ($errors->has('nama'))
                                    <span class="help-block" style="color: red">{{$errors->first('nama')}}</span>
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
       var isu_id = $(this).attr('kategori-id');
       swal({
               title: "Yakin?",
               text: "Mau dihapus data kategori ini ??",
               icon: "warning",
               buttons: true,
               dangerMode: true,
               })
               .then((willDelete) => {
                   console.log(willDelete);
               if (willDelete) {
                  window.location = "/kategori/"+isu_id+"/delete";
                  
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