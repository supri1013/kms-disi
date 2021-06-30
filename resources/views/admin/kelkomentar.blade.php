@extends('layouts.master1')
@section('tittle',"Data Komentar")
@section('conten')

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">DATA KOMENTAR</h5>
        <div class="heading-elements">
           
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
                <th>Isi Komentar</th>
                <th>Nama</th>
                <th>Forum Diskusi</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($data_komentar as $komentar)
            <tr>
                <td>{{$komentar->id}}</td>
                <td>{{$komentar->konten}}</td>
                <td>{{$komentar->user->name}}</td>
                <td>{{$komentar->forumdiskusi->judul}}</td>
                <td>
                    <ul class="icons-list">
                        <li class="text-primary-600"><a href="#" data-toggle="modal" data-target="#modal-edit-komentar{{$komentar->id}}"><i class="icon-pencil7"></i></a></li>
                        <li class="text-danger-600"><a href="#" class="delete" komentar-id="{{$komentar->id}}"><i class="icon-trash"></i></a></li>
                    </ul>
                    <div id="modal-edit-komentar{{$komentar->id}}" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Edit Data Komentar</h5>
                                </div>

                                <form action="komentar/{{$komentar->id}}/update" method="POST" class="form-controller">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group {{$errors->has('konten') ? ' has-error' : ''}}">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label>Komentar</label>
                                                    <textarea name="konten" id="" rows="2" class="form-control">{{$komentar->konten}}</textarea>
                                                    @if ($errors->has('konten'))
                                                        <span class="help-block" style="color: red">{{$errors->first('konten')}}</span>
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
	<script type="text/javascript" src="{{asset('assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/plugins/forms/selects/select2.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/pages/datatables_basic.js')}}"></script>
	<!-- /theme JS files -->
  @endpush

<script>
    $('.delete').click(function(){
        var isu_id = $(this).attr('komentar-id');
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
                   window.location = "/komentar/"+isu_id+"/delete";
                   
                }
                });
    });
</script>

@endsection