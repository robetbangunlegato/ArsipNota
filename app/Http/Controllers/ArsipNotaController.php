<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArsipNotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Nota::all();
        return view('ArsipNota.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('ArsipNota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $Validasi=$request->validate([
            'TanggalArsip' => 'required',
            'TanggalNota' => 'required',
            'Keterangan' => 'required',
            'foto' => 'required|file|image'
        ]);

        $ekstensi = $request->foto->getClientOriginalExtension();
        $nama_baru = "foto-".time().".".$ekstensi;
        $alamat = $request->foto->storeAs('public/storage',$nama_baru);

        $notaarsip = new Nota();
        $notaarsip->tanggalnota = $Validasi['TanggalNota'];
        $notaarsip->tanggalarsip = $Validasi['TanggalArsip'];
        $notaarsip->keterangan = $Validasi['Keterangan'];
        $notaarsip->foto = $nama_baru;

        $notaarsip->save();

        $request->session()->flash('info', 'Nota berhasil diarsipkan!');
        return redirect()->route('arsipnota.index');

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
        $nota = Nota::find($id);
        return view('ArsipNota.edit')->with('nota', $nota);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $nota = Nota::find($id);
        $nota->tanggalnota = $request->TanggalNota;
        $nota->tanggalarsip = $request->TanggalArsip;
        $nota->keterangan = $request->Keterangan;
        if($request->hasFile('foto')){
            $ekstensi = $request->foto->getClientOriginalExtension();
            $nama_baru = "foto-".time().".".$ekstensi;
            $alamat = $request->foto->storeAs('public/storage/',$nama_baru);
            $nota->foto = $nama_baru;
        }
        $nota->update();

        $request->session()->flash('info', 'Data berhasil diubah!');
        return redirect()->route('arsipnota.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        //
        $nota = Nota::find($id);
        $nota->delete();

        $request->session()->flash('info', 'Arsip berhasil di hapus!');
        return redirect()->route('arsipnota.index');
    }

    // custom function
    public function getDataFilter(Request $request){
        $Validasi=$request->validate([
            'tanggal' => 'required'
        ]);

        $data = Nota::where('tanggalarsip', 'LIKE', '%'. $Validasi['tanggal'].'%')->get();
        return view('ArsipNota.index')->with('data',$data);
    }

    public function download($filename){
        
        // $path = storage_path('public/storage/storage/'.$filename);
        return response()->download('storage/storage/'.$filename);
    }
}
