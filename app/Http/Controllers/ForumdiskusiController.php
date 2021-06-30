<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Forumdiskusi;
use App\Komentar;
use App\Jenis;
use App\User;
class ForumdiskusiController extends Controller
{

    // tampil halaman list
    public function forum(Request $request)
    {
        $cari = $request->get('cari');

        $data_list=Forumdiskusi::with ('user')->get();

        if($cari){
            $data_list = Forumdiskusi::where("judul","LIKE","%$cari%")->get();
        }

        $data_forum = Forumdiskusi::latest()->get()->random(5);

        $jenis = Jenis::all();

        return view ('user.forumdiskusi.list',compact(['data_list','jenis','data_forum']));
    }

    //form tambah forum
    public function tambah()
    {
        return view ('user.forumdiskusi.tambah-forum');
    }

    //simpan forum
    public function simpan(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'konten' => 'required'
        ]);

        $request->request->add(['user_id' => auth()->user()->id]);
        $forumdiskusi=Forumdiskusi::create($request->all());

        return redirect('/forum/saya')->with('sukses', 'Forum Diskusi Berhasil Dibuat');
    }

    //halaman edit forum
    public function forumsayaedit($id)
    {
        $forumdiskusi = Forumdiskusi::find($id);
        return view ('user.forumdiskusi.edit-forum',compact('forumdiskusi'));
    }

    //simpan edit forum
    public function simpanedit(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'konten' => 'required'
        ]);

        $forumdiskusi = Forumdiskusi::find($id);
        $forumdiskusi->update($request->all());
        return redirect('/forum/saya')->with('sukses', 'Forum Diskusi Berhasil Diedit');
    }

    public function index(Forumdiskusi $forumdiskusi)
    {
        return view ('user.forumdiskusi.forumdiskusi',compact(['forumdiskusi']));
    }

    public function postkomentar(Request $request)
    {
        $this->validate($request, [
            'konten' => 'required|max:500'
        ]);
     
        $request->request->add(['user_id'=>auth()->user()->id]);
        $komentar = Komentar::create($request->all());
        return redirect()->back()->with('sukses', 'Komentar Terkirim');
    }

    public function forumsaya(Request $request)
    {
        $data_list=Forumdiskusi::with ('user')->get();

        return view ('user.forumdiskusi.forumsaya', compact('data_list'));
    }

    //KELOLA ADMIN-------------------------------------------------------------------//

     //tampildatakelolaforum
     public function tampildata()
     {
         $data_forumdiskusi = \App\Forumdiskusi::all();
         return view ('admin.kelforum.kelforumdiskusi', compact('data_forumdiskusi'));
     }

     //halaman tambah forum diskusi
     public function tambahforum()
     {
         return view ('admin.kelforum.tambah-forumdiskusi');
     }

    //simpandataforumdiskusi
    public function adminsimpan(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'konten' => 'required'
        ]);

        $request->request->add(['user_id'=>auth()->user()->id]);
        $data_forumdiskusi=Forumdiskusi::create($request->all());
        return redirect('/forum-diskusi')->with('sukses', 'Data Berhasil Ditambahkan');
    }

    //halaman edit forum diskusi
    public function editforum($id)
    {
        $forum = \App\Forumdiskusi::find($id);

        return view ('admin.kelforum.edit-forumdiskusi', compact('forum'));
    }

    //simpanupdateforumdiskusi
    public function adminupdate(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'konten' => 'required'
        ]);

        $data_forumdiskusi = \App\Forumdiskusi::find($id);
        $data_forumdiskusi->update($request->all());
        return redirect('/forum-diskusi')->with('sukses', 'Data Berhasil Diedit');
    }

     //deletedataforumdiskusi
     public function admindelete($id)
    {
        $data_forumdiskusi = \App\Forumdiskusi::find($id);
        $data_forumdiskusi->delete($data_forumdiskusi);
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }
     
}
