<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokumenfile;
use App\Kategori;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class DokumenController extends Controller
{
    //tampil data dokumen
    public function index()
    {
        $data_newdokumen = Dokumenfile::all();
        return view ('admin.keldokumen.keldokumen',compact('data_newdokumen'));
    }

    //form tambah dokumen
    public function showform()
    {
        $data_kategori = Kategori::all();
        return view('admin.keldokumen.tambah-dokumen', compact('data_kategori'));
    }

    //form edit dokumen
    public function showedit($id)
    {
        $data= \App\Dokumenfile::find($id);
        $data_kategori = Kategori::all();
        return view('admin.keldokumen.edit-dokumen',compact('data','data_kategori'));
    }

    public function showfile($id)
    {
        $data= \App\Dokumenfile::find($id);
        // dd($data);
        return view('admin.keldokumen.lihat-dokumen',compact('data'));
    }


    //simpan dokumen
    public function simpan(Request $request)
    {
        $this->validate($request, [
            
            'judul_umum' => 'required',
            'volume' => 'required',
            'isu' => 'required',
            'halaman' => 'required',
            'abstrak' => 'required',
            'kata_kunci' => 'required',
            'nomor' => 'required',
            'file' => 'required|mimes:pdf',
            'penulis' => 'required',
            'kategori_id' => 'required'
        ]);

            $data=  Dokumenfile::create([
                    'user_id' =>$request->get('user_id'),
                    'kategori_id'=>$request->get('kategori_id'),
                    'judul_umum' =>$request->get('judul_umum'),
                    'tahun'=>$request->get('tahun'),
                    'volume'=>$request->get('volume'),
                    'isu'=>$request->get('isu'),
                    'halaman'=>$request->get('halaman'),
                    'abstrak'=>$request->get('abstrak'),
                    'kata_kunci'=>$request->get('kata_kunci'),
                    'url'=>$request->get('url'),
                    'nomor'=>$request->get('nomor'),
                    'penulis'=>$request->get('penulis'),
                    'publikasi'=>$request->get('publikasi'),
                    'kota'=>$request->get('kota'),
                    'edisi'=>$request->get('edisi'),
                    'editor'=>$request->get('editor'),
                    'publiser'=>$request->get('publiser'),
                    'judul_khusus' =>$request->get('judul_khusus'),
                    'chapter'=>$request->get('chapter'),
                    'counsel'=>$request->get('counsel'),
                    'tanggal_putusan'=>$request->get('tanggal_putusan'),
                    'nomor_seri'=>$request->get('nomor_seri'),
                    'waktu_kejadian'=>$request->get('waktu_kejadian'),
                    'departemen'=>$request->get('departemen'),
                    'universitas'=>$request->get('universitas'),
                    'tipe'=>$request->get('tipe'),
                    'institusi'=>$request->get('institusi'),
                    'file' =>$request->file('file')->getClientOriginalName()
                    ]);
                    
                    $file = request()->file('file')->move("assets/data/dokumen", $request->file('file')->getClientOriginalName());

            return redirect('/dokumen')->with('sukses', 'Data Berhasil Ditambahkan');
    }

     //edit dokumenfile
     public function update(Request $request, $id)
     {
        $this->validate($request, [
            
            'judul_umum' => 'required',
            'volume' => 'required',
            'isu' => 'required',
            'halaman' => 'required',
            'abstrak' => 'required',
            'kata_kunci' => 'required',
            'nomor' => 'required',
            'file' => 'mimes:pdf',
            'penulis' => 'required',
            'kategori_id' => 'required'
        ]);

         $data = \App\Dokumenfile::find($request->id);
         if(request()->file('file')){
                \File::delete('assets/images/file/' . $data->file);
                $file = request()->file('file')->move("assets/data/dokumen", $request->file('file')->getClientOriginalName());
                $data = \App\Dokumenfile::where('id', $request->id)->first()->update([
                    'kategori_id'=>$request->get('kategori_id'),
                    'judul_umum' =>$request->get('judul_umum'),
                    'tahun'=>$request->get('tahun'),
                    'volume'=>$request->get('volume'),
                    'isu'=>$request->get('isu'),
                    'halaman'=>$request->get('halaman'),
                    'abstrak'=>$request->get('abstrak'),
                    'kata_kunci'=>$request->get('kata_kunci'),
                    'url'=>$request->get('url'),
                    'nomor'=>$request->get('nomor'),
                    'penulis'=>$request->get('penulis'),
                    'publikasi'=>$request->get('publikasi'),
                    'kota'=>$request->get('kota'),
                    'edisi'=>$request->get('edisi'),
                    'editor'=>$request->get('editor'),
                    'publiser'=>$request->get('publiser'),
                    'judul_khusus' =>$request->get('judul_khusus'),
                    'chapter'=>$request->get('chapter'),
                    'counsel'=>$request->get('counsel'),
                    'tanggal_putusan'=>$request->get('tanggal_putusan'),
                    'nomor_seri'=>$request->get('nomor_seri'),
                    'waktu_kejadian'=>$request->get('waktu_kejadian'),
                    'departemen'=>$request->get('departemen'),
                    'universitas'=>$request->get('universitas'),
                    'tipe'=>$request->get('tipe'),
                    'institusi'=>$request->get('institusi'),
                    'file' =>$request->file('file')->getClientOriginalName()   
                ]);
         
                } else {
                    $data= Dokumenfile::where('id', $request->id)->first()->update($request->except(['file' => $request->file]));
                        }
            return redirect('/dokumen')->with('sukses', 'Data Berhasil Diedit');
     }
    

     public function delete($id)
    {
        $data_dokumen = \App\Dokumenfile::find($id);
        $data_dokumen->delete($data_dokumen);
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }



    //USER

    public function show(Request $request)
    {
        $cari = $request->get('cari');
        
        $data_newdokumen = Dokumenfile::all();

        if($cari){
            $data_newdokumen = Dokumenfile::where("judul_umum","LIKE","%$cari%")->get();
        }

        $kategori = Kategori::all();
        return view ('user.dokumen.dokpeng', compact('data_newdokumen','kategori'));
    }

    public function showkategori(Kategori $kategori)
    {
        $data_newdokumen = $kategori->dokumenfile()->get();
        $kategori = Kategori::withCount('dokumenfile')->get();
    
        return view ('user.dokumen.dokpeng', compact('data_newdokumen','kategori'));
    }

    public function tambahdokumen()
    {
        $data_kategori = Kategori::all();
        return view('user.dokumen.dokumen-tambah',compact('data_kategori'));
    }

    public function simpandokumen(Request $request)
    {
        $this->validate($request, [
            
            'judul_umum' => 'required',
            'volume' => 'required',
            'isu' => 'required',
            'halaman' => 'required',
            'abstrak' => 'required',
            'kata_kunci' => 'required',
            'nomor' => 'required',
            'file' => 'required|mimes:pdf',
            'penulis' => 'required',
            'kategori_id' => 'required'
        ]);

        $data=  Dokumenfile::create([
            'user_id' =>$request->get('user_id'),
            'kategori_id'=>$request->get('kategori_id'),
            'judul_umum' =>$request->get('judul_umum'),
            'tahun'=>$request->get('tahun'),
            'volume'=>$request->get('volume'),
            'isu'=>$request->get('isu'),
            'halaman'=>$request->get('halaman'),
            'abstrak'=>$request->get('abstrak'),
            'kata_kunci'=>$request->get('kata_kunci'),
            'url'=>$request->get('url'),
            'nomor'=>$request->get('nomor'),
            'penulis'=>$request->get('penulis'),
            'publikasi'=>$request->get('publikasi'),
            'kota'=>$request->get('kota'),
            'edisi'=>$request->get('edisi'),
            'editor'=>$request->get('editor'),
            'publiser'=>$request->get('publiser'),
            'judul_khusus' =>$request->get('judul_khusus'),
            'chapter'=>$request->get('chapter'),
            'counsel'=>$request->get('counsel'),
            'tanggal_putusan'=>$request->get('tanggal_putusan'),
            'nomor_seri'=>$request->get('nomor_seri'),
            'waktu_kejadian'=>$request->get('waktu_kejadian'),
            'departemen'=>$request->get('departemen'),
            'universitas'=>$request->get('universitas'),
            'tipe'=>$request->get('tipe'),
            'institusi'=>$request->get('institusi'),
            'file' =>$request->file('file')->getClientOriginalName()
            ]);
            
            $file = request()->file('file')->move("assets/data/dokumen", $request->file('file')->getClientOriginalName());

        return redirect('/daftar/dokumen')->with('sukses', 'Tambah Dokumen Berhasil');
    }

    public function lihatdokumen($id)
    {
        $data= \App\Dokumenfile::find($id);
        // dd($data);
        return view('user.dokumen.dokumen-lihat',compact('data'));
    }

    public function doksaya(Request $request)
    {
        $data_dokumen= Dokumenfile::with ('user')->get();

        return view ('user.dokumen.doksaya', compact('data_dokumen'));
    }

    public function doksayaedit($id)
    {
        $data = Dokumenfile::find($id);
        $data_kategori = Kategori::all();
        return view ('user.dokumen.edit-dok',compact('data','data_kategori'));
    }

    public function doksimpanedit(Request $request, $id)
    {
       $this->validate($request, [
           
           'judul_umum' => 'required',
           'volume' => 'required',
           'isu' => 'required',
           'halaman' => 'required',
           'abstrak' => 'required',
           'kata_kunci' => 'required',
           'nomor' => 'required',
           'file' => 'mimes:pdf',
           'penulis' => 'required',
           'kategori_id' => 'required'
       ]);

        $data = \App\Dokumenfile::find($request->id);
        if(request()->file('file')){
               \File::delete('assets/images/file/' . $data->file);
               $file = request()->file('file')->move("assets/data/dokumen", $request->file('file')->getClientOriginalName());
               $data = \App\Dokumenfile::where('id', $request->id)->first()->update([
                   'kategori_id'=>$request->get('kategori_id'),
                   'judul_umum' =>$request->get('judul_umum'),
                   'tahun'=>$request->get('tahun'),
                   'volume'=>$request->get('volume'),
                   'isu'=>$request->get('isu'),
                   'halaman'=>$request->get('halaman'),
                   'abstrak'=>$request->get('abstrak'),
                   'kata_kunci'=>$request->get('kata_kunci'),
                   'url'=>$request->get('url'),
                   'nomor'=>$request->get('nomor'),
                   'penulis'=>$request->get('penulis'),
                   'publikasi'=>$request->get('publikasi'),
                   'kota'=>$request->get('kota'),
                   'edisi'=>$request->get('edisi'),
                   'editor'=>$request->get('editor'),
                   'publiser'=>$request->get('publiser'),
                   'judul_khusus' =>$request->get('judul_khusus'),
                   'chapter'=>$request->get('chapter'),
                   'counsel'=>$request->get('counsel'),
                   'tanggal_putusan'=>$request->get('tanggal_putusan'),
                   'nomor_seri'=>$request->get('nomor_seri'),
                   'waktu_kejadian'=>$request->get('waktu_kejadian'),
                   'departemen'=>$request->get('departemen'),
                   'universitas'=>$request->get('universitas'),
                   'tipe'=>$request->get('tipe'),
                   'institusi'=>$request->get('institusi'),
                   'file' =>$request->file('file')->getClientOriginalName()   
               ]);
        
               } else {
                   $data= Dokumenfile::where('id', $request->id)->first()->update($request->except(['file' => $request->file]));
                       }
           return redirect('daftar/dokumen')->with('sukses', 'Edit Dokumen Berhasil');
    }
}

