<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelolaPenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = User::all();
        return view('KelolaPengguna.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('KelolaPengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $Validasi = $request->validate([
            'Nama' => 'required',
            'Email' => 'required',
            'Password' => 'required',
            'Status' => 'required'
        ]);

        $user = new User();
        $user->name = $Validasi['Nama'];
        $user->email = $Validasi['Email'];
        $user->password = bcrypt($Validasi['Password']);
        $user->role = $Validasi['Status'];
        $user->save();
        
        $request->session()->flash('info', 'Akun pengguna berhasil dibuat!');
        return redirect()->route('kelolapengguna.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::find($id);
        return view('KelolaPengguna.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $Validasi = $request->validate([
            'Nama' => 'required',
            'Email' => 'required',
            'Status' => 'required'
        ]);

        $user = User::find($id);
        $user->name = $Validasi['Nama'];
        $user->email = $Validasi['Email'];
        $user->password = bcrypt($request->Password);
        $user->role = $Validasi['Status'];
        $user->update();
        
        $request->session()->flash('info', 'Akun pengguna berhasil diubah!');
        return redirect()->route('kelolapengguna.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        //
        $user = User::find($id);
        $user->delete();

        $request->session()->flash('info', 'Akun pengguna berhasil dihapus!');
        return redirect()->route('kelolapengguna.index');
    }
}
