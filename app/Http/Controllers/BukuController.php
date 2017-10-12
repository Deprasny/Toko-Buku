<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;

class BukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(null !== 'search') {
            $cari = $request->get('search');
            $buku = Buku::orderBy('id', 'DESC')->where('judul','LIKE','%'. $cari .'%')->orWhere('noisbn','LIKE','%'. $cari .'%')->paginate(10);

              
        }else{
            $buku = Buku::orderBy('id', 'DESC')->paginate(10);
        
        }
        return view('buku.index', compact('buku','cari')); 
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'judul' => 'required',
            'noisbn' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'stok' => 'required',
            'harga_pokok' => 'required',
            'harga_jual' =>'required',
            'ppn' => 'required',
            'diskon' => 'required',
        ]);

         $tambah = new Buku();
         $tambah->judul = $request['judul'];
         $tambah->noisbn = $request['noisbn'];
         $tambah->penulis = $request['penulis'];
         $tambah->penerbit = $request['penerbit'];
         $tambah->tahun = $request['tahun'];
         $tambah->stok = $request['stok'];
         $tambah->harga_pokok = $request['harga_pokok'];
         $tambah->harga_jual = $request['harga_jual'];
         $tambah->ppn = $request['ppn'];
         $tambah->diskon = $request['diskon'];

         $tambah->save();

         return redirect()->to('/buku');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $detail = Buku::findOrfail($id);
         return view('buku.detail')->with('detail', $detail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = buku::where('id', $id)->first();
        return view('buku.edit')->with('edit', $edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'noisbn' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'harga_pokok' => 'required',
            'harga_jual' =>'required',
            'ppn' => 'required',
            'diskon' => 'required',
        ]);

        $update = Buku::where('id', $id)->first();
        $update->judul = $request['judul'];
        $update->noisbn = $request['noisbn'];
        $update->penulis = $request['penulis'];
        $update->penerbit = $request['penerbit'];
        $update->tahun = $request['tahun'];
        $update->harga_pokok = $request['harga_pokok'];
        $update->harga_jual = $request['harga_jual'];
        $update->ppn = $request['ppn'];
        $update->diskon = $request['diskon'];
        $update->update();

        return redirect()->to('/buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Buku::find($id);
        $hapus->delete();

        return redirect()->to('/buku');
    }
}
