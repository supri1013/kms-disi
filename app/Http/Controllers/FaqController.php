<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Newfaq;
use App\Jenis;
class FaqController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->get('cari');
        
        $data_newfaq = \App\Newfaq::all();
        
        if($cari){
            $data_newfaq = Newfaq::where("pertanyaan","LIKE","%$cari%")->get();
        }

        $jenis = Jenis::all();

        return view ('user.faq', compact('data_newfaq','jenis'));
       
    }

    public function showjenis(Jenis $jenis)
    {
        $data_newfaq = $jenis->newfaq()->get();
        $jenis = Jenis::withCount('newfaq')->get();
        
        return view ('user.faq', compact('data_newfaq','jenis'));
    }



    //ADMIN

    //tampildatakelolafaq
    public function tampildata()
    {
        $data_newfaq = \App\Newfaq::all();
        $jenis = Jenis::all();
        return view ('admin.kelfaq.kelfaq', compact('data_newfaq','jenis'));
        //return view ('admin.kelfaq');
    }

    public function faqtambah()
    {
        $jenis = Jenis::all();
        return view ('admin.kelfaq.tambah-faq',compact('jenis'));
    }

    //simpandatafaq
    public function simpan(Request $request)
    {
        $this->validate($request, [

            'pertanyaan' => 'required',
            'jawaban' => 'required',
            'jenis_id' => 'required'
        ]);
        
        $request->request->add(['user_id' => auth()->user()->id]);
        $data_newfaq=\App\Newfaq::create($request->all());

        //return $data_newfaq;

        return redirect('/Kelola/Faq')->with('sukses', 'Data Berhasil Ditambahkan');
    }

    public function faqedit($id)
    {
        $faq = Newfaq::find($id);
        $jenis = Jenis::all();
        return view ('admin.kelfaq.edit-faq',compact('faq','jenis'));
    }

    //simpanupdatefaq
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'pertanyaan' => 'required',
            'jawaban' => 'required',
            'jenis_id' => 'required'
        ]);

        $faq = \App\Newfaq::find($id);
        $faq->update($request->all());
        return redirect('Kelola/Faq')->with('sukses', 'Data Berhasil Diedit');
    }

    public function postdelete($id)
    {
        $faq = Newfaq::find($id);
        $faq->delete($faq);
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }
}
