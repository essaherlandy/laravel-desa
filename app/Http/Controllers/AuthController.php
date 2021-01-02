<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('dashboard')->with('success','Anda berhasil masuk ke sistem');
        }
        return redirect('/login');
    }
    
    public function logout()
    {
        Auth::logout();

        return redirect('/')->with('success','Anda berhasil keluar dari sistem');
    }
}
