<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Newisu;
use \App\Jenis;
use \App\Kluster;
class IsuController extends Controller
{
    //ADMIN
    
    //tampildatakelolaisu
    public function tampilisu()
    {
        $data_newisu = \App\Newisu::all();
        $data_kluster = Kluster::all();
        $data_kategorilain = Jenis::all();
        return view ('admin.kelisu.kelolaisu', compact('data_newisu','data_kluster','data_kategorilain'));
    }

     //tampil form tambah data isu
     public function isutambah()
     {
         $data_kategorilain = Jenis::all();
         $data_kluster = Kluster::all();
         return view ('admin.kelisu.tambah-isu',compact('data_kategorilain','data_kluster'));
     }

      //editisuform
      public function editisu($id)
      {
          $data_kategorilain = Jenis::all();
          $data_kluster = Kluster::all();
          $isu= \App\Newisu::find($id);
          return view ('admin.kelisu.edit-isu',compact('isu','data_kategorilain','data_kluster'));
      }

    //simpandataisu
    public function simpanisu(Request $request)
    {
        $this->validate($request, [
            'namaob_rusak' => 'required',
            'tanggal' => 'required',
            'jam_mulai' => 'required',
            'bagianob_rusak' => 'required',
            'pelapor' => 'required',
            'nama_permasalahan' => 'required',
            'status' => 'required',
            'jenis_id' => 'required'
        ]);

        $request->request->add(['user_id' => auth()->user()->id]);
        $data_newisu=\App\Newisu::create($request->all());
        return redirect('/isu')->with('sukses', 'Data Berhasil Ditambahkan');
    }

     //simpanupdateisu
     public function updateisu(Request $request, $id)
     {
        $this->validate($request, [
            'namaob_rusak' => 'required',
            'tanggal' => 'required',
            'jam_mulai' => 'required',
            'bagianob_rusak' => 'required',
            'pelapor' => 'required',
            'nama_permasalahan' => 'required',
            'status' => 'required',
            'jenis_id' => 'required'
        ]);

         $data_newisu = Newisu::find($id);
         $data_newisu->update($request->all());
         return redirect('/isu')->with('sukses', 'Data Berhasil Diedit');
     }

     //deletedataisu
    public function deleteisu($id)
    {
        $data_newisu = \App\Newisu::find($id);
        $data_newisu->delete($data_newisu);
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }


    // USER
    public function showisu(Request $request)
    {
        $cari = $request->get('cari');

        $data_newisu = \App\Newisu::all();

        if($cari){
            $data_newisu = Newisu::where("nama_permasalahan","LIKE","%$cari%")->get();
        }

        $jenis = Jenis::all();
        return view ('user.isu.helpdesk', compact('data_newisu','jenis'));
    }

    public function showjenis(Jenis $jenis)
    {
        $data_newisu = $jenis->newisu()->get();
        $jenis = Jenis::withCount('newisu')->get();
        
        return view ('user.isu.helpdesk', compact('data_newisu','jenis'));
    }


    public function saveisu(Request $request)
    {
        $this->validate($request, [
            'namaob_rusak' => 'required',
            'tanggal' => 'required',
            'jam_mulai' => 'required',
            'bagianob_rusak' => 'required',
            'pelapor' => 'required',
            'nama_permasalahan' => 'required',
            'status' => 'required',
            'jenis_id' => 'required'
        ]);

        $request->request->add(['user_id' => auth()->user()->id]);
        $data_newisu=\App\Newisu::create($request->all());
        return redirect('/isu/saya')->with('sukses', 'Data Berhasil Ditambahkan');
    }


    //halaman isu saya
    public function isusaya(Request $request)
    {
        $data_newisu= Newisu::with ('user')->get();

        return view ('user.isu.isu-saya', compact('data_newisu'));
    }

    //halaman lapor isu
    public function isulapor()
    {
        $data_kategorilain = Jenis::all();
        $data_kluster = Kluster::all();
        return view ('user.isu.lapor',compact('data_kategorilain','data_kluster'));
    }

    //halaman edit isu
    public function isusyedit($id)
    {
        $data_kategorilain = Jenis::all();
        $data_kluster = Kluster::all();
        $data_newisu = Newisu::find($id);
        return view ('user.isu.edit-isusaya',compact('data_newisu','data_kategorilain','data_kluster'));
    }

    public function isusyupdate(Request $request, $id)
     {
        $this->validate($request, [
            'namaob_rusak' => 'required',
            'tanggal' => 'required',
            'jam_mulai' => 'required',
            'bagianob_rusak' => 'required',
            'pelapor' => 'required',
            'nama_permasalahan' => 'required',
            'status' => 'required',
            'jenis_id' => 'required'
        ]);

         $data_newisu = Newisu::find($id);
         $data_newisu->update($request->all());
         return redirect('/isu/saya')->with('sukses', 'Isu Berhasil Perbaharui');
     }

     //lihat detail isu
     public function lihatisu($id)
    {
        $data_kategorilain = Jenis::all();
        $data_kluster = Kluster::all();
        $data_newisu = Newisu::find($id);
        return view ('user.isu.lihat-isusaya',compact('data_newisu','data_kategorilain','data_kluster'));
    }

}
