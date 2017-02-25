<?php

namespace App\Http\Controllers;

use Request;
use App\tunjanganm;
use App\jabatanm;
use App\golonganm;

class tunjanganc extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('Bendahara');
    }
    public function index()
    {
        //
        $tunjanganv=tunjanganm::all();
        $jabatanv=jabatanm::all();
        $golonganv=golonganm::all();
        return view('tunjanganf.index', compact('tunjanganv', 'jabatanv', 'golonganv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jabatanv=jabatanm::all();
        $golonganv=golonganm::all();
        return view('tunjanganf.create', compact('jabatanv', 'golonganv'));
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
        $tunjanganv=Request::all();
        tunjanganm::create($tunjanganv);
        return redirect ('Tunjangan');
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
        $jabatanv=jabatanm::all();
        $golonganv=golonganm::all();
        $tunjanganv=tunjanganm::find($id);
        return view('tunjanganf.edit', compact('tunjanganv', 'jabatanv', 'golonganv'));
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
        $tunjanganupdate = Request::all();
        $tunjanganv= tunjanganm::find($id);
        $tunjanganv->update($tunjanganupdate);
        return redirect('Tunjangan');
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
        tunjanganm::find($id)->delete();
        return redirect('Tunjangan');
    }
}
