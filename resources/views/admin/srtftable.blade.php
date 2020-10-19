@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sertifikasi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data Sertifikasi</li>
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
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <div class="skkni" style="text-align:center">
                            <h5>SKKNI</h5>
                            {{-- <p class="card-text">Isi deskripsi disini</p> --}}
                            <a href="/dashboard/sertifikasi/skkni" class="btn btn-primary">More</a>
                        </div>
                        <div class="enviro mt-3" style="text-align:center;">
                            <h5>Environment</h5>
                            {{-- <p class="card-text">Isi deskripsi disini</p> --}}
                            <a href="/dashboard/sertifikasi/enviro" class="btn btn-primary">More</a>
                        </div>
                        <div class="ohs mt-3" style="text-align:center">
                            <h5>OH&S</h5>
                            {{-- <p class="card-text">Isi deskripsi disini</p> --}}
                            <a href="/dashboard/sertifikasi/ohs" class="btn btn-primary">More</a>
                        </div>
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