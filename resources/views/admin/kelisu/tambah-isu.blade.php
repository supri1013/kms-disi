@extends('layouts.master1')
@section('tittle',"Tambah Data Isu")
@section('conten')

<div class="row">
    <div class="col-md-12">

        <form action="{{route('isu.simpan')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Tambah Data Isu<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{$errors->has('jenis_id') ? ' has-error' : ''}}">
                                <label>Kategori Isu</label>
                                    <select name="jenis_id" id="" class="form-control">
                                        <option></option>
                                        @foreach ($data_kategorilain as $kategori)
                                        <option value="{{$kategori->id}}">{{$kategori->nama}}</option>
                                        @endforeach
                                    </select>
                                @if ($errors->has('jenis_id'))
                                <span class="help-block">{{$errors->first('jenis_id')}}</span>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('kluster_id') ? ' has-error' : ''}}">
                                <label>Kluster</label>
                                <select name="kluster_id" id="" class="form-control">
                                    <option></option>
                                    @foreach ($data_kluster as $kluster)
                                    <option value="{{$kluster->id}}">{{$kluster->nama_kluster}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('kluster_id'))
                                    <span class="help-block">{{$errors->first('kluster_id')}}</span>
                                @endif
                            </div>
        
                            <div class="form-group {{$errors->has('namaob_rusak') ? ' has-error' : ''}}">
                                <label>Objek Isu</label>
                                    <input type="text" class="form-control" name="namaob_rusak" placeholder="Masukan nama aplikasi atau nama hardware yang bermasalah">
                                @if ($errors->has('namaob_rusak'))
                                    <span class="help-block">{{$errors->first('namaob_rusak')}}</span>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('bagianob_rusak') ? ' has-error' : ''}}">
                                <label>Bagian Objek</label>
                                <input type="text" class="form-control" name="bagianob_rusak" placeholder="Masukan menu aplikasi atau nama hardware yang bermasalah">
                                @if ($errors->has('bagianob_rusak'))
                                <span class="help-block">{{$errors->first('bagianob_rusak')}}</span>
                                @endif
                            </div>
        
                            <div class="form-group {{$errors->has('tanggal') ? ' has-error' : ''}}">
                                <label>Tanggal Kejadian</label>
                                    <input type="date" class="form-control" name="tanggal">
                                @if ($errors->has('tanggal'))
                                <span class="help-block">{{$errors->first('role')}}</span>
                                @endif
                            </div>
        
                            <div class="form-group {{$errors->has('jam_mulai') ? ' has-error' : ''}}">
                                <label>Jam Mulai</label>
                                    <input type="time" class="form-control" name="jam_mulai">
                                @if ($errors->has('jam_mulai'))
                                <span class="help-block">{{$errors->first('jam_mulai')}}</span>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('jam_selesai') ? ' has-error' : ''}}">
                                <label>Jam Selesai</label>
                                <input type="time" class="form-control" name="jam_selesai">
                                @if ($errors->has('jam_selesai'))
                                <span class="help-block">{{$errors->first('jam_selesai')}}</span>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('lama') ? ' has-error' : ''}}">
                                <label>Lama Waktu Perbaikan</label>
                                <input type="time" class="form-control" name="lama">
                                @if ($errors->has('lama'))
                                <span class="help-block">{{$errors->first('lama')}}</span>
                                @endif
                            </div>

                        </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group {{$errors->has('pelapor') ? ' has-error' : ''}}">
                                <label>Pelapor</label>
                                <input type="text" class="form-control" name="pelapor">
                                @if ($errors->has('pelapor'))
                                <span class="help-block">{{$errors->first('pelapor')}}</span>
                                @endif
                            </div>
        
                            <div class="form-group form-group {{$errors->has('nama_permasalahan') ? ' has-error' : ''}}">
                                <label>Nama Permasalahan</label>
                                <input type="text" class="form-control" name="nama_permasalahan">
                                @if ($errors->has('nama_permasalahan'))
                                <span class="help-block">{{$errors->first('nama_permasalahan')}}</span>
                                @endif
                            </div>
        
                            <div class="form-group {{$errors->has('penyelesaian') ? ' has-error' : ''}}">
                                <label>Penyelesaian</label>
                                    <input type="text" class="form-control" name="penyelesaian">
                                @if ($errors->has('penyelesaian'))
                                <span class="help-block">{{$errors->first('penyelesaian')}}</span>
                                @endif
                            </div>
        
                            <div class="form-group {{$errors->has('detail_permasalahan') ? ' has-error' : ''}}">
                                <label>Detail Permasalahan</label>
                                    <input type="text" class="form-control" name="detail_permasalahan">
                                @if ($errors->has('detail_permasalahan'))
                                <span class="help-block">{{$errors->first('detail_permasalahan')}}</span>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('kode') ? ' has-error' : ''}}">
                                <label>Kode</label>
                                <input type="text" class="form-control" name="kode">
                                @if ($errors->has('kode'))
                                <span class="help-block">{{$errors->first('kode')}}</span>
                                @endif
                            </div>
        
                            <div class="form-group {{$errors->has('no_tiket') ? ' has-error' : ''}}">
                                <label>Nomor Tiket</label>
                                    <input type="text" class="form-control" name="no_tiket">
                                @if ($errors->has('no_tiket'))
                                <span class="help-block">{{$errors->first('no_tiket')}}</span>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('status') ? ' has-error' : ''}}">
                                <label>Status</label>
                                <select class="select form-control" id="statuscek" name="status">
                                    <option value="selesai">Selesai</option>
                                    <option value="belum">Belum Selesai</option>
                                </select>
                                @if ($errors->has('status'))
                                <span class="help-block">{{$errors->first('status')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <a href="{{route('data.isu')}}" class="btn btn-danger btn-sm"><i class=" icon-cross3"></i>Batal</a> 
                        <button type="submit" class="btn btn-primary btn-sm"><i class=" icon-checkmark3"></i>Simpan</button> 
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection