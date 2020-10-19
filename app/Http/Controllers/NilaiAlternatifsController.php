<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alternatif;
use App\NilaiAlternatif;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use function GuzzleHttp\Promise\all;
use function Ramsey\Uuid\v1;

class NilaiAlternatifsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriterias = DB::table('kriterias')
            ->select('id', 'kode', 'nama_kriteria')
            ->orderBy('kode')
            ->get();
        $alternatifs = DB::table('alternatifs')
            ->select('alternatifs.id', 'alternatifs.kode', 'alternatifs.nama_alternatif')
            ->orderBy('alternatifs.kode')
            ->get();
        
        if (count($alternatifs) > 0) {
            foreach ($alternatifs as $alter) {
                $nilaiAlternatifsKosong = DB::table('nilai_alternatifs_2')
                                        ->join('kriterias', 'kriterias.id', '=', 'nilai_alternatifs_2.id_kriteria')
                                        ->select('kriterias.id', 'nilai_alternatifs_2.id_kriteria', 'nilai_alternatifs_2.nilai')
                                        ->where('nilai_alternatifs_2.id_alternatif', '=', $alter->id)
                                        ->whereNull('nilai_alternatifs_2.nilai')
                                        ->get();
                foreach ($kriterias as $kriteria) {
                    $nilaiAlternatifs = DB::table('nilai_alternatifs_2')
                                    ->join('kriterias', 'kriterias.id', '=', 'nilai_alternatifs_2.id_kriteria')
                                    ->select('kriterias.kode', 'nilai_alternatifs_2.id_kriteria', 'nilai_alternatifs_2.nilai')
                                    ->where('nilai_alternatifs_2.id_alternatif', '=', $alter->id)
                                    ->where('nilai_alternatifs_2.id_kriteria', '=', $kriteria->id)
                                    ->get();
                    
                    // if ($nilaiAlternatifs->isEmpty()) {
                    //     // $arrKriteria = [];
                    //     $arrKriteria[$kriteria->kode] = null;
                    // } else {
                        foreach ($nilaiAlternatifs as $nAlter) {
                            $arrKriteria[$kriteria->kode] = $nAlter->nilai;
                        }
                    // }
                    
                }
                $arrData[] = [
                    'id_alternatif'     => $alter->id,
                    'kode_alternatif'   => $alter->kode,
                    'nama_alternatif'   => $alter->nama_alternatif,
                    'banyak_kriteria'   => count($kriterias),
                    'kriteria_kosong'   => count($nilaiAlternatifsKosong),
                    'data_kriteria'     => $arrKriteria
                ];
            }
        } else {
            $arrData = [];
        }
        
        
        // dd($arrData);

        if (session('success_message')) {
            Alert::success('BERHASIL', session('success_message'));
        }

        return view('admin.certification_tes.nilai_alternatif', [
            'kriterias' => $kriterias,
            'nilaiAlternatif' => $arrData
        ]);
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
    public function store(Request $request, $id)
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
    public function edit(Request $request, $id)
    {
        // dd($request->all());
        NilaiAlternatif::where('id_alternatif', $id)
            ->update([
                'c1' => $request->c1,
                'c2' => $request->c2,
                'c3' => $request->c3,
                'c4' => $request->c4,
                'c5' => $request->c5,
                'c6' => $request->c6,
            ]);
        return redirect('/dashboard/test/nilai_alternatif')->withSuccessMessage('Data Nilai Berhasil Diubah');
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
        // $nilaiAlternatif = NilaiAlternatif::create(
        //     [
        //         'c1' => $request->tc1,
        //         'c2' => $request->tc2,
        //         'c3' => $request->tc3,
        //         'c4' => $request->tc4,
        //         'c5' => $request->tc5,
        //         'c6' => $request->tc6,
        //     ]
        // );
        NilaiAlternatif::where('id_alternatif', $id)
            ->update([
                'c1' => $request->input('c1'),
                'c2' => $request->input('c2'),
                'c3' => $request->input('c3'),
                'c4' => $request->input('c4'),
                'c5' => $request->input('c5'),
                'c6' => $request->input('c6'),
            ]);

        // dd($request->all());
        // $nilaiAlternatif = NilaiAlternatif::where('id_alternatif', $id)->firstOrFail();
        // dd($nilaiAlternatif);
        // $nilaiAlternatif->c1 = $request->input('c1');
        // $nilaiAlternatif->c2 = $request->input('c2');
        // $nilaiAlternatif->c3 = $request->input('c3');
        // $nilaiAlternatif->c4 = $request->input('c4');
        // $nilaiAlternatif->c5 = $request->input('c5');
        // $nilaiAlternatif->c6 = $request->input('c6');
        // $nilaiAlternatif->save();
        return redirect('/dashboard/test/nilai_alternatif')->withSuccessMessage('Data Nilai Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilaiAlternatif = NilaiAlternatif::where('id_alternatif', $id)->firstOrFail();
        $nilaiAlternatif->delete();
        $alternatif = Alternatif::find($id);
        $alternatif->delete();
        DB::table('hasil_perhitungans')->where('id_alternatif', $id)->delete();
        
        return redirect('/dashboard/test/nilai_alternatif')->with([
            'type'   => 'success',
            'message' => 'Data nilai berhasil dihapus',
            'title'  => 'Good Job!'
        ]);
    }
}
