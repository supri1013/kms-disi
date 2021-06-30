@extends('layouts.master1')
@section('tittle',"DATA USER")
@section('conten')

    <div class="panel panel-flat">
      <div class="panel-heading">
        <h5 class="panel-title">DATA USER</h5>
        <div class="heading-elements">
            <a href="{{route('user.tambah')}}" class="btn btn-primary btn-sm"><i class="icon-plus3 position-left"></i>Tambah</a>
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
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Foto</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>

        <tbody>
            @foreach ($data_users as $users)
                <tr>
                    <td>{{$users->id}}</td>
                    <td>{{$users->name}}</td>
                    <td>{{$users->email}}</td>
                    <td>{{$users->alamat}}</td>
                    <td><img src="{{$users->getGambar()}}" width="30" alt="Gambar"></td>
                    <td>
                        <ul class="icons-list">
                            <li class="text-primary-600"><a href="/user/{{$users->id}}/edit"><i class="icon-pencil7"></i></a></li>
                            <li class="text-danger-600"><a href="#" class="delete" users-id="{{$users->id}}"><i class="icon-trash"></i></a></li>
                            <li class="text-warning-600"><a href="/user/{{$users->id}}/edit/password"><i class="icon-key"></i></a></li>
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
      var isu_id = $(this).attr('users-id');
      swal({
              title: "Yakin?",
              text: "Mau dihapus data user ini ??",
              icon: "warning",
              buttons: true,
              dangerMode: true,
              })
              .then((willDelete) => {
                  console.log(willDelete);
              if (willDelete) {
                 window.location = "/user/"+isu_id+"/delete";
                 
              }
              });
  });
</script>

@endsection