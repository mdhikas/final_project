<?php

namespace App\Http\Controllers;

use App\Alternatif;
use App\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Employee;
use App\Models\Training;
use PDF;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $trainings = Training::all()->count();
        // $employees = Employee::all()->count();

        $var['training'] = Training::all()->count();
        $var['employee'] = Employee::all()->count();
        $var['alternatif'] = Alternatif::all()->count();
        $var['kriteria'] = Kriteria::all()->count();
        return view('admin.dashboard')->with($var);
        // echo view('admin.dashboard')->with('training', $trainings);
        // return view('user.udashboard');
    }

    public function karyawan()
    {
        return view('admin.emptable');
    }

    public function sertifikasi()
    {
        return view('admin.srtftable');
    }

    public function form()
    {
        return view('admin.frmlayout');
    }

    public function skkni()
    {
        return view('admin.sertifikasi.skkni');
    }

    public function enviro()
    {
        return view('admin.sertifikasi.enviro');
    }

    public function ohs()
    {
        return view('admin.sertifikasi.ohs');
    }

    public function nonsertifikasi()
    {
        return view('admin.nonsrtftable');
    }

    public function nonmandatory()
    {
        return view('admin.nonsertifikasi.nonmandatory');
    }

    public function profil()
    {
        return view('user.profil');
    }

    public function test()
    {
        return view('admin.certification_tes.index');
    }

    public function cetak_pdf()
    {
        $dataAkhir = DB::table('hasil_perhitungans')
            ->select('alternatifs.kode', 'alternatifs.nama_alternatif', 'nilai_leavingflow', 'rank_leavingflow', 'nilai_enteringflow', 'rank_enteringflow', 'hasil_perhitungans.nilai_netflow')
            ->join('alternatifs', 'alternatifs.id', '=', 'hasil_perhitungans.id_alternatif')
            ->orderByDesc('hasil_perhitungans.nilai_netflow')
            ->get();
        // dd($dataAkhir);
        $pdf = PDF::loadView('admin.reporting.cetak_pdf', ['perhitungan' => $dataAkhir])->setPaper('a4', 'landscape');
        return $pdf->download('ohs-rank.pdf');
        // return view('admin/reporting/cetak_pdf', ['perhitungan' => $dataAkhir]);
    }

    public function perhitungan()
    {
        $alternatifs = DB::table('alternatifs')
            ->select('id', 'kode', 'nama_alternatif')
            ->get();
        $kriterias = DB::table('kriterias')
            ->select('id', 'kode', 'nama_kriteria', 'bobot', 'minmax', 'tipe_preferensi', 'q', 'p')
            ->get();

        if (count($alternatifs) > 1) {

            foreach ($kriterias as $key_kriterias) {
                $nilaiAlternatifsByKriteria = DB::table('nilai_alternatifs_2')
                    ->select('alternatifs.kode', 'nilai_alternatifs_2.nilai')
                    ->join('alternatifs', 'alternatifs.id', '=', 'nilai_alternatifs_2.id_alternatif')
                    ->where('nilai_alternatifs_2.id_kriteria', '=', $key_kriterias->id)
                    ->orderBy('alternatifs.kode')
                    ->get();
                foreach ($nilaiAlternatifsByKriteria as $key_alternatifs) {
                    $dataAlternatifs[$key_alternatifs->kode] = $key_alternatifs->nilai;
                    if ($dataAlternatifs[$key_alternatifs->kode] == null or $dataAlternatifs[$key_alternatifs->kode] == "") {
                        return redirect('/dashboard/test/nilai_alternatif')->with(
                            [
                                'type'   => 'error',
                                'message' => 'Nilai kriteria belum semua terisi',
                                'title'  => 'Oopss...'
                            ]
                        );
                    }
                }
                $arrData[] = [
                    'kode_kriteria'     => $key_kriterias->kode,
                    'nama_kriteria'     => $key_kriterias->nama_kriteria,
                    'bobot'             => $key_kriterias->bobot,
                    'minmax'            => $key_kriterias->minmax,
                    'tipe_preferensi'   => $key_kriterias->tipe_preferensi,
                    'nilai_q'           => $key_kriterias->q,
                    'nilai_p'           => $key_kriterias->p,
                    'data_alternatifs'  => $dataAlternatifs
                ];
            }
        } else {
            return redirect('/dashboard/test/nilai_alternatif')->with(
                [
                    'type'   => 'error',
                    'message' => 'Nilai kriteria belum semua terisi',
                    'title'  => 'Oopss...'
                ]
            );
        }

        // dd($arrData);

        $arrAlternatif = [];
        $arrNilaiAlternatif = [];
        foreach ($alternatifs as $key_alternatif) {
            $nilaiAlternatifs = DB::table('nilai_alternatifs_2')
                ->join('kriterias', 'kriterias.id', '=', 'nilai_alternatifs_2.id_kriteria')
                ->select('kriterias.kode', 'nilai_alternatifs_2.id_kriteria', 'nilai_alternatifs_2.nilai')
                ->where('nilai_alternatifs_2.id_alternatif', '=', $key_alternatif->id)
                ->get();
            foreach ($nilaiAlternatifs as $nilAlter) {
                $arrNilaiAlternatif[$nilAlter->kode] = $nilAlter->nilai;
            }
            $arrAlternatif[$key_alternatif->kode] = $arrNilaiAlternatif;
        }

        foreach ($kriterias as $key_kriterias) {
            $arrBobot[$key_kriterias->kode] = $key_kriterias->bobot / 100;
            $arrP[$key_kriterias->kode] = $key_kriterias->p;
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
            $orderedLeavingFlow[] = $arrLeavingFlow[$code_A];
        }
        rsort($orderedLeavingFlow);

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
            $orderedEnteringFlow[] = $arrEnteringFlow[$code_A];
        }
        rsort($orderedEnteringFlow);
        // dd($arrLeavingFlow);

        $arrNetFlow = [];
        foreach ($arrLeavingFlow as $code_A => $value_A) {
            $id_alternatif = DB::table('alternatifs')
                ->select('id')
                ->where('kode', $code_A)
                ->first();
            $arrNetFlow[$code_A] = $value_A - $arrEnteringFlow[$code_A];
            $orderedNetFlow[] = $arrNetFlow[$code_A];
            DB::table('hasil_perhitungans')
                ->where('id_alternatif', $id_alternatif->id)
                ->update([
                    'nilai_leavingflow'     => $arrLeavingFlow[$code_A],
                    'rank_leavingflow'      => (array_search($arrLeavingFlow[$code_A], $orderedLeavingFlow) + 1),
                    'nilai_enteringflow'    => $arrEnteringFlow[$code_A],
                    'rank_enteringflow'     => (array_search($arrEnteringFlow[$code_A], $orderedEnteringFlow) + 1),
                    'nilai_netflow'         => $arrNetFlow[$code_A]
                ]);
        }
        rsort($orderedNetFlow);

        foreach ($alternatifs as $key_alternatif) {
            $arrPerhitungan[] = [
                'kode_alternatif'       => $key_alternatif->kode,
                'nama_alternatif'       => $key_alternatif->nama_alternatif,
                'leaving_flow'          => round($arrLeavingFlow[$key_alternatif->kode], 4),
                'rank_leaving_flow'     => (array_search($arrLeavingFlow[$key_alternatif->kode], $orderedLeavingFlow) + 1),
                'entering_flow'         => round($arrEnteringFlow[$key_alternatif->kode], 4),
                'rank_entering_flow'    => (array_search($arrEnteringFlow[$key_alternatif->kode], $orderedEnteringFlow) + 1),
                'net_flow'              => round($arrNetFlow[$key_alternatif->kode], 4),
                'rank_net_flow'         => array_search($arrNetFlow[$key_alternatif->kode], $orderedNetFlow) + 1
            ];
        }
        // arsort($arrPerhitungan);
        // dd($arrPerhitungan);

        return view('admin.certification_tes.perhitungan', [
            'alternatifs'   => $alternatifs,
            'kriterias'     => $arrData,
            'perhitungan'   => $arrPerhitungan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);

        // $user = new User;
        // $user->nik = $request->nik;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        // $user->password_retype = bcrypt($request->password_retype);
        // $user->remember_token = $request->getRememberToken();
        // $user->save();

        // dd($request->all());
        // return redirect('/signin')->with('status', 'User Berhasil Dibuat');
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
    public function update(Request $request, User $user)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'password_retype' => 'required'
        ]);

        User::where('email', $user->email)
            ->update([
                'password' => bcrypt($request->password),
                'password_retype' => bcrypt($request->password_retype),
                'remember_token' => str_random(60),
            ]);
        // dd($request->all());
        // dd($request->all());
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
