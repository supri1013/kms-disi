<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Jenis;
use App\Kluster;
class KategoriController extends Controller
{
    //tampildatakelolakategori
    public function tampildata()
    {
        $data_kategori = \App\Kategori::all();
        return view ('admin.kelkategori', compact('data_kategori'));

    }

    //simpandatakategori
    public function simpan(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required'
        ]);
        
        $data_kategori=\App\Kategori::create($request->all());
        return redirect()->back()->with('sukses', 'Data Berhasil Ditambahkan');
    }

    //simpanupdatefaq
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required'
        ]);

        $faq = \App\Kategori::find($id);
        $faq->update($request->all());
        return redirect()->back()->with('sukses', 'Data Berhasil Diedit');
    }

    //deletedatafaq
    public function postdelete($id)
    {
        $data_kategori = Jenis::find($id);
        $data_kategori->delete($data_kategori);
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }





    //tampildatakelolakategorilain
    public function showdata()
    {
      $data_kategori = Jenis::all();
      return view ('admin.kelkategorilain', compact('data_kategori'));
    }

    //simpandatafaq
    public function postdata(Request $request)
    { 
        $this->validate($request, [
            'nama' => 'required'
        ]);

        $data_kategori=Jenis::create($request->all());
        return redirect()->back()->with('sukses', 'Data Berhasil Ditambahkan');
    }
    
    //simpanupdatekategorilain
    public function postupdate(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required'
        ]);
        $faq = Jenis::find($id);
        $faq->update($request->all());
        return redirect()->back()->with('sukses', 'Data Berhasil Diedit');
    }

     
 

    



    //deletedatafaq
    public function delete($id)
    {
        $data_kategori = \App\Kategori::find($id);
        $data_kategori->delete($data_kategori);
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }

   
    //tampildatakluster
    public function indexkluster()
    {
        $data_kluster = Kluster::all();
        return view ('admin.kelkluster', compact('data_kluster'));
    }

    //simpandatakluster
    public function simpankluster(Request $request)
    {
        $this->validate($request, [
            'nama_kluster' => 'required'
        ]);

        $data_kluster= Kluster::create($request->all());
        return redirect()->back()->with('sukses', 'Data Berhasil Ditambahkan');
    }
    

    //editdatakluster
    public function editkluster(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kluster' => 'required'
        ]);
        $data_kluster = Kluster::find($id);
        $data_kluster->update($request->all());
        return redirect()->back()->with('sukses', 'Data Berhasil Diedit');
    }

    //hapusdatakluster
    public function hapuskluster($id)
    {
        $data_kluster = Kluster::find($id);
        $data_kluster->delete($data_kluster);
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }
}
