@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profil</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <div class="row">
                            <div class="col-2">
                                <img class="profile" src="dist/img/icon.png" width="100" height="100">
                            </div>
                            <div class="col-3 mt-1">
                                <h5>Nama</h5>
                                <h5>NIK</h5>
                                <h5>Posisi</h5>
                            </div>
                            <div class="col-7">
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#staticBackdrop">
                                    Tambah Sertifikasi
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-4">
                                <table class="table table-bordered table-hover table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Sertifikasi</th>
                                            <th>Nama Training</th>
                                            <th>Tahun Training</th>
                                            <th>Badan Penerbit</th>
                                            <th>Masa Berlaku</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align:center">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Form Tambah Sertifikasi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST">
                                            <div class="form-group">
                                                <label for="sertifikasi">Sertifikasi</label>
                                                <select class="form-control" name="sertifikasi" id="sertifikasi">
                                                    <option selected disabled value>Choose</option>
                                                    <option value="1">Environment</option>
                                                    <option value="2">OH&S</option>
                                                    <option value="3">SKKNI</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="klasifikasi">Klasifikasi</label>
                                                <select class="form-control" name="klasifikasi" id="klasifikasi" required>
                                                    <option selected disabled value="">Choose</option>
                                                    <option value="1">Air</option>
                                                    <option value="2">Udara</option>
                                                    <option value="3">Energi</option>
                                                    <option value="4">Limbah B3</option>
                                                    <option value="5">Reklamasi</option>
                                                    <option value="6">Audit Sistem Manajemen</option>
                                                    <option value="7">Sampah Non B3</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="training">Training</label>
                                                <select class="form-control" name="training" id="training">
                                                    <option selected disabled value="">Choose</option>
                                                    <option value="1">Manajer Pengendalian Pencemaran Air (MPPA)</option>
                                                    <option value="2">Operasional Pengendalian Pencemaran Air (Operator)</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="tahun">Tahun Terbit</label>
                                                <input class="form-control" type="text" placeholder="Tahun Terbit" name="tahun" id="tahun">
                                            </div>
                                            <div class="form-group">
                                                <label for="penerbit">Badan Penerbit</label>
                                                <input class="form-control" type="text" placeholder="Badan Penerbit" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="masaberlaku">Masa Berlaku</label>
                                                <input class="form-control" type="text" placeholder="Masa Berlaku" readonly>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection