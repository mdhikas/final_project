<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\User;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //Insert tabel User
        $user = new \App\User;
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        // $user->status = "Karyawan";
        // $user->remember_token = str_random(60);
        $user->save();
        // dd($request->all());

        //Insert tabel Employee
        $request->request->add(['id_user' => $user->id]);
        // $emp = new Employee;
        // $emp->nik = $request->nik;
        // $emp->nama_depan = $request->nama_depan;
        // $emp->nama_belakang = $request->nama_belakang;
        // $emp->jenis_kelamin = $request->jenis_kelamin;
        // $emp->agama = $request->agama;
        // $emp->posisi = $request->posisi;
        // $emp->jabatan = $request->jabatan;
        // $emp->save();
        $request->validate([
            'nik' => 'required|size:9',
            'nama_depan' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        // dd($request->all());
        $emp = \App\Models\Employee::create($request->all());
        return redirect('/dashboard/form')->with('status', 'Karyawan Berhasil Diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
    }
}
