@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Non Mandatory</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="/nonsertifikasi">Data Non Sertifikasi</a></li>
                        <li class="breadcrumb-item active">Non Mandatory</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <a href="/sertifikasi/enviro/pdfreport" class="btn btn-danger float-right">Report</a>
                    <button type="button" class="btn btn-primary float-right mr-1" data-toggle="modal"
                        data-target="#staticBackdrop">
                        Tambah Data
                    </button>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Form Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="cnc">C/NC</label>
                                <input type="text" class="form-control" id="cnc" name="cnc">
                            </div>
                            <div class="form-group">
                                <label for="course">Course Group</label>
                                <input type="text" class="form-control" id="course" name="course">
                            </div>
                            <div class="form-group">
                                <label for="pelatihan">Nama Pelatihan</label>
                                <input type="text" class="form-control" id="pelatihan" name="pelatihan">
                            </div>
                            <div class="form-group">
                                <label for="provider">Provider</label>
                                <input type="text" class="form-control" id="provider" name="provider">
                            </div>
                            <div class="form-group">
                                <label for="tglmulai">Tgl Mulai</label>
                                <input type="text" class="form-control" id="tglmulai" name="tglmulai">
                            </div>
                            <div class="form-group">
                                <label for="tglselesai">Tgl Selesai</label>
                                <input type="text" class="form-control" id="tglselesai" name="tglselesai">
                            </div>
                            <div class="form-group">
                                <label for="jumlahpeserta">Nama Peserta</label>
                                <input type="text" class="form-control" id="jumlahpeserta" name="jumlahpeserta">
                            </div>
                            <div class="form-group">
                                <label for="kriteria">Kriteria</label>
                                <select class="form-control" name="kriteria" id="kriteria">
                                    <option selected disabled value>Choose</option>
                                    <option value="I">I</option>
                                    <option value="P">P</option>
                                    <option value="S">S</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="anggaran">Anggaran</label>
                                <input type="text" class="form-control" id="anggaran" name="anggaran">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover table">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="vertical-align : middle;text-align:center;" rowspan="2">No</th>
                                    <th style="vertical-align : middle;text-align:center;" rowspan="2">C/NC</th>
                                    <th style="vertical-align : middle;text-align:center;" rowspan="2">Course Group</th>
                                    <th style="vertical-align : middle;text-align:center;" rowspan="2">Nama Pelatihan
                                    </th>
                                    <th style="vertical-align : middle;text-align:center;" rowspan="2">Provider</th>
                                    <th style="vertical-align : middle;text-align:center;" rowspan="2">Tgl Mulai</th>
                                    <th style="vertical-align : middle;text-align:center;" rowspan="2">Tgl Selesai</th>
                                    <th style="vertical-align : middle;text-align:center;" rowspan="2">Nama Peserta
                                    </th>
                                    <th style="vertical-align : middle;text-align:center;" colspan="3">Kriteria</th>
                                    <th style="vertical-align : middle;text-align:center;" rowspan="2">Anggaran</>
                                </tr>
                                <tr>
                                    <th>I</th>
                                    <th>P</th>
                                    <th>S</th>
                                </tr>
                            </thead>
                            <tbody style="text-align:center">
                                <tr>
                                    <th>1</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>2</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>3</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection