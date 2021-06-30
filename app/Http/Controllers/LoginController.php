<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    //tampil login
    public function index()
    {
        return view('log-in');
    }

    //login sistem
    public function poslogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email','password'))){
    		
            if(auth()->user()->role == 'admin'){
                return redirect('/dashboard')->with('sukses', 'Berhasil Login||Selamat Datang Admin'); 
            }
            return redirect('home-user')->with('sukses', 'Berhasil Login');
    	}

        return redirect('/log-in')->with('sukses', 'Email atau Password Tidak Tersedia');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/log-in');
    }
    
    //tampil login
    public function homeindex()
    {
        return view('user.homeindex');
    }

}
