@extends('layouts.main')
@section('content')
{{-- Modal Tambah --}}
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Alternatif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="/dashboard/test/alternatif" method="POST" id="formTambahAlternatif">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="kode">Kode Alternatif</label>
                        <input type="text" class="form-control @error('kode')is-invalid @enderror" name="kode" id="tambah_kode">
                        @error('kode')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_alternatif">Nama Alternatif</label>
                        <input type="text" class="form-control @error('nama_alternatif')is-invalid @enderror" name="nama_alternatif" id="tambah_nama_alternatif">
                        @error('nama_alternatif')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Tutup</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Tambah --}}
{{-- Modal Edit --}}
<div class="modal fade" id="editModalAlt" data-backdrop="static" tabindex="-1" role="dialog"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Ubah Alternatif</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
					<form role="form" action="/dashboard/test/alternatif" method="POST" id="editFormAlt">
						{{ csrf_field() }}
						{{ method_field('PUT')}}
						<div class="form-group">
							<label for="kode">Kode Alternatif</label>
							<input type="text" class="form-control @error('kode')is-invalid @enderror" name="kode" id="kode">
							@error('kode')
									<div class="is-invalid">
										{{ $message }}
									</div>
							@enderror
						</div>
						<div class="form-group">
							<label for="nama_alternatif">Nama Alternatif</label>
							<input type="text" class="form-control @error('nama_alternatif')is-invalid @enderror" name="nama_alternatif" id="nama_alternatif">
							@error('nama_alternatif')
									{{ $message }}
							@enderror
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Tutup</button>
							<button type="submit" class="btn btn-primary"><i class="fas fa-edit mr-2"></i>Ubah</button>
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
									<a class="nav-item nav-link active" href="/dashboard/test/alternatif">Alternatif</a>
									<a class="nav-item nav-link" href="/dashboard/test/nilai_alternatif">Nilai Alternatif</a>
									<a class="nav-item nav-link" href="/dashboard/test/perhitungan">Perhitungan</a>
								</div>
						</div>
					</nav>
					<div class="card-body">
						<div class="row">
								<div class="col-6">
									<h2 class="mt-0 mb-2 table-title">ALTERNATIF</h2>
								</div>
								<div class="col-6">
									<button type="button" class="btn btn-primary float-right" data-toggle="modal"
										data-target="#staticBackdrop">
										<i class="fas fa-plus-square mr-2"></i>Tambah Data
									</button>
								</div>
						</div>
						<table class="table table-bordered">
							<thead class="thead-dark">
								<tr>
									<th scope="col">No</th>
									<th scope="col">Kode</th>
									<th scope="col">Nama Alternatif</th>
									<th scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								@php
									$x=1;
								@endphp
								@foreach ($alternatif as $alt)
								<tr>
									<th scope="row" style="text-align: center">{{ $x++ }}</th>
									<td>{{$alt->kode}}</td>
									<td>{{$alt->nama_alternatif}}</td>
									<td class="d-flex justify-content-center">										
										<form action="/dashboard/test/alternatif/{{$alt->id}}" id="form-delete-alternatif-{{ $alt->id }}" method="POST">
											{{csrf_field()}}
											{{method_field('DELETE')}}
											<button type="submit" data-id="{{$alt->id}}"
												data-kode="{{$alt->kode}}" class="btn btn-danger confirmDeleteAlternatif">
												<i class="fas fa-trash-alt mr-2"></i>
												Hapus</button>
											</form>
										<button type="button" class="btn btn-warning ml-2 btn-edit"
											data-id="{{$alt->id}}"
											data-kode="{{$alt->kode}}"
											data-nama_alternatif="{{$alt->nama_alternatif}}">
											<i class="fas fa-edit mr-2"></i>
											Edit</button>
									</td>
								</tr>
								@endforeach
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
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection