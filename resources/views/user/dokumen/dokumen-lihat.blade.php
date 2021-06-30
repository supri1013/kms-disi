@extends('layouts.master1')
@section('tittle',"Detail Case")
@section('conten')

   
    <div class="row">
        <div class="col-md-7">
        <iframe src="{{url('/assets/data/dokumen/'. $data->file)}}" frameborder="1" style="width: 100%; height: 800px;"></iframe>
        </div>

        <div class="col-md-5">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Meta Data</h6>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Kategori:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->kategori_id}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Judul:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->judul_umum}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Tahun:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->tahun}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Volume:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->volume}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Isu:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->isu}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Halaman:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->halaman}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Abstrak:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->abstrak}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Keyword:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->kata_kunci}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Url:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->url}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">ISBN/ISSN:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->nomor}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Penulis:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->penulis}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Publikasi:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->publikasi}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Kota:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->kota}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Edisi:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->edisi}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Editor:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->editor}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Publiser:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->publiser}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Judul II:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->judul_khusus}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Chapter:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->chapter}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Counsel:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->counsel}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Putusan:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->tanggal_putusan}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Seri:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->nomor_seri}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Kejadian:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->waktu_kejadian}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Departemen:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->departemen}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Universitas:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->universitas}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Tipe:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->tipe}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Institusi:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{$data->institusi}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="/dokpeng" class="btn btn-danger btn-sm">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection