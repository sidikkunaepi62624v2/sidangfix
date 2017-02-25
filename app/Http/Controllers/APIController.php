<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\jabatanm;
use App\golonganm;
use App\pegawaim;
use App\tunjanganm;
use App\tunjangan_pegawaim;
use App\kategori_lemburm;
use App\lembur_pegawaim;
use App\penggajianm;

use Auth;
use DB;
use Hash;
use JWTAuth;

class apicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function login(Request $request)
    {
         // $user = User::where('id', Auth::user()->id)->get();
        $response = array("error" => FALSE);   //error adalah key setelaah samadengan adalah datanya
        $input = $request->all();
        if (!$token = JWTAuth::attempt($input)) { //melakukan pengecekan , jika format bukan token maka 
            $response["error"] = TRUE;   //
            $response["error_msg"] = "Email or password yang anda masukan salah. Silahkan Coba Lagi!";
            // return response()->json(['result' => 'wrong email or password.']);
            return ($response);
        }

        $user = JWTAuth::toUser($token);

        // Detail user & Pegawai Json
        // Bisa diakses lewat postman & Android Login
        $detail = $user::select('users.id as uid', 
                                'users.name as name', 
                                'users.email as email', 
                                'users.created_at as created_at', 
                                'users.permission as permission', 
                                'pegawais.nip as nip',
                                'pegawais.photo as photo', 
                                'jabatans.nama_jabatan as jabatan', 
                                'jabatans.besaran_uang as uangjabatan',
                                'golongans.nama_golongan as golongan',
                                'golongans.besaran_uang as uanggolongan',
                                DB::raw('(jabatans.besaran_uang + golongans.besaran_uang) as gaji'))
                    ->join('pegawais', 'pegawais.user_id', '=', 'users.id')
                    ->join('jabatans', 'pegawais.jabatan_id', '=', 'jabatans.id')
                    ->join('golongans', 'pegawais.golongan_id', '=', 'golongans.id')
                    // ->join('tunjangan_pegawais' , 'tunjangan_pegawais.kode_tunjangan_id', '=', 'tunjangans.id')
                    // ->join('tunjangans', 'tunjangans.id', '=', 'tunjangan_pegawais.kode_tunjangan_id')
                    ->where('users.id', $user->id)
                    ->firstorFail(); //fail akan menampilkan error 404

        // Get Photo
        $img = asset("img/".$detail->photo); //profile adalah folder fotonya

        // JSON Output
        $response["error"] = FALSE;
        $response["uid"] = $detail["uid"];
        $response["user"]["photo"] = $img;
        $response["user"]["name"] = $detail["name"];
        $response["user"]["email"] = $detail["email"];
        $response["user"]["permission"] = $detail["permission"];
        $response["user"]["nip"] = $detail["nip"];
        $response["user"]["created_at"] = $detail["created_at"];
        $response["user"]["detail"]["jabatan"] = $detail["jabatan"];
        $response["user"]["detail"]["golongan"] = $detail["golongan"];
        $response["user"]["keuangan"]["uang jabatan"] = $detail["uangjabatan"];
        $response["user"]["keuangan"]["uang golongan"] = $detail["uanggolongan"];
        $response["user"]["keuangan"]["gaji pokok"] = $detail["gaji"];


        // echo json_encode($response);
        // return response()->json(['result' =>  $response]);
        return ($response);
    }
    
    
}
