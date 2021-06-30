<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Auth, Hash;
class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $data_users = \App\User::all();
        return view ('profile', compact('data_users'));
    }

    // public function viewedit(Request $request)
    // {
    //     $data_users = \App\User::all();
    //     return view ('edit-profile', compact('data_users'));
    // }

    public function postupdate(Request $request, $id)
    {
        $this->validate($request, [
            
            'gambar' => 'mimes:jpg,png',
            'email' => 'email',
            'alamat' => 'required',
            'name' => 'required',
            'jabatan' => 'required',
            'telepon' => 'required',
            'role' => 'required'
        ]);

        $user = User::find($id);

        $user->name = $request->input('name');
        $user->role = $request->input('role');
        $user->email = $request->input('email');
        $user->jabatan = $request->input('jabatan');
        $user->telepon = $request->input('telepon');
        $user->alamat = $request->input('alamat');

        if ($request->hasfile('gambar')) {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'. $extension;
            $file->move('assets/images/foto/', $filename);
            $user->gambar = $filename;
        }

        $user->save();
        return redirect('/profile')->with('sukses', 'Pembaharuan Data Berhasil');
    }

    // public function editpassword()
    // {
    //     return view ('password-edit');
    // }

    public function updatepassword(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|min:5|max:7'
        ]);
        
       $user = User::find($id);

       $user->password = Hash::make($request->password);
       $user->save();
       return redirect('/profile')->with('sukses', 'Pembaharuan Data Berhasil');
    }
}
