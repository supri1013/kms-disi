@extends('layouts.master1')
@section('tittle',"Dokumen Pengetahuan")
@section('conten')
<div class="row">
	<div class="col-md-9">
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Daftar Dokumen</h5>
				<div class="heading-elements">
				</div>
			</div>
			
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr class="">
							<th>Kategori</th>
							<th>Judul</th>
							<th>Penulis</th>
							<th>Abstrak</th>
							<th>Aksi</th>
						</tr>
					</thead>
					@foreach ($data_newdokumen as $dokumen)
					<tbody>
						<tr class="success">
							<td>{{$dokumen->kategori->nama}}</td>
							<td>{{$dokumen->judul_umum}}</td>
							<td>{{$dokumen->penulis}}</td>
							<td>{{$dokumen->abstrak}}</td>
							<td>
								<a href="/lihat/{{$dokumen->id}}/dokumen" class="btn btn-primary btn-sm">Lihat</a>
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

					<!-- Sidebar search -->
					<div class="sidebar-category">
						<div class="category-title">
							<span>Cari</span>
							<ul class="icons-list">
								<li><a href="#" data-action="collapse"></a></li>
							</ul>
						</div>

						<div class="category-content">
							<form action="{{route('dokpeng')}}" method="GET">
								<div class="has-feedback has-feedback-left">
									<input type="text" class="form-control" name="cari" placeholder="By Judul" value="{{Request::get('cari')}}">
									<div class="form-control-feedback">
										<i class="icon-search4 text-size-base text-muted"></i>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- /sidebar search -->


					<!-- Categories -->
					<div class="sidebar-category">
						<div class="category-title">
							<span>Kategori</span>
							<ul class="icons-list">
								<li><a href="#" data-action="collapse"></a></li>
							</ul>
						</div>

						<div class="category-content no-padding">
							<ul class="navigation">
								<li>
									@foreach ($kategori as $item)
									<a href="{{ route('dokumen.kategori', $item->id) }}" class="text-primary">
										<span class="badge badge-success">{{$item->Dokumenfile_count}}</span>
										<i class="icon-pushpin"></i>
										{{$item->nama}}
									</a>
									@endforeach
								</li>
							</ul>
						</div>
					</div>
					<!-- /categories -->


					<!-- Share -->
					{{-- <div class="sidebar-category">
						<div class="category-title">
							<span>Share</span>
							<ul class="icons-list">
								<li><a href="#" data-action="collapse"></a></li>
							</ul>
						</div>

						<div class="category-content no-padding-bottom text-center">
							<ul class="list-inline no-margin">
								<li>
									<a href="#" class="btn bg-indigo btn-icon content-group">
										<i class="icon-facebook"></i>
									</a>
								</li>
								<li>
									<a href="#" class="btn bg-danger btn-icon content-group">
										<i class="icon-youtube3"></i>
									</a>
								</li>
								<li>
									<a href="#" class="btn bg-info btn-icon content-group">
										<i class="icon-twitter"></i>
									</a>
								</li>
								<li>
									<a href="#" class="btn bg-orange btn-icon content-group">
										<i class="icon-feed3"></i>
									</a>
								</li>
							</ul>
						</div>
					</div> --}}
					<!-- /share -->


					<!-- Recent comments -->
					{{-- <div class="sidebar-category">
						<div class="category-title">
							<span>Recent comments</span>
							<ul class="icons-list">
								<li><a href="#" data-action="collapse"></a></li>
							</ul>
						</div>

						<div class="category-content">
							<ul class="media-list">
								<li class="media">
									<div class="media-left">
										<img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
									</div>

									<div class="media-body">
										<a href="#" class="media-heading">
											<span class="text-semibold">James Alexander</span>
										</a>

										<span class="text-muted">Who knows, maybe that...</span>
									</div>
								</li>

								<li class="media">
									<div class="media-left">
										<img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
									</div>

									<div class="media-body">
										<a href="#" class="media-heading">
											<span class="text-semibold">Margo Baker</span>
										</a>

										<span class="text-muted">That was something he...</span>
									</div>
								</li>

								<li class="media">
									<div class="media-left">
										<img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
									</div>

									<div class="media-body">
										<a href="#" class="media-heading">
											<span class="text-semibold">Jeremy Victorino</span>
										</a>

										<span class="text-muted">But that would be...</span>
									</div>
								</li>

								<li class="media">
									<div class="media-left">
										<img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
									</div>

									<div class="media-body">
										<a href="#" class="media-heading">
											<span class="text-semibold">Beatrix Diaz</span>
										</a>

										<span class="text-muted">What a strenuous career...</span>
									</div>
								</li>

								<li class="media">
									<div class="media-left">
										<img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
									</div>

									<div class="media-body">
										<a href="#" class="media-heading">
											<span class="text-semibold">Richard Vango</span>
										</a>
										
										<span class="text-muted">Other travelling salesmen...</span>
									</div>
								</li>
							</ul>
						</div>
					</div> --}}
					<!-- /recent comments -->


					<!-- Tags -->
					{{-- <div class="sidebar-category">
						<div class="category-title">
							<span>Tags</span>
							<ul class="icons-list">
								<li><a href="#" data-action="collapse"></a></li>
							</ul>
						</div>

						<div class="category-content no-padding-bottom">
							<ul class="list-inline list-inline-condensed no-margin-bottom">
								<li>
									<a href="#">
										<span class="label border-left-success label-striped content-group">Audio</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="label border-left-warning label-striped content-group">Gallery</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="label border-left-indigo label-striped content-group">Image</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="label border-left-teal label-striped content-group">Music</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="label border-left-pink label-striped content-group">Blog</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="label border-left-purple label-striped content-group">Learn</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="label border-left-blue label-striped content-group">Youtube</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="label border-left-slate label-striped content-group">Twitter</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="label border-left-orange label-striped content-group">Eugene</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="label border-left-brown label-striped content-group">Limitless</span>
									</a>
								</li>
							</ul>
						</div>
					</div> --}}
					<!-- /tags -->


					<!-- Thumbnails -->
					{{-- <div class="sidebar-category">
						<div class="category-title">
							<span>Photos from Flickr</span>
							<ul class="icons-list">
								<li><a href="#" data-action="collapse"></a></li>
							</ul>
						</div>

						<div class="sidebar-category-wrapper">
							<div class="category-content">
								<div class="row">
									<div class="col-xs-6">
										<div class="thumbnail no-padding no-border">
											<div class="thumb">
												<a href="#">
													<img src="assets/images/placeholder.jpg" alt="">
													<span class="zoom-image"><i class="icon-plus22"></i></span>
												</a>
											</div>
										</div>

										<div class="thumbnail no-padding no-border">
											<div class="thumb">
												<a href="#">
													<img src="assets/images/placeholder.jpg" alt="">
													<span class="zoom-image"><i class="icon-plus22"></i></span>
												</a>
											</div>
										</div>

										<div class="thumbnail no-padding no-border">
											<div class="thumb">
												<a href="#">
													<img src="assets/images/placeholder.jpg" alt="">
													<span class="zoom-image"><i class="icon-plus22"></i></span>
												</a>
											</div>
										</div>
									</div>

									<div class="col-xs-6">
										<div class="thumbnail no-padding no-border">
											<div class="thumb">
												<a href="#">
													<img src="assets/images/placeholder.jpg" alt="">
													<span class="zoom-image"><i class="icon-plus22"></i></span>
												</a>
											</div>
										</div>

										<div class="thumbnail no-padding no-border">
											<div class="thumb">
												<a href="#">
													<img src="assets/images/placeholder.jpg" alt="">
													<span class="zoom-image"><i class="icon-plus22"></i></span>
												</a>
											</div>
										</div>

										<div class="thumbnail no-padding no-border">
											<div class="thumb">
												<a href="#">
													<img src="assets/images/placeholder.jpg" alt="">
													<span class="zoom-image"><i class="icon-plus22"></i></span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> --}}
					<!-- /thumbnails -->


					<!-- Online users -->
					{{-- <div class="sidebar-category">
						<div class="category-title">
							<span>Online users</span>
							<ul class="icons-list">
								<li><a href="#" data-action="collapse"></a></li>
							</ul>
						</div>

						<div class="category-content">
							<ul class="media-list">
								<li class="media">
									<a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-sm img-circle" alt=""></a>
									<div class="media-body">
										<a href="#" class="media-heading text-semibold">James Alexander</a>
										<span class="text-size-mini text-muted display-block">Santa Ana, CA.</span>
									</div>
									<div class="media-right media-middle">
										<span class="status-mark border-success"></span>
									</div>
								</li>

								<li class="media">
									<a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-sm img-circle" alt=""></a>
									<div class="media-body">
										<a href="#" class="media-heading text-semibold">Jeremy Victorino</a>
										<span class="text-size-mini text-muted display-block">Dowagiac, MI.</span>
									</div>
									<div class="media-right media-middle">
										<span class="status-mark border-danger"></span>
									</div>
								</li>

								<li class="media">
									<a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-sm img-circle" alt=""></a>
									<div class="media-body">
										<a href="#" class="media-heading text-semibold">Margo Baker</a>
										<span class="text-size-mini text-muted display-block">Kasaan, AK.</span>
									</div>
									<div class="media-right media-middle">
										<span class="status-mark border-success"></span>
									</div>
								</li>

								<li class="media">
									<a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-sm img-circle" alt=""></a>
									<div class="media-body">
										<a href="#" class="media-heading text-semibold">Beatrix Diaz</a>
										<span class="text-size-mini text-muted display-block">Neenah, WI.</span>
									</div>
									<div class="media-right media-middle">
										<span class="status-mark border-warning"></span>
									</div>
								</li>

								<li class="media">
									<a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-sm img-circle" alt=""></a>
									<div class="media-body">
										<a href="#" class="media-heading text-semibold">Richard Vango</a>
										<span class="text-size-mini text-muted display-block">Grapevine, TX.</span>
									</div>
									<div class="media-right media-middle">
										<span class="status-mark border-grey-400"></span>
									</div>
								</li>
							</ul>
						</div>
					</div> --}}
					<!-- /online users -->


					<!-- Archive -->
					{{-- <div class="sidebar-category">
						<div class="category-title">
							<span>Archive</span>
							<ul class="icons-list">
								<li><a href="#" data-action="collapse"></a></li>
							</ul>
						</div>

						<div class="category-content no-padding">
							<ul class="navigation">
								<li><a href="#">January 2017</a></li>
								<li><a href="#">December 2016</a></li>
								<li><a href="#">November 2016</a></li>
								<li><a href="#">October 2016</a></li>
								<li><a href="#">September 2016</a></li>
								<li><a href="#">August 2016</a></li>
								<li><a href="#">July 2016</a></li>
							</ul>
						</div>
					</div> --}}
					<!-- /archive -->

				</div>
			</div>
		</div>
	</div>
</div>



@push('detail')
<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="assets/js/pages/form_select2.js"></script>
@endpush

@endsection