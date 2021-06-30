@extends('layouts.master1')
@section('tittle',"Isu Permasalahan")
@section('conten')

<div class="row">
	<div class="col-md-9">
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Daftar Isu</h5>
			</div>

			<div class="table-responsive ">
				<table class="table">
					<thead>
						<tr class="">
							<th>Kategori</th>
							<th>Kluster</th>
							<th>Permasalahan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					@foreach ($data_newisu as $isu)
					<tbody>
						<tr class="success">
							<td>{{$isu->jenis->nama}}</td>
							<td>{{$isu->kluster->nama_kluster}}</td>
							<td>{{$isu->nama_permasalahan}}</td>
							<td>
								<a href="/isu/lihat/{{$isu->id}}" class="btn btn-primary btn-sm">Lihat</a>
								
							</td>
						</tr>
					</tbody>
					@endforeach
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="sidebar-detached">
			<div class="sidebar sidebar-default sidebar-separate">
				<div class="sidebar-content">

					<div class="sidebar-category">
						<div class="category-title">
							<span>Cari</span>
							<ul class="icons-list">
								<li><a href="#" data-action="collapse"></a></li>
							</ul>
						</div>

						<div class="category-content">
							<form action="{{route('helpdesk')}}" method="GET">
								<div class="has-feedback has-feedback-left">
									<input type="text" class="form-control" name="cari" placeholder="By permasalahan" value="{{Request::get('cari')}}">
									<div class="form-control-feedback">
										<i class="icon-search4 text-size-base text-muted"></i>
									</div>
								</div>
							</form>
						</div>
					</div>

					<div class="sidebar-category">
						<div class="category-title">
							<span>Kategori</span>
							<ul class="icons-list">
								<li><a href="#" data-action="collapse"></a></li>
							</ul>
						</div>

						<div class="category-content no-padding">
							<ul class="navigation">
								@foreach ($jenis as $item)
								<li>
									<a href="{{ route('helpdesk.jenis', $item->id) }}" class="text-primary">
										<span class="text-muted text-size-small text-regular pull-right"></span>
										<i class="icon-pushpin"></i>
										{{$item->nama}}
									</a>
								</li>
								@endforeach
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>		

@endsection