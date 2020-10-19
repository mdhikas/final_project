@extends('layouts.main')
@section('content')
{{-- Modal Tambah --}}
<div class="modal fade" id="tambahModalNilai" data-backdrop="static" tabindex="-1" role="dialog"
   aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
               <h5 class="modal-title" id="staticBackdropLabel">Tambah Nilai Alternatif</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
         </div>
         <div class="modal-body">
               <form action="/dashboard/test/nilai_alternatif" method="POST" id="tambahFormNilai">
                  {{ csrf_field()}}
                  {{ method_field('PUT')}}
                  <div class="form-group">
                     <label for="kode">Kode</label>
                     <input class="form-control" type="text" placeholder="" nama='kode' id="kode" readonly>
                  </div>
                  <div class="form-group">
                     <label for="nama_alternatif">Nama Alternatif</label>
                     <input class="form-control" type="text" placeholder="" name="nama_alternatif"
                           id="nama_alternatif" readonly>
                  </div>
                  <div class="form-group">
                     <label for="c1">C1 / Nilai Pemahaman Objective Program</label>
                     <input type="text" class="form-control" name="c1" id="c1">
                  </div>
                  <div class="form-group">
                     <label for="c1">C2 / Nilai Pemahaman Isi Materi Program</label>
                     <input type="text" class="form-control" name="c2" id="c2">
                  </div>
                  <div class="form-group">
                     <label for="c3">C3 / Nilai Kompetensi Skill Sesuai Objective Program</label>
                     <input type="text" class="form-control" name="c3" id="c3">
                  </div>
                  <div class="form-group">
                     <label for="c4">C4 / Nilai Kompetensi Problem Solving</label>
                     <input type="text" class="form-control" name="c4" id="c4">
                  </div>
                  <div class="form-group">
                     <label for="c5">C5 / Nilai Tingkat Kepercayaan Diri</label>
                     <input type="text" class="form-control" name="c5" id="c5">
                  </div>
                  <div class="form-group">
                     <label for="c6">C6 / Nilai Kemauan untuk Meningkatkan Performance</label>
                     <input type="text" class="form-control" name="c6" id="c6">
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                     <button type="submit" class="btn btn-primary">Tambah</button>
                  </div>
               </form>
         </div>
      </div>
   </div>
</div>
{{-- End Modal Tambah --}}

{{-- Modal Edit --}}
<div class="modal fade" id="editModalNilai" data-backdrop="static" tabindex="-1" role="dialog"
   aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
               <h5 class="modal-title" id="staticBackdropLabel">Ubah Nilai Alternatif</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
         </div>
         <div class="modal-body">
               <form role="form" action="/dashboard/test/nilai_alternatif" method="POST" id="editFormNilai">
                  {{csrf_field()}}
                  {{-- {{method_field('PUT')}} --}}
                  <div class="form-group">
                     <label for="kode">Kode</label>
                     <input class="form-control" type="text" placeholder="" nama='kode' id="editKode" readonly>
                  </div>
                  <div class="form-group">
                     <label for="nama_alternatif">Nama Alternatif</label>
                     <input class="form-control" type="text" placeholder="" name="nama_alternatif"
                           id="editNama_alternatif" readonly>
                  </div>
                  <div class="form-group">
                     <label for="c1">C1 / Nilai Pemahaman Objective Program</label>
                     <input type="text" class="form-control" name="c1" id="editC1">
                  </div>
                  <div class="form-group">
                     <label for="c2">C2 / Nilai Pemahaman Isi Materi Program</label>
                     <input type="text" class="form-control" name="c2" id="editC2">
                  </div>
                  <div class="form-group">
                     <label for="c3">C3 / Nilai Kompetensi Skill Sesuai Objective Program</label>
                     <input type="text" class="form-control" name="c3" id="editC3">
                  </div>
                  <div class="form-group">
                     <label for="c4">C4 / Nilai Kompetensi Problem Solving</label>
                     <input type="text" class="form-control" name="c4" id="editC4">
                  </div>
                  <div class="form-group">
                     <label for="c5">C5 / Nilai Tingkat Kepercayaan Diri</label>
                     <input type="text" class="form-control" name="c5" id="editC5">
                  </div>
                  <div class="form-group">
                     <label for="c6">C6 / Nilai Kemauan untuk Meningkatkan Performance</label>
                     <input type="text" class="form-control" name="c6" id="editC6">
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                     <button type="submit" class="btn btn-primary">Ubah</button>
                  </div>
               </form>
         </div>
      </div>
   </div>
</div>
{{-- End Modal Edit --}}

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
      <div id="flash-message" data-title="{{ Session::get('title') }}" data-type="{{ Session::get('type') }}" data-message="{{ Session::get('message') }}"></div>
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
                              <a class="nav-item nav-link active" href="/dashboard/test/nilai_alternatif">Nilai
                                 Alternatif</a>
                              <a class="nav-item nav-link" href="/dashboard/test/perhitungan">Perhitungan</a>
                           </div>
                     </div>
                  </nav>
                  <div class="card-body">
                     <div class="row">
                           <div class="col">
                              <h2 class="mt-0 mb-2 table-title">NILAI ALTERNATIF</h2>
                           </div>
                     </div>
                     
                        <table class="table table-bordered" width="100%">
                           <thead class="thead-dark">
                              <tr>
                                    <th>Kode</th>
                                    <th>Nama Alternatif</th>
                                    <?php foreach($kriterias as $k) : ?>
                                       <th><?= $k->kode ?></th>
                                    <?php endforeach; ?>
                                    <th>Aksi</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($nilaiAlternatif as $key) : ?>
                                 <tr>
                                    <td class="text-center"><?= $key['kode_alternatif']; ?></td>
                                    <td><?= $key['nama_alternatif']; ?></td>
                                    <?php foreach ($key['data_kriteria'] as $kriteria) : ?>
                                       <td class="text-center"><?= $kriteria ?></td>
                                    <?php endforeach; ?>
                                    <td class="d-flex justify-content-center">
                                       <?php if ($key['kriteria_kosong'] != 0) : ?>
                                          <button data-id_alternatif="{{ $key['id_alternatif'] }}" data-kode_alternatif="{{ $key['kode_alternatif'] }}" class="btn btn-primary btn-tambah-kriteria mr-1" data-toggle="tooltip" data-placement="top" title="Tambah Nilai Kriteria"><i class="fas fa-plus-square"></i></button>
                                       <?php else : ?>
                                          <button type="button" class="btn btn-warning btn-ubah-nilai mr-1" data-id_alternatif="{{ $key['id_alternatif'] }}" data-kode_alternatif="{{ $key['kode_alternatif'] }}" data-toggle="tooltip" data-placement="top" title="Ubah Nilai"><i class="fas fa-pencil-alt"></i></button>
                                       <?php endif; ?>                                       
                                       <form action="/dashboard/test/nilai_alternatif/{{ $key['id_alternatif'] }}" id="form-delete-nilai-alternatif-{{ $key['id_alternatif'] }}" method="post">
                                          {{ csrf_field() }}
                                          {{ method_field('delete') }}
                                          <button class="btn btn-danger confirmDeleteNilaiAlternatif" type="submit" data-id="{{ $key['id_alternatif'] }}" data-kode="{{ $key['kode_alternatif'] }}" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                                       </form>
                                    </td>
                                 </tr>
                              <?php endforeach; ?>                                    
                           </tbody>
                        </table>
                     
                  </div>
               </div>
         </div>
      </div>
   </section>
</div>
<div class="modal fade" id="modalTambahKriteria" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Nilai Kriteria</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h5 id="headKodeAlternatif"></h5>
				<form action="/alternatif/store_criteria" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="id_alternatif" id="id_alternatif">
					<div class="form-group">
						<label for="">Pilih Kriteria</label>
						<select name="id_kriteria" id="pilih_kriteria" class="form-control">
							<option value="" selected disabled>--Pilih Kriteria--</option>
							@foreach ($kriterias as $kriteria)
							<option value="{{ $kriteria->id }}">{{ $kriteria->kode }} - {{ $kriteria->nama_kriteria }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="">Nilai Kriteria</label>
						<input type="number" name="nilai_kriteria" class="form-control" placeholder="Nilai Kriteria">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-undo-alt mr-2"></i> Tutup</button>
						<button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i> Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalUbahNilai" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Ubah Nilai Kriteria</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h5></h5>
				<form action="/alternatif/update_criteria" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="id_alternatif">
					<div class="form-group">
						<label for="">Pilih Kriteria</label>
						<select name="id_kriteria" class="form-control">
							<option value="" selected disabled>--Pilih Kriteria--</option>
							@foreach ($kriterias as $kriteria)
							<option value="{{ $kriteria->id }}">{{ $kriteria->kode }} - {{ $kriteria->nama_kriteria }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="">Nilai Kriteria</label>
						<input type="number" name="nilai_kriteria" class="form-control" placeholder="Nilai Kriteria">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-undo-alt mr-1"></i>Close</button>
						<button type="submit" class="btn btn-info"><i class="fas fa-edit mr-1"></i>Perbaharui</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection