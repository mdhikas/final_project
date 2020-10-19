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
                              <a class="nav-item nav-link active" href="/dashboard/test/perhitungan">Perhitungan</a>
                           </div>
                     </div>
                  </nav>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-6">
                           <h2 class="mt-0 mb-2 table-title">HASIL PERHITUNGAN</h2>
                        </div>
                        <div class="col-6">
                           <a href="/dashboard/cetak-pdf" class="btn btn-success float-right" target="_blank"><i class="fas fa-print mr-2"></i>Cetak PDF</a>
                        </div>
                     </div>
                     <br>
                     <div class="row">
                           <h4 class="ml-2 mb-2 table-title">Hasil Analisa</h4>
                     </div>
                     <div class="table-responsive">
                           <table class="table table-bordered">
                              <thead class="thead-dark">
                                 <tr>
                                       <th scope="col" rowspan="2" style="text-align: center; vertical-align: middle">Kode</th>
                                       <th scope="col" rowspan="2" style="text-align: center; vertical-align: middle">Kriteria</th>
                                       <th scope="col" rowspan="2" style="text-align: center; vertical-align: middle">Min Max</th>
                                       <th scope="col" rowspan="2" style="text-align: center; vertical-align: middle">Bobot</th>
                                       <th scope="col" colspan="{{ count($alternatifs) }}">Alternatif</th>
                                       <th scope="col" rowspan="2" style="text-align: center; vertical-align: middle">Tipe Preferensi</th>
                                       <th scope="col" colspan="2">Parameter</th>
                                 </tr>
                                 <tr>
                                       <?php foreach($alternatifs as $key) : ?>
                                          <th><?= $key->kode ?></th>
                                       <?php endforeach; ?>
                                       <th>q</th>
                                       <th>p</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php foreach ($kriterias as $key_kriterias) : ?>
                                       <tr>
                                          <td class="text-center"><?= $key_kriterias['kode_kriteria'] ?></td>
                                          <td><?= $key_kriterias['nama_kriteria'] ?></td>
                                          <td class="text-center"><?= $key_kriterias['minmax'] ?></td>
                                          <td class="text-center"><?= $key_kriterias['bobot'] ?></td>
                                          <?php foreach($key_kriterias['data_alternatifs'] as $key) : ?>
                                             <td><?= $key ?></td>
                                          <?php endforeach; ?>
                                          <td><?= $key_kriterias['tipe_preferensi'] ?></td>
                                          <td class="text-center"><?= $key_kriterias['nilai_q'] ?></td>
                                          <td class="text-center"><?= $key_kriterias['nilai_p'] ?></td>
                                       </tr>
                                 <?php endforeach; ?>
                              </tbody>
                           </table>
                           <div class="row">
                              <h4 class="ml-2 mb-2 mt-2 table-title">Hasil Akhir</h4>
                           </div>
                           <table class="table table-bordered">
                              <thead class="thead-dark">
                                 <tr>
                                    <th>Kode</th>
                                    <th>Nama Alternatif</th>
                                    <th>Leaving Flow</th>
                                    <th>Rank</th>
                                    <th>Entering Flow</th>
                                    <th>Rank</th>
                                    <th>Net Flow</th>
                                    <th>Rank</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php foreach ($perhitungan as $key_perhitungan) : ?>
                                    <tr>
                                       <td class="text-center"><?= $key_perhitungan['kode_alternatif'] ?></td>
                                       <td><?= $key_perhitungan['nama_alternatif'] ?></td>
                                       <td class="text-center"><?= $key_perhitungan['leaving_flow'] ?></td>
                                       <td class="text-center"><?= $key_perhitungan['rank_leaving_flow'] ?></td>
                                       <td class="text-center"><?= $key_perhitungan['entering_flow'] ?></td>
                                       <td class="text-center"><?= $key_perhitungan['rank_entering_flow'] ?></td>
                                       <td class="text-center"><?= $key_perhitungan['net_flow'] ?></td>
                                       <td class="text-center"><?= $key_perhitungan['rank_net_flow'] ?></td>
                                    </tr>
                                 <?php endforeach; ?>
                              </tbody>
                           </table>
                     </div>
                  </div>
               </div>
         </div>
      </div>
   </section>
</div>
@endsection