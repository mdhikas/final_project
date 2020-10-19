<?php

namespace App\Http\Controllers;

use App\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class KriteriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = Kriteria::all();
        if (session('success_message')) {
            Alert::success('BERHASIL', session('success_message'));
        }
        return view('admin.certification_tes.kriteria', compact('kriteria'));
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
        // dump($request->all());
        $kriteria = \App\Kriteria::create($request->all());
        return redirect('/dashboard/test/kriteria')->with([
            'type'   => 'success',
            'message' => 'Data kriteria <b>' . $request->input('kode') . '</b> berhasil ditambahkan',
            'title'  => 'Good Job!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $kriteria)
    {
        // return view('/dashboard/test/kriteria', compact('kriteria'));
        return $kriteria;
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
        $kriteria = Kriteria::find($id);
        $kriteria->kode = $request->kode;
        $kriteria->nama_kriteria = $request->nama_kriteria;
        $kriteria->minmax = $request->minmax;
        $kriteria->bobot = $request->bobot;
        $kriteria->tipe_preferensi = $request->tipe_preferensi;
        $kriteria->q = $request->q;
        $kriteria->p = $request->p;

        // $kriteria = Kriteria::where('id', $id);
        // dd($request->all());
        $kriteria->save();
        return redirect('/dashboard/test/kriteria')->with([
            'type'   => 'success',
            'message' => 'Data kriteria <b>' . $request->input('kode') . '</b> berhasil diubah',
            'title'  => 'Good Job!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kriteria $kriteria, $id)
    {
        $kriteria = Kriteria::where('id', $id);
        $data_kriteria = DB::table('kriterias')->select('kode')->where('id', $id)->first();
        $kriteria->delete();
        return redirect('/dashboard/test/kriteria')->with([
            'type'   => 'success',
            'message' => 'Data kriteria <b>' . $data_kriteria->kode . '</b> berhasil dihapus',
            'title'  => 'Good Job!'
        ]);
    }
}
