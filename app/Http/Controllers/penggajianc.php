<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\penggajianm ;
use App\tunjangan_pegawaim ;
use App\pegawaim ;
use App\tunjanganm ;
use App\jabatanm ;
use App\golonganm;
use App\kategori_lemburm ;
use App\lembur_pegawaim ;
use Input;
use Validator ;
use auth ;

class penggajianc extends Controller
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
        $penggajianv=penggajianm::paginate(3);
        return view('penggajianf.index',compact('penggajianv'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tunjanganv=tunjangan_pegawaim::paginate(10);
        return view('penggajianf.create',compact('tunjanganv'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penggajianv=Input::all();
        $where=tunjangan_pegawaim::where('id',$penggajianv['tunjangan_pegawai_id'])->first();
        $wherepenggajian=penggajianm::where('tunjangan_pegawai_id',$where->id)->first();
        $wheretunjangan=tunjanganm::where('id',$where->kode_tunjangan_id)->first();
        $wherepegawai=pegawaim::where('id',$where->pegawai_id)->first();
        $wherekategorilembur=kategori_lemburm::where('jabatan_id',$wherepegawai->jabatan_id)->where('golongan_id',$wherepegawai->golongan_id)->first();
        $wherelemburpegawai=lembur_pegawaim::where('pegawai_id',$wherepegawai->id)->first();
        $wherejabatan=jabatanm::where('id',$wherepegawai->jabatan_id)->first();
        $wheregolongan=golonganm::where('id',$wherepegawai->golongan_id)->first();
        $penggajianv=new penggajianm ;

        if (isset($wherepenggajian)) {
            $error=true ;
            $tunjanganv=tunjangan_pegawaim::paginate(10);
            return view('penggajianf.create',compact('tunjanganv','error'));
        }
        elseif (!isset($wherelemburpegawai)) {
            $nol=0 ;
            $penggajianv->jumlah_jam_lembur=$nol;
            $penggajianv->jumlah_uang_lembur=$nol ;
            $penggajianv->gaji_pokok=$wherejabatan->besaran_uang+$wheregolongan->besaran_uang;
            $penggajianv->total_gaji=($wheretunjangan->besaran_uang)+($wherejabatan->besaran_uang+$wheregolongan->besaran_uang);
        $penggajianv->tunjangan_pegawai_id=Input::get('tunjangan_pegawai_id');
        $penggajianv->petugas_penerima=auth::user()->name ;
        $penggajianv->status_pengambilan=Input::get('status_pengambilan');
        $penggajianv->save();
        }
        elseif (!isset($wherelemburpegawai)||!isset($wherekategorilembur)) {
            $nol=0 ;
            $penggajianv->jumlah_jam_lembur=$nol;
            $penggajianv->jumlah_uang_lembur=$nol ;
            $penggajianv->gaji_pokok=$wherejabatan->besaran_uang+$wheregolongan->besaran_uang;
            $penggajianv->total_gaji=($wheretunjangan->besaran_uang)+($wherejabatan->besaran_uang+$wheregolongan->besaran_uang);
        $penggajianv->tunjangan_pegawai_id=Input::get('tunjangan_pegawai_id');
        $penggajianv->petugas_penerima=auth::user()->name ;
        $penggajianv->status_pengambilan=Input::get('status_pengambilan');
        $penggajianv->save();
        }
        else{
            $penggajianv->jumlah_jam_lembur=$wherelemburpegawai->jumlah_jam;
            $penggajianv->jumlah_uang_lembur=$wherelemburpegawai->jumlah_jam*$wherekategorilembur->besaran_uang ;
            $penggajianv->gaji_pokok=$wherejabatan->besaran_uang+$wheregolongan->besaran_uang;
            $penggajianv->total_gaji=($wherelemburpegawai->jumlah_jam*$wherekategorilembur->besaran_uang)+($wheretunjangan->besaran_uang)+($wherejabatan->besaran_uang+$wheregolongan->besaran_uang);
            $penggajianv->tanggal_pengambilan =date('d-m-y');
            $penggajianv->tunjangan_pegawai_id=Input::get('tunjangan_pegawai_id');
            $penggajianv->petugas_penerima=auth::user()->name ;
            $penggajianv->status_pengambilan=Input::get('status_pengambilan');
            $penggajianv->save();
            }
            return redirect('Penggajian');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penggajianv=penggajianm::find($id);
        return view('penggajianf.read',compact('penggajianv'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $gajiv=penggajianm::find($id);
        $penggajianv=new penggajianm ;
        $penggajianv=array('status_pengambilan'=>1,'tanggal_pengambilan'=>date('y-m-d'));
        penggajianm::where('id',$id)->update($penggajianv);
        return redirect('Penggajian');
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
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        penggajianm::find($id)->delete();
        return redirect('Penggajian');
    }
}