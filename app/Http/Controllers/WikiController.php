<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Newwiki;
use App\Jenis;
use Illuminate\Http\UploadedFile; 
class WikiController extends Controller
{
    public function index(Request $request)
    {
    
        $cari = $request->get('cari');
        $data_newwiki = \App\Newwiki::all();

        if($cari){
            $data_newwiki = Newwiki::where("judul","LIKE","%$cari%")->get();
        }

        $data_wiki = Newwiki::latest()->get()->random(5);
        
        $jenis = Jenis::all();

        return view ('user.wiki.wiki', compact(['data_newwiki','data_wiki','jenis']));
    }

    
    
    public function bacawiki(Newwiki $newwiki)
    {
        $wiki_detail= $newwiki;
        return view ('user.wiki.wiki-baca',compact(['newwiki']));
    }


    public function tambahwiki()
    {
        return view ('user.wiki.wiki-tambah');
    }

    public function postwiki(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
            'isi_artikel' => 'required',
            'gambar' => 'required|mimes:png,jpg',
            'editor' => 'required',
            'sumber' => 'required',
        ]);
        
        //simpan data gambar ke folder public
        $isi_artikel=$request->input('isi_artikel');
        $dom = new \DomDocument();
        $dom->loadHtml($isi_artikel, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');
 
        foreach($images as $key => $img){
            $data = $img->getAttribute('src');
 
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
 
            $image_name= "/assets/images/foto/" . time().$key.'.png';
            $path = public_path() . $image_name;
 
            file_put_contents($path, $data);
            
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
 
        $isi_artikel = $dom->saveHTML();
 
        // dd($isi_artikel);
 
        //simpan data teks ke database
        $article = new Newwiki();
        $article->user_id = $request->input('user_id');
        $article->editor = $request->input('editor');       
        $article->judul = $request->input('judul');
        $article->isi_artikel =$isi_artikel;
        $article->sumber =$request->input('sumber');
        $article->deskripsi =$request->input('deskripsi');

        if($request->file('gambar')){
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'. $extension;
            $file->move('assets/images/foto/', $filename);
            $article->gambar = $filename;
        }

        $article->save();

        return redirect('/daftar/wiki')->with('sukses', 'Wiki Berhasil Ditambah');
    }

    public function editwiki($id)
    {
        $wiki = \App\Newwiki::find($id);
        return view ('user.wiki.wiki-edit',compact('wiki'));
    }

    public function posteditwiki(Request $request, $id)
     {
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
            'isi_artikel' => 'required',
            'gambar' => 'mimes:png,jpg',
            'editor' => 'required',
            'sumber' => 'required',
        ]);

        $isi_artikel=$request->input('isi_artikel');
        $dom = new \DomDocument();
        $dom->loadHtml($isi_artikel, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');
 
        foreach($images as $key => $img){
            $data = $img->getAttribute('src');
 
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
 
            $image_name= "/assets/images/foto/" . time().$key.'.png';
            $path = public_path() . $image_name;
 
            file_put_contents($path, $data);
            
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
 
        $isi_artikel = $dom->saveHTML();

        
        
        //  dd($id);
         $data_wiki = \App\Newwiki::find($id);

         $data_wiki->isi_artikel = $request->input('isi_artikel');
         $data_wiki->judul = $request->input('judul');
         $data_wiki->editor = $request->input('editor');
         $data_wiki->sumber = $request->input('sumber');
         $data_wiki->gambar = $request->input('gambar');
         $data_wiki->deskripsi = $request->input('deskripsi');
         
         if ($request->hasfile('gambar')) {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'. $extension;
            $file->move('assets/images/foto/', $filename);
            $data_wiki->gambar = $filename;
        }

        $data_wiki->save();

         return redirect('/wiki')->with('sukses', 'Berhasil Edit Wiki');
     }


     public function wikisaya(Request $request)
     {
         $data_wiki= Newwiki::with ('user')->get();
 
         return view ('user.wiki.wikisaya', compact('data_wiki'));
     }



//ADMIN--------------------------------------------------------------------------
    public function tambahdata()
    {
        return view ('admin.kelwiki.tambah-wiki');
    }

    public function simpan(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
            'isi_artikel' => 'required',
            'gambar' => 'required|mimes:png,jpg',
            'editor' => 'required',
            'sumber' => 'required',
        ]);

        //simpan data gambar ke folder public
        $isi_artikel=$request->input('isi_artikel');
        $dom = new \DomDocument();
        $dom->loadHtml($isi_artikel, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');
 
        foreach($images as $key => $img){
            $data = $img->getAttribute('src');
 
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
 
            $image_name= "/assets/images/foto/" . time().$key.'.png';
            $path = public_path() . $image_name;
 
            file_put_contents($path, $data);
            
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
 
        $isi_artikel = $dom->saveHTML();
 
        //simpan data teks ke database
        $article = new Newwiki();
        $article->user_id = $request->input('user_id');
        $article->editor = $request->input('editor');       
        $article->judul = $request->input('judul');
        $article->isi_artikel =$isi_artikel;
        $article->sumber =$request->input('sumber');
        $article->deskripsi =$request->input('deskripsi');

        if($request->file('gambar')){
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'. $extension;
            $file->move('assets/images/foto/', $filename);
            $article->gambar = $filename;
        }
        $article->save();
        return redirect('Kelola-Wiki')->with('sukses', 'Data Berhasil Ditambahkan');
    }

    //tampilkeldatawiki
    public function tampildata()
    {
        $data_newwiki = \App\Newwiki::all();
        return view ('admin.kelwiki.kelwiki', compact('data_newwiki'));
    }

     //deletedatawiki
     public function delete($id)
     {
         $data_newwiki = \App\Newwiki::find($id);
         $data_newwiki->delete($data_newwiki);
         return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
     }

     public function haledit($id)
    {
        $data_wiki = \App\Newwiki::find($id);
        return view ('admin.kelwiki.haledit',compact('data_wiki'));
    }

    public function updatewiki(Request $request, $id)
     {
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
            'isi_artikel' => 'required',
            'gambar' => 'mimes:png|jpg',
            'editor' => 'required',
            'sumber' => 'required',
        ]);

        $isi_artikel=$request->input('isi_artikel');
        $dom = new \DomDocument();
        $dom->loadHtml($isi_artikel, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');
 
        foreach($images as $key => $img){
            $data = $img->getAttribute('src');

            $data = base64_decode($data);
 
            $image_name= "/assets/images/foto/" . time().$key.'.png';
            $path = public_path() . $image_name;
 
            file_put_contents($path, $data);
            
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
 
        $isi_artikel = $dom->saveHTML();

        $isi_artikel = Newwiki::find($id);

        $isi_artikel->isi_artikel = $request->input('isi_artikel');
        $isi_artikel->judul = $request->input('judul');
        $isi_artikel->deskripsi = $request->input('deskripsi');
        $isi_artikel->editor = $request->input('editor');
        $isi_artikel->sumber = $request->input('sumber');

        if ($request->hasfile('gambar')) {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'. $extension;
            $file->move('assets/images/foto/', $filename);
            $isi_artikel->gambar = $filename;
        }

        $isi_artikel->save();
        return redirect('/Kelola-Wiki')->with('sukses', 'Data Berhasil Diedit');
     }


}
