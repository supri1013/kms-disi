<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KomentarController extends Controller
{
    //ADMIN KELOLA KOMENTAR

    //tampildatakelolakomentar
    public function tampildata()
    {
        $data_komentar = \App\Komentar::all();
        return view ('admin.kelkomentar', compact('data_komentar'));
    }

    //simpanupdatekomentar
    public function adminupdate(Request $request, $id)
    {
        $this->validate($request, [
            'konten' => 'required|max:500'
        ]);

        $data_komentar = \App\Komentar::find($id);
        $data_komentar->update($request->all());
        return redirect()->back()->with('sukses', 'Data Berhasil Diedit');
    }

    //deletedatakomentar
    public function admindelete($id)
    {
        $data_komentar = \App\Komentar::find($id);
        $data_komentar->delete($data_komentar);
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }
}
