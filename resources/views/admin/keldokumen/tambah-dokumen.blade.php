@extends('layouts.master1')
@section('tittle',"Tambah Dokumen")
@section('conten')
<form class="form-horizontal" action="{{route('dokumen.simpan')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"> Tambah Data Dokumen</h5>
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
                    <fieldset>
                        <div class="form-group {{$errors->has('judul_umum') ? ' has-error' : ''}}">
                            <label class="col-lg-3 control-label">Judul Umum:</label>
                            <div class="col-lg-9">
                                <textarea rows="2" cols="5" class="form-control" name="judul_umum"></textarea>
                                @if ($errors->has('judul_umum'))
                                    <span class="help-block">{{$errors->first('judul_umum')}}</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Judul Khusus:</label>
                            <div class="col-lg-9">
                                <textarea rows="2" cols="5" class="form-control" name="judul_khusus" placeholder="book section/encyclopedia/journal"></textarea>
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('abstrak') ? ' has-error' : ''}}">
                            <label class="col-lg-3 control-label">Abstrak:</label>
                            <div class="col-lg-9">
                                <textarea rows="2" cols="5" class="form-control" name="abstrak"></textarea>
                                @if ($errors->has('abstrak'))
                                    <span class="help-block">{{$errors->first('abstrak')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('kategori_id') ? ' has-error' : ''}}">
                            <label class="col-lg-3 control-label">Kategori:</label>
                            <div class="col-lg-9">
                                <select data-placeholder="Select your country" name="kategori_id" class="form-control">
                                    @foreach ($data_kategori as $kategori)
                                    <option value="{{$kategori->id}}">{{$kategori->nama}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('kategori_id'))
                                    <span class="help-block">{{$errors->first('kategori_id')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('kata_kunci') ? ' has-error' : ''}}">
                            <label class="col-lg-3 control-label">Kata Kunci:</label>
                            <div class="col-lg-9">
                                <input type="text" name="kata_kunci" placeholder="kata kunci" class="form-control">
                                @if ($errors->has('kata_kunci'))
                                    <span class="help-block">{{$errors->first('kata_kunci')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('penulis') ? ' has-error' : ''}}">
                            <label class="col-lg-3 control-label">Penulis:</label>
                            <div class="col-lg-9">
                                <input type="text" name="penulis" placeholder="penulis" class="form-control">
                                @if ($errors->has('penulis'))
                                    <span class="help-block">{{$errors->first('penulis')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Kota:</label>
                            <div class="col-lg-9">
                                <input type="text" name="kota" placeholder="kota" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Publikasi:</label>
                            <div class="col-lg-9">
                                <input type="text" name="publikasi" placeholder="publikasi" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Url:</label>
                            <div class="col-lg-9">
                                <input type="text" name="url" placeholder="url" class="form-control">
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('nomor') ? ' has-error' : ''}}">
                            <label class="col-lg-3 control-label">Tahun/Kode:</label>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="date" name="tahun" placeholder="departemen" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <input type="text" name="nomor" placeholder="ISBN/DOI/ISSN" class="form-control">
                                        @if ($errors->has('nomor'))
                                            <span class="help-block">{{$errors->first('nomor')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>

                <div class="col-md-6">
                    <fieldset>
                        <div class="form-group {{$errors->has('volume') ? ' has-error' : ''}}">
                            <label class="col-lg-3 control-label">Vol/Isu/Halaman:</label>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="number" name="volume" placeholder="volume" class="form-control">
                                        @if ($errors->has('volume'))
                                            <span class="help-block">{{$errors->first('volume')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <input type="number" name="isu" placeholder="isu" class="form-control">
                                    </div>

                                    <div class="col-md-4">
                                        <input type="number" name="halaman" placeholder="halaman" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Edisi:</label>
                            <div class="col-lg-9">
                                <input type="text" name="edisi" placeholder="edisi" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Editor:</label>
                            <div class="col-lg-9">
                                <input type="text" name="editor" placeholder="editor" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Publiser:</label>
                            <div class="col-lg-9">
                                <input type="text" name="publiser" placeholder="publiser" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Chapter:</label>
                            <div class="col-lg-9">
                                <input type="text" name="chapter" placeholder="chapter" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Counsel:</label>
                            <div class="col-lg-9">
                                <input type="text" name="counsel" placeholder="counsel" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nomor Seri:</label>
                            <div class="col-lg-9">
                                <input type="number" name="nomor_seri" placeholder="seri" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Tanggal/Kejadian:</label>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="date" name="tanggal_putusan" placeholder="tanggal putusan" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <input type="time" name="waktu_kejadian" placeholder="waktu kejadian" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Dept/Univ:</label>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="departemen" placeholder="departemen" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <input type="text" name="universitas" placeholder="universitas" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Inst/Tipe:</label>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="institusi" placeholder="institusi" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <input type="text" name="tipe" placeholder="tipe" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('file') ? ' has-error' : ''}}">
                            <label>File:</label>
                            <div class="uploader"><input type="file" class="file-styled" name="file"><span class="filename" style="user-select: none;">Tidak Ada File</span><span class="action btn bg-pink-400" style="user-select: none;">Choose File</span></div>
                            <span class="help-block">Format: pfd.</span>
                            @if ($errors->has('file'))
                            <span class="help-block">{{$errors->first('file')}}</span>
                            @endif
                        </div>
                </div>
            </div>
            
           
            <div class="text-right">
                <a href="/dokumen" class="btn btn-danger btn-sm"><i class=" icon-cross3"></i>Batal</a>
                <button type="submit" class="btn btn-primary btn-sm"><i class=" icon-checkmark3"></i>Simpan</button>
            </div>
        </div>
    </div>
</form>


@push('detail')
    <!-- Theme JS files -->
	<script type="text/javascript" src="asset/js/plugins/forms/selects/select2.min.js"></script>
	<!-- /theme JS files -->
@endpush
@endsection