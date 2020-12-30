<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

use App\Ktp;

class KtpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $user = 0;
        $p    = DB::table('users')
                ->where('id', '=' , Auth::id())
                ->get();
        //  dd(Auth::user());
        
        if(Auth::user() == null){
            return redirect('login');
        } elseif($p[0]->ktp_id != 0){
            $user = DB::table('ktp')
                    ->where('user_id', '=' , Auth::id())
                    ->get();
        
        // dd($user[0]->provinsi);
        
            //provinsi
            $prov = DB::table('prov_kota')
                    ->select('nama_prov')
                    ->where('id_prov',$user[0]->provinsi)
                    ->first();
            $user[0]->provinsi = $prov->nama_prov;

            $kota = DB::table('prov_kota')
                    ->select('nama_kota')
                    ->where('id',$user[0]->kota)
                    ->first();
            $user[0]->kota = $kota->nama_kota;

            $tempat_lahir = DB::table('prov_kota')
                    ->select('nama_kota')
                    ->where('id',$user[0]->tempat_lahir)
                    ->first();
            $user[0]->tempat_lahir = $tempat_lahir->nama_kota;

            // if($user[0]->status_perkawinan == 1){
            //     $user[0]->status_perkawinan = "Kawin";
            // }elseif($user[0]->status_perkawinan == 2){
            //     $user[0]->status_perkawinan = "Belum Kawin";
            // }elseif($user[0]->status_perkawinan == 3){
            //     if($user[0]->gender == 'Wanita'){
            //         $user[0]->status_perkawinan = "Janda";
            //     } elseif($user[0]->gender == 'Pria'){
            //         $user[0]->status_perkawinan = "Duda";
            //     }
            // }
        }
        return view('index',compact('user')); 
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $prov   = DB::table('prov_kota')->pluck('nama_prov','id_prov');
        return view('tambahktp', compact('prov')); 
    }

    public function kota($id)
    {
        $kota   = DB::table('prov_kota')
                    ->where('id_prov', $id)
                    ->pluck('nama_kota','id');
        return \json_encode($kota);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $id = Auth::id();
        $input = $request->all();
        $k = new Ktp;
        
        $k -> provinsi          = $input['provinsialamat'];
        $k -> kota              = $input['kota'];
        $k -> nik               = $input['nik'];
        $k -> nama              = $input['nama'];
        $k -> tempat_lahir      = $input['tempat_lahir'];
        $k -> tanggal_lahir     = $input['tanggal_lahir'];
        $k -> gender            = $input['gender'];
        $k -> alamat            = $input['alamat'];
        $k -> agama             = $input['agama'];
        $k -> status_perkawinan = $input['statuskawin'];
        $k -> pekerjaan         = $input['pekerjaan'];
        $k -> user_id           = $id;
        $k -> save();
        
        $data = DB::table('ktp')
                    ->select('id')
                    ->get();
        
                DB::table('users')->where('id',$id)
                        ->update([
                        'ktp_id' => $data[0]->id,
                        ]);

            return redirect('/ktp');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ktp = DB::table('ktp')
                ->where('id',$id)
                ->get();
                
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $prov = DB::table('prov_kota')
                    ->pluck('nama_prov','id_prov');
        $ktp = DB::table('ktp')
                ->where('id',$id)
                ->get();
        
        return view('edit',compact('ktp','prov'));
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
        $data = Ktp::findOrFail($id);

        if (empty($request->input('provinsialamat'))){
            $data->provinsi = $data->provinsi;
        }
        else{
            $data->provinsi = $request->input('provinsialamat');
        }
        
        if (empty($request->input('kota'))){
            $data->kota = $data->kota;
        }
        else{
            $data->kota = $request->input('kota');
        }

        if (empty($request->input('nik'))){
            $data->nik = $data->nik;
        }
        else{
            $data->nik = $request->input('nik');
        }
        if (empty($request->input('nama'))){
            $data->nama = $data->nama;
        }
        else{
            $data->nama = $request->input('nama');
        }
        if (empty($request->input('tempat_lahir'))){
            $data->tempat_lahir = $data->tempat_lahir;
        }
        else{
            $data->tempat_lahir = $request->input('tempat_lahir');
        }
        if (empty($request->input('tanggal_lahir'))){
            $data->tanggal_lahir = $data->tanggal_lahir;
        }
        else{
            $data->tanggal_lahir = $request->input('tanggal_lahir');
        }
        if (empty($request->input('gender'))){
            $data->gender = $data->gender;
        }
        else{
            $data->gender = $request->input('gender');
        }
        if (empty($request->input('alamat'))){
            $data->alamat = $data->alamat;
        }
        else{
            $data->alamat = $request->input('alamat');
        }
        if (empty($request->input('agama'))){
            $data->agama = $data->agama;
        }
        else{
            $data->agama = $request->input('agama');
        }
        if (empty($request->input('status_perkawinan'))){
            $data->status_perkawinan = $data->status_perkawinan;
        }
        else{
            $data->status_perkawinan = $request->input('status_perkawinan');
        }
        if (empty($request->input('pekerjaan'))){
            $data->pekerjaan = $data->pekerjaan;
        }
        else{
            $data->pekerjaan = $request->input('pekerjaan');
        }
        $data->save();

        return redirect('/ktp');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('ktp')->where('id',$id)->delete();
        DB::table('users')->where('ktp_id',$id)
                          ->update([
                          'ktp_id' => '0',
                          ]);
       
                          return redirect('/ktp');
    }
}
