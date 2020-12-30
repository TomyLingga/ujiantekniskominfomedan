<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ktp = DB::table('ktp')
                ->orderBy('created_at', 'desc')
                ->get();

        for ($i = 0 ; $i < count($ktp); $i++){
            //gender
            if($ktp[$i]->gender == 'f'){
                $ktp[$i]->gender = "Wanita";
            } elseif($ktp[$i]->gender == 'm'){
                $ktp[$i]->gender = "Pria";
            }

            //provinsi
            $prov = DB::table('prov_kota')
                    ->select('nama_prov')
                    ->where('id_prov',$ktp[$i]->provinsi)
                    ->first();
            $ktp[$i]->provinsi = $prov->nama_prov;
            
            $kota = DB::table('prov_kota')
                    ->select('nama_kota')
                    ->where('id',$ktp[$i]->kota)
                    ->first();
            $ktp[$i]->kota = $kota->nama_kota;

            $tempat_lahir = DB::table('prov_kota')
                    ->select('nama_kota')
                    ->where('id',$ktp[$i]->tempat_lahir)
                    ->first();
            $ktp[$i]->tempat_lahir = $tempat_lahir->nama_kota;

            if($ktp[$i]->status_perkawinan == 1){
                $ktp[$i]->status_perkawinan = "Kawin";
            } elseif($ktp[$i]->status_perkawinan == 2){
                $ktp[$i]->status_perkawinan = "Belum Kawin";
            } elseif($ktp[$i]->status_perkawinan == 3){
                if($ktp[$i]->gender == 'Wanita'){
                    $ktp[$i]->status_perkawinan = "Janda";
                } elseif($ktp[$i]->gender == 'Pria'){
                    $ktp[$i]->status_perkawinan = "Duda";
                }
            }
            
        }
        
        return view('admin/index', compact('ktp'));
    }

    public function cetak_nik()
    {
    	$ktp =  DB::table('ktp')
                    ->orderBy('nik', 'asc')
                    ->get();
        
        for ($i = 0 ; $i < count($ktp); $i++){
            //gender
            if($ktp[$i]->gender == 'f'){
                $ktp[$i]->gender = "Wanita";
            } elseif($ktp[$i]->gender == 'm'){
                $ktp[$i]->gender = "Pria";
            }

            //provinsi
            $prov = DB::table('prov_kota')
                    ->select('nama_prov')
                    ->where('id_prov',$ktp[$i]->provinsi)
                    ->first();
            $ktp[$i]->provinsi = $prov->nama_prov;
            
            $kota = DB::table('prov_kota')
                    ->select('nama_kota')
                    ->where('id',$ktp[$i]->kota)
                    ->first();
            $ktp[$i]->kota = $kota->nama_kota;

            $tempat_lahir = DB::table('prov_kota')
                    ->select('nama_kota')
                    ->where('id',$ktp[$i]->tempat_lahir)
                    ->first();
            $ktp[$i]->tempat_lahir = $tempat_lahir->nama_kota;

            if($ktp[$i]->status_perkawinan == 1){
                $ktp[$i]->status_perkawinan = "Kawin";
            } elseif($ktp[$i]->status_perkawinan == 2){
                $ktp[$i]->status_perkawinan = "Belum Kawin";
            } elseif($ktp[$i]->status_perkawinan == 3){
                if($ktp[$i]->gender == 'Wanita'){
                    $ktp[$i]->status_perkawinan = "Janda";
                } elseif($ktp[$i]->gender == 'Pria'){
                    $ktp[$i]->status_perkawinan = "Duda";
                }
            }
            
        }
        $pdf = PDF::loadview('admin.ktp_pdf',compact('ktp'));
    	return $pdf->stream();
    }

    public function cetak_nama()
    {
    	$ktp =  DB::table('ktp')
                    ->orderBy('nama', 'asc')
                    ->get();
                
                for ($i = 0 ; $i < count($ktp); $i++){
                    //gender
                    if($ktp[$i]->gender == 'f'){
                        $ktp[$i]->gender = "Wanita";
                    } elseif($ktp[$i]->gender == 'm'){
                        $ktp[$i]->gender = "Pria";
                    }
            
                    //provinsi
                    $prov = DB::table('prov_kota')
                            ->select('nama_prov')
                            ->where('id_prov',$ktp[$i]->provinsi)
                            ->first();
                    $ktp[$i]->provinsi = $prov->nama_prov;
                        
                    $kota = DB::table('prov_kota')
                            ->select('nama_kota')
                            ->where('id',$ktp[$i]->kota)
                            ->first();
                    $ktp[$i]->kota = $kota->nama_kota;
            
                    $tempat_lahir = DB::table('prov_kota')
                            ->select('nama_kota')
                            ->where('id',$ktp[$i]->tempat_lahir)
                            ->first();
                    $ktp[$i]->tempat_lahir = $tempat_lahir->nama_kota;
            
                    if($ktp[$i]->status_perkawinan == 1){
                            $ktp[$i]->status_perkawinan = "Kawin";
                    } elseif($ktp[$i]->status_perkawinan == 2){
                            $ktp[$i]->status_perkawinan = "Belum Kawin";
                    } elseif($ktp[$i]->status_perkawinan == 3){
                            if($ktp[$i]->gender == 'Wanita'){
                                $ktp[$i]->status_perkawinan = "Janda";
                            } elseif($ktp[$i]->gender == 'Pria'){
                                $ktp[$i]->status_perkawinan = "Duda";
                            }
                    }
                        
                }
 
    	$pdf = PDF::loadview('admin.ktp_pdf',compact('ktp'));
    	return $pdf->stream();
    }
    public function cetak_gender()
    {
    	$ktp =  DB::table('ktp')
                    ->orderBy('gender', 'asc')
                    ->get();
                
                for ($i = 0 ; $i < count($ktp); $i++){
                    //gender
                    if($ktp[$i]->gender == 'f'){
                        $ktp[$i]->gender = "Wanita";
                    } elseif($ktp[$i]->gender == 'm'){
                        $ktp[$i]->gender = "Pria";
                    }
            
                    //provinsi
                    $prov = DB::table('prov_kota')
                            ->select('nama_prov')
                            ->where('id_prov',$ktp[$i]->provinsi)
                            ->first();
                    $ktp[$i]->provinsi = $prov->nama_prov;
                        
                    $kota = DB::table('prov_kota')
                            ->select('nama_kota')
                            ->where('id',$ktp[$i]->kota)
                            ->first();
                    $ktp[$i]->kota = $kota->nama_kota;
            
                    $tempat_lahir = DB::table('prov_kota')
                            ->select('nama_kota')
                            ->where('id',$ktp[$i]->tempat_lahir)
                            ->first();
                    $ktp[$i]->tempat_lahir = $tempat_lahir->nama_kota;
            
                    if($ktp[$i]->status_perkawinan == 1){
                            $ktp[$i]->status_perkawinan = "Kawin";
                    } elseif($ktp[$i]->status_perkawinan == 2){
                            $ktp[$i]->status_perkawinan = "Belum Kawin";
                    } elseif($ktp[$i]->status_perkawinan == 3){
                            if($ktp[$i]->gender == 'Wanita'){
                                $ktp[$i]->status_perkawinan = "Janda";
                            } elseif($ktp[$i]->gender == 'Pria'){
                                $ktp[$i]->status_perkawinan = "Duda";
                            }
                    }
                        
                }
 
    	$pdf = PDF::loadview('admin.ktp_pdf',compact('ktp'));
    	return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }
}
