@extends('layouts.master1')
@section('tittle',"Data Forum Diskusi")
@section('conten')
@if (session('sukses'))
<div class="alert bg-success alert-styled-left">
    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
    {{session('sukses')}}
</div> 
@endif
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">DATA FORUM DISKUSI</h5>
        <div class="heading-elements">
            <a href="{{route('tambah.forumdiskusi')}}" class="btn btn-primary btn-sm"><i class="icon-plus3 position-left"></i>Tambah</a>
        </div>
    </div>
    <table class="table datatable-basic">
        <thead>
            <tr>
                <th>Id</th>
                <th>Post By</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Post</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        
        <tbody>
           @foreach ($data_forumdiskusi as $forum)
            <tr>
                <td>{{$forum->id}}</td>
                <td>{{$forum->user->name}}</td>
                <td>{{$forum->judul}}</td>
                <td>{{$forum->konten}}</td>
                <td>{{$forum->created_at}}</td>
                <td>
                    <ul class="icons-list">
                        <li class="text-primary-600"><a href="/forumdiskusi/{{$forum->id}}/edit"><i class="icon-pencil7"></i></a></li>
                        <li class="text-danger-600"><a href="#" class="delete" forum-id="{{$forum->id}}"><i class="icon-trash"></i></a></li>
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
        var isu_id = $(this).attr('forum-id');
        swal({
                title: "Yakin?",
                text: "Mau dihapus data forum ini ??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                if (willDelete) {
                   window.location = "/forumdiskusi/"+isu_id+"/delete";
                   
                }
                });
    });
</script>

@endsection

