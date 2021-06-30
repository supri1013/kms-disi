@extends('layouts.master1')
@section('tittle',"Dashboard")
@section('conten')
                
@if (session('sukses'))
 <div class="alert bg-success alert-styled-left">
     <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
     {{session('sukses')}}
 </div> 
 @endif

 <h6 class="content-group text-semibold">
    Admin
    <small class="display-block"></small>
</h6>


<div class="row">
    <div class="col-sm-6 col-md-3">
        <div class="panel panel-body bg-blue-400 has-bg-image">
            <div class="media no-margin">
                <div class="media-body">
                    <h3 class="no-margin">{{App\User::all()->count()}}</h3>
                    <span class="text-uppercase text-size-mini">User</span>
                </div>

                <div class="media-right media-middle">
                    <i class="icon-user icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="panel panel-body bg-danger-400 has-bg-image">
            <div class="media no-margin">
                <div class="media-body">
                    <h3 class="no-margin">{{App\Forumdiskusi::all()->count()}}</h3>
                    <span class="text-uppercase text-size-mini">Total Forum Diskusi</span>
                </div>

                <div class="media-right media-middle">
                    <i class="icon-bag icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="panel panel-body bg-success-400 has-bg-image">
            <div class="media no-margin">
                <div class="media-left media-middle">
                    <i class="icon-pointer icon-3x opacity-75"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="no-margin">{{App\Newfaq::all()->count()}}</h3>
                    <span class="text-uppercase text-size-mini">Total FAQ</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="panel panel-body bg-indigo-400 has-bg-image">
            <div class="media no-margin">
                <div class="media-left media-middle">
                    <i class="icon-enter6 icon-3x opacity-75"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="no-margin">{{App\Newisu::all()->count()}}</h3>
                    <span class="text-uppercase text-size-mini">Total Isu</span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-sm-6 col-md-3">
        <div class="panel panel-body bg-orange-400 has-bg-image">
            <div class="media no-margin">
                <div class="media-left media-middle">
                    <i class="icon-enter6 icon-3x opacity-75"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="no-margin">{{App\Newwiki::all()->count()}}</h3>
                    <span class="text-uppercase text-size-mini">Total Wiki</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="panel panel-body bg-warning-400 has-bg-image">
            <div class="media no-margin">
                <div class="media-left media-middle">
                    <i class="icon-enter6 icon-3x opacity-75"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="no-margin">{{App\Newisu::all()->count()}}</h3>
                    <span class="text-uppercase text-size-mini">Total Dokumen</span>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="col-sm-6 col-md-3">
        <div class="panel panel-body bg-slate-400 has-bg-image">
            <div class="media no-margin">
                <div class="media-left media-middle">
                    <i class="icon-enter6 icon-3x opacity-75"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="no-margin">{{App\Newisu::all()->count()}}</h3>
                    <span class="text-uppercase text-size-mini">Total Kategori Permasalahan</span>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="col-sm-6 col-md-3">
        <div class="panel panel-body bg-pink-400 has-bg-image">
            <div class="media no-margin">
                <div class="media-left media-middle">
                    <i class="icon-enter6 icon-3x opacity-75"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="no-margin">{{App\Newisu::all()->count()}}</h3>
                    <span class="text-uppercase text-size-mini">Total Kluster</span>
                </div>
            </div>
        </div>
    </div>
    
</div> --}}
    

@endsection