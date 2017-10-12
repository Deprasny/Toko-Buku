<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
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
            $user = User::orderBy('id', 'DESC')->where('nama','LIKE','%'. $cari .'%')->orWhere('alamat','LIKE','%'. $cari .'%')->orWhere('telepon','LIKE','%'. $cari .'%')->paginate(10);

              
        }else{
            $user = User::orderBy('id', 'DESC')->paginate(10);
        
        }
        return view('user.index', compact('user','cari')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = User::findOrfail($id);
        return view('user.detail')->with('detail', $detail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = User::where('id', $id)->first();
        return view('user.edit')->with('edit', $edit);
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
        $update = User::where('id', $id)->first();
        $update->nama = $request['nama'];
        $update->alamat = $request['alamat'];
        $update->telepon = $request['telepon'];
        $update->status = $request['status'];
        $update->username = $request['username'];
        $update->akses = $request['akses'];
        $update->update();

        return redirect()->to('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = User::find($id);
        $hapus->delete();

        return redirect()->to('/user');
    }
}
