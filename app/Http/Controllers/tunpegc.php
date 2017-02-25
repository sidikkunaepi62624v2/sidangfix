<?php

namespace App\Http\Controllers;

use Request;
use App\tunjangan_pegawaim;
use App\tunjanganm;
use App\pegawaim;
use App\User;

class tunpegc extends Controller
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
        $tunpegv=tunjangan_pegawaim::all();
        $tunjanganv=tunjanganm::all();
        $pegawaiv=pegawaim::all();
        $userv=User::all();
        return view('tunpegf.index', compact('tunpegv', 'tunjanganv', 'pegawaiv', 'userv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tunpegv=tunjangan_pegawaim::all();
        $tunjanganv=tunjanganm::all();
        $pegawaiv=pegawaim::all();
        $userv=User::all();
        return view('tunpegf.create', compact('tunpegv', 'tunjanganv', 'pegawaiv', 'userv'));
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
        $tunpegv=request::all();
        tunjangan_pegawaim::create($tunpegv);
        return redirect('Tunjangan_Pegawai');
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
        $userv=User::all();
        $tunjanganv=tunjanganm::all();
        $tunpegv=tunjangan_pegawaim::find($id);
        $cobav=tunjangan_pegawaim::all();
        $pegawaiv=pegawaim::all();
        return view('tunpegf.edit', compact('tunpegv', 'userv', 'tunjanganv', 'cobav', 'pegawaiv'));
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
        $tunpegupdate = Request::all();
        $tunpegv= tunjangan_pegawaim::find($id);
        $tunpegv->update($tunpegupdate);
        return redirect('Tunjangan_Pegawai');
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
        tunjangan_pegawaim::find($id)->delete();
        return redirect('Tunjangan_Pegawai');
    }
}
