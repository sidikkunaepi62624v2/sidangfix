<?php

namespace App\Http\Controllers;

use Request;
use App\kategori_lemburm;
use App\jabatanm;
use App\golonganm;

class kalemc extends Controller
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
        $kalemv=kategori_lemburm::all();
        return view('kalemf.index', compact('kalemv'));
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
        $jabatanv=jabatanm::all();
        $golonganv=golonganm::all();
        return view('kalemf.create', compact('kalemv', 'jabatanv', 'golonganv'));
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
        $kalemv=request::all();
        kategori_lemburm::create($kalemv);
        return redirect('Kategori_Lembur');
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
        $kalemv=kategori_lemburm::find($id);
        $jabatanv=jabatanm::all();
        $golonganv=golonganm::all();
        return view('kalemf.edit', compact('kalemv', 'jabatanv', 'golonganv'));
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
        $kalemvupdate = Request::all();
        $kalemv= kategori_lemburm::find($id);
        $kalemv->update($kalemvupdate);
        return redirect('Kategori_Lembur');
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
        kategori_lemburm::find($id)->delete();
        return redirect('Kategori_Lembur');
    }
}
