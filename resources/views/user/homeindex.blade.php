@extends('layouts.master1')
@section('tittle',"Home")
@section('conten')
@if (session('sukses'))
 <div class="alert bg-success alert-styled-left">
     <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
     {{session('sukses')}}
 </div> 
 @endif
				<!-- Search field -->
				<div class="panel">
					<div class="panel-body">
						<h2 class="text-center content-group-sm text-bold">
							Selamat Datang
							
						</h2>
						<h4 class="text-center content-group-lg">
							Knowledge Management System Divisi Sistem Informasi
							<small class="display-block">PT Pelabuhan Indonsia II Cabang Pontianak</small>
						</h4>
					</div>
				</div>
                <!-- /search field -->
			
				<div class="row">
					<div class="col-md-3">
						<div class="panel">
							<div class="panel-body text-center">
								<div class="icon-object border-success text-success"><i class="icon-book"></i></div>
								<h5 class="text-semibold">Dokumen</h5>
								
								<a href="/dokpeng" class="btn bg-success-400">Daftar Dokumen</a>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="panel">
							<div class="panel-body text-center">
								<div class="icon-object border-warning text-warning"><i class="icon-lifebuoy"></i></div>
								<h5 class="text-semibold">Isu</h5>
								
								<a href="/helpdesk" class="btn bg-warning-400">Daftar Isu</a>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="panel">
							<div class="panel-body text-center">
								<div class="icon-object border-blue text-blue"><i class="icon-collaboration"></i></div>
								<h5 class="text-semibold">Forum Diskusi</h5>
								
								<a href="/forum" class="btn bg-blue">Daftar Forum Diskusi</a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel">
							<div class="panel-body text-center">
								<div class="icon-object border-orange text-orange"><i class="icon-blog"></i></div>
								<h5 class="text-semibold">Wiki</h5>
								
								<a href="/wiki" class="btn bg-orange">Daftar Wiki</a>
							</div>
						</div>
					</div>
				</div>
@endsection