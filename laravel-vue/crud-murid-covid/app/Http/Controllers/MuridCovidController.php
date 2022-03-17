<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MuridCovid;

class MuridCovidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftar_murid_covid = MuridCovid::all();

        return $daftar_murid_covid;
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
        $murid_covid = new MuridCovid;
        $murid_covid->nis = $request->nis;
        $murid_covid->kelas = $request->kelas;
        $murid_covid->tanggal_mulai_gejala = $request->tanggal_mulai_gejala;
        $murid_covid->hasil_antigen = $request->hasil_antigen;
        $murid_covid->hasil_vcr = $request->hasil_vcr;
        $murid_covid->gejala = $request->gejala;
        $murid_covid->save();

        return "Data murid covid berhasil dibuat";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $murid_covid = MuridCovid::find($id);

        if ($murid_covid == null) {
            return "Data murid covid tidak ditemukan";
        }

        return $murid_covid;
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
        $murid_covid = MuridCovid::find($id);

        if ($murid_covid == null) {
            return "Data murid covid tidak ditemukan";
        }

        $murid_covid->nis = $request->nis;
        $murid_covid->kelas = $request->kelas;
        $murid_covid->tanggal_mulai_gejala = $request->tanggal_mulai_gejala;
        $murid_covid->hasil_antigen = $request->hasil_antigen;
        $murid_covid->hasil_vcr = $request->hasil_vcr;
        $murid_covid->gejala = $request->gejala;
        $murid_covid->save();

        return "Data murid covid berhasil diubah";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $murid_covid = MuridCovid::find($id);

        if ($murid_covid == null) {
            return "Data covid murid tidak ditemukan";
        }

        $murid_covid->delete();

        return "Data murid covid berhasil dihapus";
    }
}
