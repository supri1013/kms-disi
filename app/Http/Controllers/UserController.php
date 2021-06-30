<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile; 
use App\User;
use Auth, Hash;
class UserController extends Controller
{
    //halaman kelola user
    public function index()
    {
        $data_users = \App\User::all();

        return view ('admin.keluser.keluser', compact('data_users'));
    }

    //halaman tambah user
    public function usertambah()
    {
        return view ('admin.keluser.tambah-user');
    }

    //tambah data user
    public function simpan(Request $request)
    {
        $this->validate($request, [
            
            'gambar' => 'mimes:jpg,png',
            'email' => 'email|unique:users',
            'password' => 'min:5|max:30',
            'alamat' => 'required',
            'name' => 'required',
            'jabatan' => 'required',
            'telepon' => 'required',
            'role' => 'required'
        ]);

        if ($request->file('gambar')) {
                $gambar = request()->file('gambar')->move("assets/images/foto", $request->file('gambar')->getClientOriginalName());
                $tambah= User::create([
                    'name'=>$request->name,
                    'role'=>$request->role,
                    'email'=>$request->email,
                    'password'=>bcrypt($request->password),
                    'jabatan'=>$request->jabatan,
                    'telepon'=>$request->telepon,
                    'alamat'=>$request->alamat,
                    'gambar' =>$gambar
                ]);
    
        } else {
            $tambah= User::create([
                'name'=>$request->name,
                'role'=>$request->role,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'jabatan'=>$request->jabatan,
                'telepon'=>$request->telepon,
                'alamat'=>$request->alamat
            ]);
        }
        
        return redirect('/user')->with('sukses', 'Data Berhasil Ditambahkan');
    }

    //halaman edit data user
    public function edit($id)
    {
        $user = User::find($id);

        return view ('admin.keluser.edit-user', compact('user'));
    }

    //simpan pembaharuan data user
    public function update(Request $request, $id)
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

        return redirect('/user')->with('sukses', 'Data Berhasil Diperbaharui');

    }

    //hapus data user
     public function delete($id)
     {
         $user = \App\User::find($id);
         
         $user->delete($user);
         return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
     }
     
    //halaman edit password
     public function editpassword($id)
     {
        $user = \App\User::find($id);

        return view ('admin.keluser.edit-password', compact('user'));
     }

    //simpan pembaharuan password
     public function simpanpassword(Request $request, $id)
     {
        $this->validate($request, [
            'password' => 'required|min:5|max:7'
        ]);

        $user = User::find($id);

        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/user')->with('sukses', 'Password Berhasil Diperbaharui');
     }
     
 
}
