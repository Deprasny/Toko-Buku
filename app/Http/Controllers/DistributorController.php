<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Distributor;

class DistributorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if(null !== 'search') {
            $cari = $request->get('search');
            $distributor = Distributor::orderBy('id', 'DESC')->where('nama','LIKE','%'. $cari .'%')->orWhere('alamat','LIKE','%'. $cari .'%')->orWhere('telepon','LIKE','%'. $cari .'%')->paginate(10);

              
        }else{
            $distributor = Distributor::orderBy('id', 'DESC')->paginate(10);
        
        }
        return view('distributor.index', compact('distributor','cari')); 
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('distributor.add');
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
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

         $tambah = new Distributor();
         $tambah->nama = $request['nama'];
         $tambah->alamat = $request['alamat'];
         $tambah->telepon = $request['telepon'];
         $tambah->save();

         return redirect()->to('/distributor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $detail = Distributor::findOrfail($id);
         return view('distributor.detail')->with('detail', $detail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Distributor::where('id', $id)->first();
        return view('distributor.edit')->with('edit', $edit);
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
        $update = Distributor::where('id', $id)->first();
        $update->nama = $request['nama'];
        $update->alamat = $request['alamat'];
        $update->telepon = $request['telepon'];
        $update->update();

        return redirect()->to('/distributor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Distributor::find($id);
        $hapus->delete();

        return redirect()->to('/distributor');
    }
}
