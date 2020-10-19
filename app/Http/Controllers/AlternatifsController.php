<?php

namespace App\Http\Controllers;

use App\Alternatif;
use App\Kriteria;
use App\NilaiAlternatif;
use Illuminate\Http\Request;
// use RealRashid\SweetAlert\Facades\Alert;
use DB;

class AlternatifsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alteratif = Alternatif::all();
        $kriterias = DB::table('kriterias')
            ->select('id', 'kode', 'nama_kriteria')
            ->orderBy('kode')
            ->get();

        // if (session('success_message')) {
        //     Alert::success('BERHASIL', session('success_message'));
        // }
        return view('admin.certification_tes.alternatif', ['alternatif' => $alteratif, 'kriterias' => $kriterias]);
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
        // dd($request->all());
        // $request->validate([
        //     'kode_alternatif' => 'required',
        //     'nama_alternatif' => 'required'
        // ]);


        $alternatif = \App\Alternatif::create($request->all());
        $temp = Alternatif::where([
            'kode' => $request->input('kode'), 'nama_alternatif' => $request->input('nama_alternatif')
        ])->firstOrFail();

        $kriterias = DB::table('kriterias')
            ->select('id', 'kode')
            ->orderBy('kode')
            ->get();
        // dd($kriterias[0]->id);
        for ($i = 0; $i < count($kriterias); $i++) {
            $nilaiAlternatif = new NilaiAlternatif;
            $nilaiAlternatif->id_alternatif = $temp->id;
            $nilaiAlternatif->id_kriteria = $kriterias[$i]->id;
            $nilaiAlternatif->save();
        };
        DB::table('hasil_perhitungans')->insert([
            'id_alternatif' => $temp->id
        ]);

        return redirect('/dashboard/test/alternatif')->with([
            'type'   => 'success',
            'message' => 'Data alternatif berhasil ditambah',
            'title'  => 'Good Job!'
        ]);
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
        $alternatif = Alternatif::find($id);
        $alternatif->kode = $request->kode;
        $alternatif->nama_alternatif = $request->nama_alternatif;

        // dd($request->all());
        $alternatif->save();

        return redirect('/dashboard/test/alternatif')->with([
            'type'   => 'success',
            'message' => 'Data alternatif berhasil diubah',
            'title'  => 'Good Job!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alternatif $alternatif)
    {
        DB::table('nilai_alternatifs_2')->where('id_alternatif', $alternatif->id)->delete();
        DB::table('hasil_perhitungans')->where('id_alternatif', $alternatif->id)->delete();

        $alternatif->delete();
        return redirect('dashboard/test/alternatif')->with([
            'type'   => 'success',
            'message' => 'Data alternatif berhasil dihapus',
            'title'  => 'Good Job!'
        ]);
    }

    public function store_criteria(Request $request)
    {
        $cekNilaiAlternatif = DB::table('nilai_alternatifs_2')
            ->select('id_alternatif', 'id_kriteria', 'nilai')
            ->where('id_alternatif', '=', $request->input('id_alternatif'))
            ->where('id_kriteria', '=', $request->input('id_kriteria'))
            ->get();

        if ($cekNilaiAlternatif->isEmpty()) {
            $nilaiAlternatif = new NilaiAlternatif;
            $nilaiAlternatif->id_alternatif = $request->input('id_alternatif');
            $nilaiAlternatif->id_kriteria = $request->input('id_kriteria');
            $nilaiAlternatif->nilai = $request->input('nilai_kriteria');
            $nilaiAlternatif->save();
            $message = "Data Kriteria Berhasil Ditambahkan";
        } else {
            $kriteria = DB::table('kriterias')->select('kode')->where('id', $request->input('id_kriteria'))->first();
            NilaiAlternatif::where('id_alternatif', $request->input('id_alternatif'))
                ->where('id_kriteria', $request->input('id_kriteria'))
                ->update(['nilai' => $request->input('nilai_kriteria')]);
            $message = "Nilai kriteria <b>$kriteria->kode</b> berhasil ditambahkan";
        }

        return redirect('/dashboard/test/nilai_alternatif')->with([
            'type'   => 'success',
            'message' => $message,
            'title'  => 'Good Job!'
        ]);
    }

    public function update_criteria(Request $request)
    {
        // dd($request->input());
        NilaiAlternatif::where('id_alternatif', $request->input('id_alternatif'))
            ->where('id_kriteria', $request->input('id_kriteria'))
            ->update(['nilai' => $request->input('nilai_kriteria')]);

        $kriteria = DB::table('kriterias')->select('kode')->where('id', $request->input('id_kriteria'))->first();

        return redirect('/dashboard/test/nilai_alternatif')->with([
            'type'   => 'success',
            'message' => 'Data nilai kriteria <b>' . $kriteria->kode . '</b> berhasil diubah',
            'title'  => 'Good Job!'
        ]);
    }

    public function promethee()
    {
        $alternatifs = DB::table('alternatifs')
            ->select('alternatifs.id', 'alternatifs.kode', 'alternatifs.nama_alternatif')
            ->get();

        $arrAlternatif = [];
        $arrNilaiAlternatif = [];
        foreach ($alternatifs as $alter) {
            $nilaiAlternatifs = DB::table('nilai_alternatifs_2')
                ->join('kriterias', 'kriterias.id', '=', 'nilai_alternatifs_2.id_kriteria')
                ->select('kriterias.kode', 'nilai_alternatifs_2.id_kriteria', 'nilai_alternatifs_2.nilai')
                ->where('nilai_alternatifs_2.id_alternatif', '=', $alter->id)
                ->get();

            foreach ($nilaiAlternatifs as $nilAlter) {
                $arrNilaiAlternatif[$nilAlter->kode] = $nilAlter->nilai;
            }
            $arrAlternatif[$alter->kode] = $arrNilaiAlternatif;
        }

        $data_bobot = DB::table('kriterias')
            ->select('kode', 'nama_kriteria', 'bobot', 'p')
            ->get();

        foreach ($data_bobot as $db) {
            $arrBobot[$db->kode] = $db->bobot / 100;
            $arrP[$db->kode] = $db->p;
        }

        $arrHitung1 = [];
        $arrHitung2 = [];
        foreach ($arrAlternatif as $k => $value) {
            foreach ($value as $key => $val) {
                $arrHitung2[$key] = $val * $arrBobot[$key];
            }
            $arrHitung1[$k] = $arrHitung2;
        }

        $d = [];
        $tmp = $arrHitung1;

        foreach ($arrHitung1 as $code_A => $name_A) {
            $d[$code_A] = [];
            foreach ($arrHitung1 as $code_B => $name_B) {
                if ($code_A != $code_B) {
                    $d[$code_A][$code_B] = [];
                    foreach ($name_B as $key => $val) {
                        $d[$code_A][$code_B][$key] = ($tmp[$code_A][$key] - $tmp[$code_B][$key]) / $arrP[$key];
                    }
                }
            }
        }

        $banyakKriteria = count($arrBobot);
        $sigmaArray = [];
        foreach ($arrHitung1 as $code_A => $name_A) {
            $sigmaArray[$code_A] = [];
            foreach ($arrHitung1 as $code_B => $name_B) {
                if ($code_A != $code_B) {
                    $sigmaArray[$code_A][$code_B] = array_sum($d[$code_A][$code_B]) / $banyakKriteria;
                }
            }
        }

        $banyakAlternatif = count($sigmaArray) - 1;
        $arrLeavingFlow = [];
        foreach ($sigmaArray as $code_A => $name_A) {
            $arrLeavingFlow[$code_A] = array_sum($sigmaArray[$code_A]) / $banyakAlternatif;
        }

        $arrEnteringFlow = [];
        $no = 1;
        foreach ($sigmaArray as $code_A => $item_A) {
            foreach ($item_A as $code_B => $value_B) {
                if (!isset($arrEnteringFlow[$code_B])) $arrEnteringFlow[$code_B] = 0;
                $arrEnteringFlow[$code_B] = $arrEnteringFlow[$code_B] + $value_B;
                $no++;
            }
        }

        foreach ($sigmaArray as $code_A => $name_A) {
            $arrEnteringFlow[$code_A] = $arrEnteringFlow[$code_A] / $banyakAlternatif;
        }

        $arrNetFlow = [];
        foreach ($arrLeavingFlow as $code_A => $value_A) {
            $arrNetFlow[$code_A] = $value_A - $arrEnteringFlow[$code_A];
        }
        arsort($arrNetFlow);

        foreach ($arrNetFlow as $key => $value) {
            echo "<pre>";
            print_r($key . " => " . $value);
            echo "</pre>";
        }
    }

    public function get_criteria(Request $request)
    {
        $kriterias = DB::table('nilai_alternatifs_2')
            ->select('kriterias.id', 'kriterias.kode', 'kriterias.nama_kriteria')
            ->join('kriterias', 'kriterias.id', '=', 'nilai_alternatifs_2.id_kriteria')
            ->where('nilai_alternatifs_2.id_alternatif', $request->id_alternatif)
            ->whereNull('nilai_alternatifs_2.nilai')
            ->get();
        return json_encode($kriterias);
    }
}
