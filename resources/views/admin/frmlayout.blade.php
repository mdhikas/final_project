@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Input Karyawan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Karyawan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="/dashboard/form" method="POST">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nik">Nomor Induk Karyawan</label>
                                    <input type="text" class="form-control @error('nik')is-invalid @enderror" id="nik" name="nik"
                                placeholder="Masukkan NIK" required value="{{old('nik')}}">
                                        @error('nik')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama_depan">Nama Depan</label>
                                    <input type="text" class="form-control @error('nama_depan')is-invalid @enderror" id="nama_depan" name="nama_depan"
                                placeholder="Masukkan Nama Depan" required value="{{old('nama_depan')}}">
                                        @error('nama_depan')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama_belakang">Nama Belakang</label>
                                    <input type="text" class="form-control" id="nama_belakang" name="nama_belakang"
                                placeholder="Masukkan Nama Belakang" value="{{old('nama_belakang')}}">
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control custom-select @error('jenis_kelamin')is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option value="L">L</option>
                                        <option value="P">P</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <input type="text" class="form-control" id="agama" name="agama"
                                placeholder="Agama" value="{{old('agama')}}">
                                </div>
                                <div class="form-group">
                                    <label for="posisi">Posisi</label>
                                    <select class="form-control" name="posisi" id="posisi">
                                        <option value="NULL"></option>
                                        <option value="SECRETARY">SECRETARY</option>
                                        <option value="ACM GROUP HEAD">ACM GROUP HEAD</option>
                                        <option value="GRADUATE DEVELOPMENT PROGRAM">GRADUATE DEVELOPMENT PROGRAM</option>
                                        <option value="ACM OHS MANAGER">ACM OHS MANAGER</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan"
                                placeholder="Jabatan di Perusahaan" value="{{old('jabatan')}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                placeholder="Masukkan Email" value="{{old('email')}}">
                                </div>
                            </div>
                            <div class="card-footer bg-transparent float-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                    <!-- /.card -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection