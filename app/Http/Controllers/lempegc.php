<?php

namespace App\Http\Controllers;

use Request;
use App\lembur_pegawaim;
use App\kategori_lemburm;
use App\pegawaim;
use App\User;

class lempegc extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('Admin');
    }
    public function index()
    {
        //
        $lempegv=lembur_pegawaim::all();
        return view('lempegf.index', compact('lempegv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kalemv=kategori_lemburm::all();
        $pegawaiv=pegawaim::all();
        return view('lempegf.create', compact('kalemv', 'pegawaiv'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $lempegv=request::all();
        lembur_pegawaim::create($lempegv);
        return redirect('Lembur_Pegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $lempegv=lembur_pegawaim::find($id);
        $kalemv=kategori_lemburm::all();
        $pegawaiv=pegawaim::all();
        $userv=User::all();
        return view('lempegf.edit', compact('lempegv', 'kalemv', 'pegawaiv', 'userv'));
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
        //
        $lempegvupdate = Request::all();
        $lempegv= lembur_pegawaim::find($id);
        $lempegv->update($lempegvupdate);
        return redirect('Lembur_Pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        lembur_pegawaim::find($id)->delete();
        return redirect('Lembur_Pegawai');
    }
}
