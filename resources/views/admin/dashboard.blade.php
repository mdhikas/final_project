@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <div class="row">
                            <div class="col-12">
                                {{-- <div class="row">
                                    <div class="col-3">
                                        <div class="card">
                                            <div class="row">
                                                <div class="col-6 m-2">
                                                    <img src="/dist/img/courses.png" alt="sertifikasi" class="icon">
                                                </div>
                                                <div class="col-5 angka">
                                                    <p>Angka</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="card">
                                            <div class="row">
                                                <div class="col-6 m-2">
                                                    <img src="/dist/img/classification.png" alt="sertifikasi" class="icon ml-0">
                                                </div>
                                                <div class="col-5 angka">
                                                    <p>Angka</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="card">
                                            <div class="row">
                                                <div class="col-6 m-2">
                                                    <img src="/dist/img/training.png" alt="sertifikasi" class="icon">
                                                </div>
                                                <div class="col-5 angka">
                                                    <p>Angka</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="card">
                                            <div class="row">
                                                <div class="col-6 m-2">
                                                    <img src="/dist/img/people.png" alt="jumlah" class="icon">
                                                </div>
                                                <div class="col-5 angka">
                                                    <p>Angka</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-lg-4 col-6">
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <h2 style="font-weight: bold">4</h2>
                                                <p style="font-size: 20px">Sertifikasi</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <div class="small-box bg-warning">
                                            <div class="inner">
                                            <h2 class="count" style="font-weight: bold">{{$kriteria ?? "Error!"}}</h2>
                                                <p style="font-size: 20px">Kriteria</p></p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <div class="small-box bg-success">
                                            <div class="inner">
                                            <h2 style="font-weight: bold">{{$alternatif ?? "Error!"}}</h2>
                                                <p style="font-size: 20px">Alternatif</p></p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion"></i>
                                            </div>
                                            <a href="/dashboard/karyawan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <img class="dashboard" src="/dist/img/logo_sbi.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection