<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasok;
use App\Distributor;
use App\Buku;

class PasokController extends Controller
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
        $distributor = Distributor::all();
        $buku = Buku::all();
        
        if(null !== 'search') {
            $cari = $request->get('search');
            $pasok = Pasok::orderBy('id', 'DESC')
                ->where('jumlah','LIKE','%'. $cari .'%')
                ->orWhere('tanggal','LIKE','%'. $cari .'%')
                ->orWhereHas('buku', function ($query) use ($cari) {
                     $query->where('judul', 'like', '%'.$cari.'%');
                    })
                ->orWhereHas('distributor', function ($query) use ($cari) {
                     $query->where('nama', 'like', '%'.$cari.'%');
                    })
                ->paginate(10);

              
        }else{
             $Pasok = Pasok::orderBy('id', 'DESC')->paginate(10);
        
        }
        return view('Pasok.index', compact('pasok','cari','distributor','buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $distributor = Distributor::all();
        $buku = Buku::all();
        return view('pasok.add', compact('distributor','buku'));
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
            'distributor_id' => 'required',
            'buku_id' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
        ]);

         $tambah = new Pasok();
         $tambah->buku_id = $request['buku_id'];
         $tambah->distributor_id = $request['distributor_id'];
         $tambah->jumlah = $request['jumlah'];
         $tambah->tanggal = $request['tanggal'];

         $tambah->save();

         $jumlah = $request['jumlah'];
         $tambah_buku = Buku::where('id', '=', $request['buku_id'])->first();
         $tambah_buku->stok += $jumlah;
         $tambah_buku->update();

         return redirect()->to('/pasok');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $distributor = Distributor::all();
        $buku = Buku::all();
        $pasok = Pasok::where('id', $id)->first();
        return view('pasok.edit', compact('pasok','buku','distributor'));
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
        $update = Pasok::where('id', $id)->first();
        $update->buku_id = $request['buku_id'];
        $update->distributor_id = $request['distributor_id'];
        $update->jumlah = $request['jumlah'];
        $update->tanggal = $request['tanggal'];
        $update->update();

        return redirect()->to('/pasok'); // ini buat kembali ke link pasok
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Pasok::find($id);
        $hapus->delete();

        return redirect()->to('/pasok');
    }
}
