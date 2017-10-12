<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;
use App\User;
use App\Buku;
use Carbon\Carbon;

class PenjualanController extends Controller
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
        $user = User::all();
        $buku = Buku::all();

        if(null !== 'search') {
            $cari = $request->get('search');
            $penjualan = Penjualan::orderBy('id', 'DESC')
                ->where('jumlah','LIKE','%'. $cari .'%')
                ->orWhere('tanggal','LIKE','%'. $cari .'%')
                ->orWhere('total','LIKE','%'. $cari .'%')
                ->orWhereHas('buku', function ($query) use ($cari) {
                     $query->where('judul', 'like', '%'.$cari.'%');
                    })
                ->orWhereHas('user', function ($query) use ($cari) {
                     $query->where('nama', 'like', '%'.$cari.'%');
                    })
                ->paginate(10);

              
        }else{
             $penjualan = Penjualan::orderBy('id', 'DESC')->paginate(10);
        
        }
        return view('penjualan.index', compact('penjualan','cari','user','buku')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $buku = Buku::all();
        return view('penjualan.add', compact('user','buku'));
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
            'user_id' => 'required',
            'buku_id' => 'required',
            'jumlah' => 'required',
        ]);

        $jumlah = $request['jumlah'];
        $harga = $request['harga'];
        $ppn = $request['ppn'];
        $diskon = $request['diskon'];

        $total = $harga * $jumlah;
        $total_ppn = $total * $ppn / 100;
        $total_diskon = $total_ppn * $diskon / 100;

        $total_semua = $total + $total_ppn + $total_diskon;

         $tambah = new Penjualan();
         $tambah->user_id = $request['user_id'];
         $tambah->buku_id = $request['buku_id'];
         $tambah->total =  $total_semua;
         $tambah->jumlah = $request['jumlah'];
         $tambah->tanggal = Carbon::now();

         $tambah->save();

         $jumlah = $request['jumlah'];
         $tambah_buku = Buku::where('id', '=', $request['buku_id'])->first();
         $tambah_buku->stok -= $jumlah;
         $tambah_buku->update();

         return redirect()->to('/penjualan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::all();
        $buku = Buku::all();
        $penjualan = Penjualan::where('id', $id)->first();
        return view('penjualan.edit', compact('penjualan','buku','user'));
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

        return redirect()->to('/penjualan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Penjualan::find($id);
        $hapus->delete();

        return redirect()->to('/penjualan');
    }
}
