<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {   
        
        return view('dashboard.admin.index');
    }

    public function pengguna(Request $request)
    {
        $cari = $request->get('search');
        $users = User::when($cari, function($q) use($cari){
                            $q->where('name', 'LIKE', '%' . $cari . '%')
                            ->orWhere('email', 'LIKE', '%' . $cari . '%')
                            ->orWhere('nomor_telepon', 'LIKE', '%' . $cari . '%');
                        })->paginate(5);
        return view('dashboard.admin.pengguna',compact('users','cari'));
    }

    public function store(Request $request)
    {
        $users = User::create([
            'role'                  => $request->role,
            'name'                  => $request->name,
            'email'                 => $request->email,
            'nomor_telepon'         => $request->nomor_telepon,
            'password'              => bcrypt($request->password),
        ]);
        return redirect()->route('dashboard.admin.pengguna')->with('sukses', 'Data berhasil dibuat');
    }

    public function update(Request $request, $id)
    {
        $users = User::where('id',$id)->update([
            'role'                  => $request->role,
            'name'                  => $request->name,
            'email'                 => $request->email,
            'nomor_telepon'         => $request->nomor_telepon,
            'password'              => bcrypt($request->password),
        ]);
        return redirect()->route('dashboard.admin.pengguna')->with('sukses', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $users = User::where('id',$id)->delete();
        return redirect()->route('dashboard.admin.pengguna')->with('sukses', 'Data berhasil dihapus');
    }
}
