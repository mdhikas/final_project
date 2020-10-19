@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Certification OHS Test</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Certification Test</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-green">
                        <a class="navbar-brand" href="/dashboard/test/index">PROMETHEE</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-item nav-link" href="/dashboard/test/kriteria">Kriteria</a>
                                <a class="nav-item nav-link" href="/dashboard/test/alternatif">Alternatif</a>
                                <a class="nav-item nav-link" href="/dashboard/test/nilai_alternatif">Nilai Alternatif</a>
                                <a class="nav-item nav-link" href="/dashboard/test/perhitungan">Perhitungan</a>
                            </div>
                        </div>
                    </nav>
                    <div class="card-body">
                        <h1>PROMETHEE</h1>
                        <p style="text-align: justify">Sistem Pendukung Keputusan metode Preference Ranking Organization Method for Enrichment Evaluation (PROMETHEE). Promethee adalah salah satu metode penentuan urutan atau prioritas dalam MCDM ( Multi Criterion Decision Making). Dugaan dari dominasi kriteria yang digunakan dalam promethee adalah penggunaan nilai dalam hubungan outranking. Penggunaan promethee adalah menentukan dan menghasilkan keputusan dari beberapa alternatif. masalah pokoknya adalah kesederhanaan, kejelasan dan kestabilan. Promethee berfungsi untuk mengolah data, baik data kuantitatif dan kualitatif sekaligus. Dimana semua data digabung menjadi satu dengan bobot penilaian yang telah diperoleh melalui penilaian atau survey.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection