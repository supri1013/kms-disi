@extends('layouts.master1')
@section('tittle',"Forum Diskusi")
@section('conten')

<div class="row">
	<div class="col-md-12">
	    @if (session('sukses'))
		<div class="alert alert-info alert-bordered alert-rounded">
			<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
			{{session('sukses')}}
		</div> 
		@endif
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h6 class="panel-title">  {{$forumdiskusi->judul}}</h6>
		</div>
		<div class="panel-body">
			{{$forumdiskusi->konten}}
		</div>
		<div class="panel-footer panel-footer-transparent">
			<div class="heading-elements">
				<ul class="list-inline list-inline-separate heading-text text-muted">
					<form action="" method="POST">
						@csrf
						<input type="hidden" name="forumdiskusi_id" value="{{$forumdiskusi->id}}">
						<input type="hidden" name="parent" value="0">
						<textarea style="margin-top: 10px; margin-left:10px margin-right:5px" name="konten" id="komentar-utama"  rows="1" cols="300" class="form-control border-blue {{$errors->has('konten') ? ' has-error' : ''}}" placeholder="Komentar anda.."></textarea>
						@if ($errors->has('konten'))
                    		<span class="help-block" style="color: red">{{$errors->first('konten')}}</span>
                		@endif
						<input type="submit" class="btn btn-primary btn-xs" value="Kirim" style="margin-top: 5px">
					</form>
				</ul>
			</div>
		</div>
	</div>
	@foreach ($forumdiskusi->komentar()->where('parent',0)->orderBy('created_at','desc')->get() as $komen)
	<ul>
		<div class="panel panel-flat border-left-green border-xlg">
			<div class="panel-body">
				
			<a href="#" class="text-muted text-green">{{$komen->user->name}}</a> <a href="" class="text-muted" >{{$komen->created_at}}</a> : {{$komen->konten}}
			</div>
			<div class="panel-footer panel-footer-transparent">
				<div class="heading-elements">
					<ul class="list-inline list-inline-separate heading-text text-muted">
						<form action="" method="POST">
							@csrf
							<input type="hidden" name="forumdiskusi_id" value="{{$forumdiskusi->id}}">
							<input type="hidden" name="parent" value="{{$komen->id}}">
							<textarea style="margin-top: 10px; margin-left:10px margin-right:5px" name="konten" id="komentar-utama"  rows="1" cols="300" class="form-control border-green" placeholder="Komentar anda.."></textarea>
							<input type="submit" class="btn btn-primary btn-xs" value="Kirim" style="margin-top: 5px" >
						</form>
					</ul>
				</div>
			</div>
		</div>
		@foreach ($komen->childs as $child)
											
											
		<ul>
			<div class="panel panel-flat border-left-danger border-lg">
				<div class="panel-body">
	
				<a href="#" class="text-muted text-danger">{{$child->user->name}}</a> <a href="" class="text-muted" >{{$child->getCreatedAtAttribute()}}</a> : {{$child->konten}}
				</div>
			</div>
		</ul>
		@endforeach
		
	</ul>
	@endforeach
	</div>
</div>
@endsection