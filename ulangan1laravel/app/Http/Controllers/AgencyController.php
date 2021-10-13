<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agencies = Agency::all();

        return view('agencies.index', compact('agencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agencies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agency = Agency::create([
            'status' => $request->status,
            'jenis' => $request->jenis,
            'luas_tanah' => $request->luas_tanah,
            'luas_bangunan' => $request->luas_bangunan,
            'lantai' => $request->lantai,
            'kamar_tidur' => $request->kamar_tidur,
            'kamar_mandi' => $request->kamar_mandi,
            'garasi' => $request->garasi,
            'air' => $request->air,
            'listrik' => $request->listrik,
            'hadap' => $request->hadap,
            'alamat' => $request->alamat,
            'harga' => $request->harga,
            'marketing' => $request->marketing,
            'no_hp_marketing' => $request->no_hp_marketing,
        ]);

        return redirect('/agencies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function show(Agency $agency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agency = Agency::find($id);

        return view('agencies.edit', compact('agency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $agency = Agency::find($id);
        $agency->status = $request->status;
        $agency->jenis = $request->jenis;
        $agency->luas_tanah = $request->luas_tanah;
        $agency->luas_bangunan = $request->luas_bangunan;
        $agency->lantai = $request->lantai;
        $agency->kamar_tidur = $request->kamar_tidur;
        $agency->kamar_mandi = $request->kamar_mandi;
        $agency->garasi = $request->garasi;
        $agency->air = $request->air;
        $agency->listrik = $request->listrik;
        $agency->hadap = $request->hadap;
        $agency->alamat = $request->alamat;
        $agency->harga = $request->harga;
        $agency->marketing = $request->marketing;
        $agency->no_hp_marketing = $request->no_hp_marketing;
        $agency->save();

        return redirect('/agencies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agency = Agency::find($id)->delete();

        return redirect('/agencies');
    }
}
